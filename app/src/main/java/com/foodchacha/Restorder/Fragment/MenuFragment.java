package com.foodchacha.Restorder.Fragment;

import android.annotation.SuppressLint;
import android.app.ActivityOptions;
import android.content.Intent;
import android.os.Bundle;
import android.support.v4.app.Fragment;
import android.support.v7.widget.LinearLayoutManager;
import android.support.v7.widget.RecyclerView;
import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.foodchacha.Restorder.Activity.MenuDetailListActivity;
import com.foodchacha.Restorder.Adapter.MenuAdapter;
import com.foodchacha.Restorder.Adapter.MenuDetailAdapter;
import com.foodchacha.Restorder.CommonClass.CommonClass;
import com.foodchacha.Restorder.CommonClass.Constant;
import com.foodchacha.Restorder.CommonClass.PreferenceUtils;
import com.foodchacha.Restorder.R;
import com.foodchacha.Restorder.WS.Response.ResponseMenu;
import com.foodchacha.Restorder.WS.Response.ResponseMenuDetail;
import com.foodchacha.Restorder.WS.RestApi;
import com.foodchacha.Restorder.WS.eRestroAPI;
import com.google.android.gms.ads.AdRequest;
import com.google.android.gms.ads.AdView;

import java.util.ArrayList;
import java.util.List;
import java.util.Queue;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
@SuppressLint("ValidFragment")
public class MenuFragment extends Fragment {
	
	private View view;
	private CommonClass cc;
	private PreferenceUtils preferenceUtils;
	private RelativeLayout progressbar;
	private RecyclerView rvMenu,rvMenuDetails;
	private TextView tvNoData;
	private List<ResponseMenu.MenucategoryList> menucategoryLists;
	private MenuAdapter menuAdapter;
	private List<ResponseMenuDetail.MenuListCat> menucategoryListsItems = new ArrayList<>();;
	private List<List<ResponseMenuDetail.MenuListCat>> menucatTemp = new ArrayList<>();;

	private MenuDetailAdapter menuDetailAdapter;
	
	@Override
	public View onCreateView(LayoutInflater inflater, ViewGroup container, Bundle savedInstanceState) {
		view = inflater.inflate(R.layout.fragment_menu, container, false);
		
		cc = new CommonClass(getActivity());
		preferenceUtils = new PreferenceUtils(getActivity());
		AdView adView = view.findViewById(R.id.adView);
		AdRequest adRequest = new AdRequest.Builder().build();
		adView.loadAd(adRequest);
		if (preferenceUtils.adCount() == 5) {
			preferenceUtils.setadCount(1);
			cc.showFullAd();
		} else {
			int count = preferenceUtils.adCount() + 1;
			preferenceUtils.setadCount(count);
		}
		tvNoData = view.findViewById(R.id.tvNoData);
		progressbar = view.findViewById(R.id.progressbar);
		rvMenu = view.findViewById(R.id.rvMenu);
		rvMenu.setNestedScrollingEnabled(false);
		rvMenu.setHasFixedSize(false);

		LinearLayoutManager layoutManager = new LinearLayoutManager(getActivity(), LinearLayoutManager.VERTICAL, false);
		rvMenu.setLayoutManager(layoutManager);
		if (cc.isOnline()) {
			getMenuList();


		} else {
			cc.showToast(getString(R.string.msg_no_internet));
		}

		if (cc.isOnline()) {
			//getMenuDetailList();
		} else {
			cc.showToast(getString(R.string.msg_no_internet));
		}
		return view;
	}
	
	public void getMenuList() {
		progressbar.setVisibility(View.VISIBLE);
		eRestroAPI dawaAPI = RestApi.createAPI();
		Call<ResponseMenu> call = dawaAPI.getMenuList();
		call.enqueue(new Callback<ResponseMenu>() {
			@Override
			public void onResponse(Call<ResponseMenu> call, Response<ResponseMenu> response) {
				if (response.isSuccessful()) {
					progressbar.setVisibility(View.GONE);
					if (response.body().code == Constant.Response_OK) {
						menucategoryLists = new ArrayList<>();
						menucategoryLists = response.body().menucategory_list;
						menuAdapter = new MenuAdapter(getActivity(), menucategoryLists);
						rvMenu.setAdapter(menuAdapter);
						
						cc.AnimationLeft(rvMenu);
						
						if (menucategoryLists.size() == 0) {
							tvNoData.setVisibility(View.VISIBLE);
							rvMenu.setVisibility(View.GONE);
						} else {
							tvNoData.setVisibility(View.GONE);
							rvMenu.setVisibility(View.VISIBLE);
						}
						
						menuAdapter.setOnDetailClick(new MenuAdapter.OnDetailsClick() {
							@Override
							public void onDetailClick(int position) {
								Intent intent = new Intent(getActivity(), MenuDetailListActivity.class);
								intent.putExtra("id", menucategoryLists.get(position).cid);
								ActivityOptions options =
									   ActivityOptions.makeCustomAnimation(getActivity(), R.anim.slide_in, R.anim.slide_out);
								startActivity(intent, options.toBundle());
								
							}
						});






					} else {
						cc.showToast(response.body().message);
					}
				} else {
					progressbar.setVisibility(View.GONE);
					cc.showToast(getString(R.string.msg_something_went_wrong));
				}
			}
			
			@Override
			public void onFailure(Call<ResponseMenu> call, Throwable t) {
				progressbar.setVisibility(View.GONE);
				cc.showToast(getString(R.string.msg_something_went_wrong));
				t.printStackTrace();
			}
		});
	}



}
