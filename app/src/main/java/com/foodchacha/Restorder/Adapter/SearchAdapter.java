package com.foodchacha.Restorder.Adapter;

import android.annotation.SuppressLint;
import android.app.ActivityOptions;
import android.content.Context;
import android.content.Intent;
import android.os.Build;
import android.support.annotation.NonNull;
import android.support.annotation.RequiresApi;
import android.support.v7.widget.CardView;
import android.support.v7.widget.RecyclerView;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RatingBar;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.foodchacha.Restorder.Activity.MenuDetailItemActivity;
import com.foodchacha.Restorder.R;
import com.foodchacha.Restorder.WS.Response.ResponseSearch;

import java.util.List;

import de.hdodenhof.circleimageview.CircleImageView;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class SearchAdapter extends RecyclerView.Adapter {
	
	private List<ResponseSearch.menuSearch> menuListCats;
	private Context mContext;
	
	public SearchAdapter(Context mContext, List<ResponseSearch.menuSearch> menuListCats) {
		this.mContext = mContext;
		this.menuListCats = menuListCats;
		
	}
	
	@NonNull
	@Override
	public RecyclerView.ViewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
		View v = LayoutInflater.from(parent.getContext())
			            .inflate(R.layout.item_menu_detail, parent, false);
		return new SearchAdapter.MenuViewHolder(v);
	}
	
	@RequiresApi(api = Build.VERSION_CODES.LOLLIPOP)
	@SuppressLint("CheckResult")
	@Override
	public void onBindViewHolder(@NonNull RecyclerView.ViewHolder viewHolder, @SuppressLint("RecyclerView") final int position) {
		final SearchAdapter.MenuViewHolder holder = (SearchAdapter.MenuViewHolder) viewHolder;
		holder.tvMenuTitle.setText(menuListCats.get(position).menu_name);
		holder.tvMenucount.setText(menuListCats.get(position).menu_price);
		holder.tvMenuWeight.setText(menuListCats.get(position).menu_weight);
		holder.rating.setRating(0);
		Glide.with(mContext)
			   .load(menuListCats.get(position).menu_image)
			   .into(holder.ivMenu);
		
		holder.ivMenuDetail.setOnClickListener(new View.OnClickListener() {
			@Override
			public void onClick(View v) {
				Intent intent = new Intent(mContext, MenuDetailItemActivity.class);
				intent.putExtra("mid", menuListCats.get(position).mid);
				intent.putExtra("title", menuListCats.get(position).menu_name);
				intent.putExtra("detail", menuListCats.get(position).menu_info);
				intent.putExtra("menu_price", menuListCats.get(position).menu_price);
				intent.putExtra("menu_weight", menuListCats.get(position).menu_weight);
				intent.putExtra("itemCount", 0);
				ActivityOptions options = ActivityOptions.makeCustomAnimation(mContext, R.anim.slide_in, R.anim.slide_out);
				mContext.startActivity(intent, options.toBundle());
				
			}
		});
		
	}
	
	@Override
	public int getItemCount() {
		return menuListCats.size();
	}
	
	private class MenuViewHolder extends RecyclerView.ViewHolder {
		
		TextView tvMenuTitle, tvMenucount, tvItemCount, tvMenuWeight;
		TextView ivMenuPlus, ivMenuminus;
		Button ivMenuDetail;
		ImageView ivMenu;
		RatingBar rating;
		CardView detailCard, cardAddItems;
		
		MenuViewHolder(@NonNull View itemView) {
			super(itemView);
			tvMenuTitle = itemView.findViewById(R.id.tvMenuTitle);
			tvMenucount = itemView.findViewById(R.id.tvMenucount);
			tvItemCount = itemView.findViewById(R.id.tvItemCount);
			tvMenuWeight = itemView.findViewById(R.id.tvMenuWeight);
			ivMenu = itemView.findViewById(R.id.ivMenu);
			ivMenuDetail = itemView.findViewById(R.id.ivMenuDetail);
			ivMenuPlus = itemView.findViewById(R.id.ivMenuPlus);
			ivMenuminus = itemView.findViewById(R.id.ivMenuminus);
			rating = itemView.findViewById(R.id.rating);
			detailCard = itemView.findViewById(R.id.detailCard);
			cardAddItems = itemView.findViewById(R.id.cardAddItems);
			
		}
	}
}