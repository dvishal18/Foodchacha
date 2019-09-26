package com.foodchacha.Restorder.Activity;

import android.annotation.SuppressLint;
import android.app.ActivityOptions;
import android.content.DialogInterface;
import android.content.Intent;
import android.os.Bundle;
import android.support.annotation.NonNull;
import android.support.v4.app.Fragment;
import android.support.v4.app.FragmentManager;
import android.support.v4.app.FragmentTransaction;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;

import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;
import com.facebook.login.LoginManager;
import com.foodchacha.Restorder.CommonClass.CommonClass;
import com.foodchacha.Restorder.CommonClass.Constant;
import com.foodchacha.Restorder.CommonClass.PreferenceUtils;
import com.foodchacha.Restorder.CommonClass.Validate;
import com.foodchacha.Restorder.Fragment.OrderFragment;
import com.foodchacha.Restorder.R;
import com.foodchacha.Restorder.WS.Response.ResponseProfile;
import com.foodchacha.Restorder.WS.RestApi;
import com.foodchacha.Restorder.WS.eRestroAPI;
import com.google.android.gms.auth.api.Auth;
import com.google.android.gms.auth.api.signin.GoogleSignInOptions;
import com.google.android.gms.common.ConnectionResult;
import com.google.android.gms.common.Scopes;
import com.google.android.gms.common.api.GoogleApiClient;
import com.google.android.gms.common.api.ResultCallback;
import com.google.android.gms.common.api.Scope;
import com.google.android.gms.common.api.Status;

import de.hdodenhof.circleimageview.CircleImageView;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ProfileActivity extends AppCompatActivity implements View.OnClickListener, GoogleApiClient.OnConnectionFailedListener {
	public PreferenceUtils preferenceUtils;
	private CommonClass cc;
	private TextView edtName, edtEmail, edtContactNo, edtAddress1, edtAddress2,tvTitle,
	edtCountry, edtState, edtCity, edtCode;
	private String strName, strEmail, strPassword, strContactNo;
	private ImageView ivBack;
	private Button ivRegister,ivLogout;
	private CircleImageView ivProfileImage;
	private RelativeLayout progressbar;
	private GoogleApiClient mGoogleApiClient;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_profile);
		
		cc = new CommonClass(this);
		preferenceUtils = new PreferenceUtils(this);
		
		progressbar = findViewById(R.id.progressbar);
		edtName = findViewById(R.id.edtName);
		edtEmail = findViewById(R.id.edtEmail);
		edtContactNo = findViewById(R.id.edtContactNo);
		edtAddress1 = findViewById(R.id.edtAddress1);
		edtAddress2 = findViewById(R.id.edtAddress2);
		edtCountry = findViewById(R.id.edtCountry);
		edtState = findViewById(R.id.edtState);
		edtCity = findViewById(R.id.edtCity);
		edtCode = findViewById(R.id.edtCode);
		ivProfileImage = findViewById(R.id.ivProfileImage);
		ivBack = findViewById(R.id.ivBack);
		tvTitle = findViewById(R.id.tvTitle);
		tvTitle.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_arrow_back_black_24dp, 0, 0, 0);
		ivRegister = findViewById(R.id.ivRegister);
		ivLogout=findViewById(R.id.ivLogout);
		edtName.setClickable(false);
		edtEmail.setClickable(false);
		edtContactNo.setClickable(false);
		
		findViewById(R.id.flCart).setVisibility(View.GONE);
		
		if (cc.isOnline()) {
			getProfile();
		} else {
			cc.showToast(getString(R.string.msg_no_internet));
		}
		
		ivBack.setOnClickListener(this);
		tvTitle.setOnClickListener(this);
		ivRegister.setOnClickListener(this);
		ivLogout.setOnClickListener(this);

		GoogleSignInOptions gso = new GoogleSignInOptions.Builder(GoogleSignInOptions.DEFAULT_SIGN_IN)
				.requestScopes(new Scope(Scopes.PLUS_LOGIN))
				.requestEmail()
				.build();

		mGoogleApiClient = new GoogleApiClient.Builder(this)
				.enableAutoManage(this, this)
				.addApi(Auth.GOOGLE_SIGN_IN_API, gso)
				.build();
		replaceFragment(new OrderFragment());
	}

	public void replaceFragment(@NonNull Fragment fragment) {
		FragmentManager fm = getSupportFragmentManager();
		FragmentTransaction ft = fm.beginTransaction();
		ft.replace(R.id.containerProfile, fragment, fragment.getClass().getSimpleName());
		ft.setTransition(FragmentTransaction.TRANSIT_FRAGMENT_FADE);
		ft.commit();
	}
	
	@Override
	public void onClick(View v) {
		int id = v.getId();
		switch (id) {
			case R.id.ivBack:
				onBackPressed();
				break;
			case R.id.tvTitle:
				onBackPressed();
				break;
			case R.id.ivRegister:
				Intent intent = new Intent(this, EditProfileActivity.class);
				startActivity(intent);
				break;
			case R.id.ivLogout:
				AlertDialog.Builder builder = new AlertDialog.Builder(this);
				builder.setMessage("Are you sure you want to logout?")
						.setCancelable(false)
						.setPositiveButton("Yes", new DialogInterface.OnClickListener() {
							public void onClick(DialogInterface dialog, int id) {
								if (preferenceUtils.getIsFbLogin()) {
									LoginManager.getInstance().logOut();
									cc.logout();
									finish();
								} else if (preferenceUtils.getIsGpLogin()) {
									Auth.GoogleSignInApi.signOut(mGoogleApiClient).setResultCallback(
											new ResultCallback<Status>() {
												@Override
												public void onResult(Status status) {
													preferenceUtils.setIsGpLogin(false);
												}
											});
								} else {
									cc.logout();
								}
								Intent intent = new Intent(ProfileActivity.this, LoginActivity.class);
								intent.setFlags(Intent.FLAG_ACTIVITY_CLEAR_TASK | Intent.FLAG_ACTIVITY_CLEAR_TOP);
								ActivityOptions options =
										ActivityOptions.makeCustomAnimation(ProfileActivity.this, R.anim.slide_in, R.anim.slide_out);
								startActivity(intent, options.toBundle());
							}
						})
						.setNegativeButton("No", new DialogInterface.OnClickListener() {
							public void onClick(DialogInterface dialog, int id) {
								dialog.cancel();
							}
						});
				AlertDialog alert = builder.create();
				alert.show();
		}
	}
	
	public void getProfile() {
		progressbar.setVisibility(View.VISIBLE);
		eRestroAPI dawaAPI = RestApi.createAPI();
		Call<ResponseProfile> call = dawaAPI.getProfile(preferenceUtils.getUserId());
		call.enqueue(new Callback<ResponseProfile>() {
			@SuppressLint("CheckResult")
			@Override
			public void onResponse(Call<ResponseProfile> call, Response<ResponseProfile> response) {
				if (response.isSuccessful()) {
					progressbar.setVisibility(View.GONE);
					if (response.body().code == Constant.Response_OK) {
						edtName.setText(response.body().get_user_profile.name);
						edtEmail.setText(response.body().get_user_profile.email);
						edtContactNo.setText(response.body().get_user_profile.phone);
						edtAddress1.setText(response.body().get_user_profile.address_line_1);
						edtAddress2.setText(response.body().get_user_profile.address_line_2);
						edtCity.setText(response.body().get_user_profile.city);
						edtState.setText(response.body().get_user_profile.state);
						edtCountry.setText(response.body().get_user_profile.country);
						edtCode.setText(response.body().get_user_profile.zipcode);
						preferenceUtils.setUserImage(response.body().get_user_profile.user_image);
						RequestOptions requestOptions = new RequestOptions();
						requestOptions.placeholder(R.drawable.user);
						requestOptions.error(R.drawable.user);
						
						StringBuilder sb = new StringBuilder();
						if (Validate.isNotNull(response.body().get_user_profile.address_line_1)) {
							sb.append(response.body().get_user_profile.address_line_1 + " , ");
						}
						if (Validate.isNotNull(response.body().get_user_profile.address_line_2)) {
							sb.append(response.body().get_user_profile.address_line_2 + " , ");
						}
						if (Validate.isNotNull(response.body().get_user_profile.city)) {
							sb.append(response.body().get_user_profile.city + " , ");
						}
						if (Validate.isNotNull(response.body().get_user_profile.state)) {
							sb.append(response.body().get_user_profile.state + " , ");
						}
						if (Validate.isNotNull(response.body().get_user_profile.country)) {
							sb.append(response.body().get_user_profile.country + " , ");
						}
						if (Validate.isNotNull(response.body().get_user_profile.zipcode)) {
							sb.append(response.body().get_user_profile.zipcode + " , ");
						}
						preferenceUtils.setAddress(sb.toString());
						preferenceUtils.setPhoneno(response.body().get_user_profile.phone);
						Log.e("Address==>", "" + sb.toString());
						
						Glide.with(ProfileActivity.this)
							   .setDefaultRequestOptions(requestOptions)
							   .load(response.body().get_user_profile.user_image)
							   .into(ivProfileImage);
						
					} else {
						cc.showToast(response.body().message);
					}
				} else {
					progressbar.setVisibility(View.GONE);
					cc.showToast(getString(R.string.msg_something_went_wrong));
				}
			}
			
			@Override
			public void onFailure(Call<ResponseProfile> call, Throwable t) {
				progressbar.setVisibility(View.GONE);
				cc.showToast(getString(R.string.msg_something_went_wrong));
				t.printStackTrace();
			}
		});
	}
	
	@Override
	protected void onResume() {
		if (cc.isOnline()) {
			getProfile();
		} else {
			cc.showToast(getString(R.string.msg_no_internet));
		}
		super.onResume();
	}
	@Override
	public void onConnectionFailed(@NonNull ConnectionResult connectionResult) {
	}
}
