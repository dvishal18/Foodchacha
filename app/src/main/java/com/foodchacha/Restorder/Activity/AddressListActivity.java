package com.foodchacha.Restorder.Activity;

import android.Manifest;
import android.annotation.SuppressLint;
import android.app.Activity;
import android.content.ContentValues;
import android.content.DialogInterface;
import android.content.Intent;
import android.content.pm.PackageManager;
import android.database.Cursor;
import android.graphics.Color;
import android.location.Geocoder;
import android.location.Location;
import android.net.Uri;
import android.os.Build;
import android.os.Handler;
import android.os.ResultReceiver;
import android.provider.MediaStore;
import android.support.annotation.NonNull;
import android.support.annotation.Nullable;
import android.support.annotation.RequiresApi;
import android.support.v4.app.ActivityCompat;
import android.support.v4.content.ContextCompat;
import android.support.v7.app.AlertDialog;
import android.support.v7.app.AppCompatActivity;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.ImageView;
import android.widget.RelativeLayout;
import android.widget.TextView;
import android.widget.Toast;

import com.bumptech.glide.Glide;
import com.bumptech.glide.request.RequestOptions;
import com.foodchacha.Restorder.CommonClass.CommonClass;
import com.foodchacha.Restorder.CommonClass.Constant;
import com.foodchacha.Restorder.CommonClass.DateTimeUtils;
import com.foodchacha.Restorder.CommonClass.PreferenceUtils;
import com.foodchacha.Restorder.CommonClass.Validate;
import com.foodchacha.Restorder.R;
import com.foodchacha.Restorder.Service.GetAddressIntentService;
import com.foodchacha.Restorder.WS.Response.ResponseProfile;
import com.foodchacha.Restorder.WS.Response.ResponseUpdateProfile;
import com.foodchacha.Restorder.WS.RestApi;
import com.foodchacha.Restorder.WS.eRestroAPI;
import com.google.android.gms.location.FusedLocationProviderClient;
import com.google.android.gms.location.LocationCallback;
import com.google.android.gms.location.LocationRequest;
import com.google.android.gms.location.LocationResult;
import com.google.android.gms.location.LocationServices;
import com.google.android.gms.maps.CameraUpdateFactory;
import com.google.android.gms.maps.GoogleMap;
import com.google.android.gms.maps.OnMapReadyCallback;
import com.google.android.gms.maps.SupportMapFragment;
import com.google.android.gms.maps.model.CircleOptions;
import com.google.android.gms.maps.model.LatLng;

import java.io.File;

import de.hdodenhof.circleimageview.CircleImageView;
import okhttp3.MediaType;
import okhttp3.MultipartBody;
import okhttp3.RequestBody;
import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class AddressListActivity extends AppCompatActivity implements OnMapReadyCallback,View.OnClickListener  {

    private FusedLocationProviderClient fusedLocationClient;

    private static final int LOCATION_PERMISSION_REQUEST_CODE = 2;

    private LocationAddressResultReceiver addressResultReceiver;

    private TextView currentAddTv,tvTitle;

    private Location currentLocation;

    private LocationCallback locationCallback;

    private GoogleMap mMap;

    private Button mChangeAddress,ivRegister;

    String currentAdd_City;
    String currentAdd_State;
    String currentAdd_Country;
    String currentAdd_PostalCode;

    public PreferenceUtils preferenceUtils;
    RequestBody requestBody;
    private CommonClass cc;
    private TextView edtName, edtEmail, edtContactNo,edtAddress1, edtAddress2,
            edtCountry, edtState, edtCity, edtCode;
    private String strName, strEmail, strContactNo,strAddress1, strAddress2,
            strCountry, strState, strCity, strCode;
    private String strPassword="123456";
    private ImageView ivBack;
    private CircleImageView ivProfileImage;
    private RelativeLayout progressbar;
    private String strFileName;
    private Uri mImageUri;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_address_list);


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

        edtName.setClickable(false);
        edtEmail.setClickable(false);
        edtContactNo.setClickable(false);

        findViewById(R.id.flCart).setVisibility(View.GONE);

        if (cc.isOnline()) {
            getProfile();
        } else {
            cc.showToast(getString(R.string.msg_no_internet));
        }

        tvTitle.setOnClickListener(this);
        ivProfileImage.setOnClickListener(this);
        ivRegister.setOnClickListener(this);

        addressResultReceiver = new LocationAddressResultReceiver(new Handler());

        currentAddTv = findViewById(R.id.current_address);
        mChangeAddress = (Button)findViewById(R.id.button_changeAddress);

        tvTitle = findViewById(R.id.tvTitle);
        tvTitle.setCompoundDrawablesWithIntrinsicBounds(R.drawable.ic_arrow_back_black_24dp, 0, 0, 0);

        fusedLocationClient = LocationServices.getFusedLocationProviderClient(this);


        locationCallback = new LocationCallback() {
            @Override
            public void onLocationResult(LocationResult locationResult) {
                currentLocation = locationResult.getLocations().get(0);
                getAddress();
            };
        };
        SupportMapFragment mapFragment = (SupportMapFragment) getSupportFragmentManager()
                .findFragmentById(R.id.current_location);
        mapFragment.getMapAsync(this);
//        startLocationUpdates();

    }

    @Override
    public void onClick(View v) {
        int id = v.getId();
        switch (id) {
            case R.id.tvTitle:
                onBackPressed();
                break;
            case R.id.ivRegister:
                UpdateProfile();
                break;
        }
    }
    @Override
    public void onMapReady(GoogleMap googleMap) {
        mMap = googleMap;

        mMap.setOnMyLocationButtonClickListener(onMyLocationButtonClickListener);
        mMap.setOnMyLocationClickListener(onMyLocationClickListener);
        startLocationUpdates();
        mMap.getUiSettings().setZoomControlsEnabled(true);
        mMap.setMinZoomPreference(11);
    }

    private void showDefaultLocation() {
        Toast.makeText(this, "Location permission not granted, " +
                        "showing default location",
                Toast.LENGTH_SHORT).show();
        LatLng redmond = new LatLng(47.6739881, -122.121512);
        mMap.moveCamera(CameraUpdateFactory.newLatLng(redmond));
    }

    private GoogleMap.OnMyLocationButtonClickListener onMyLocationButtonClickListener =
            new GoogleMap.OnMyLocationButtonClickListener() {
                @Override
                public boolean onMyLocationButtonClick() {
                    mMap.setMinZoomPreference(15);
                    return false;
                }
            };

    private GoogleMap.OnMyLocationClickListener onMyLocationClickListener =
            new GoogleMap.OnMyLocationClickListener() {
                @Override
                public void onMyLocationClick(@NonNull Location location) {

                    mMap.setMinZoomPreference(12);

                    CircleOptions circleOptions = new CircleOptions();
                    circleOptions.center(new LatLng(location.getLatitude(),
                            location.getLongitude()));

                    circleOptions.radius(200);
                    circleOptions.fillColor(Color.RED);
                    circleOptions.strokeWidth(6);

                    mMap.addCircle(circleOptions);
                }
            };


    @SuppressWarnings("MissingPermission")
    private void startLocationUpdates() {
        if (ContextCompat.checkSelfPermission(this,
                Manifest.permission.ACCESS_FINE_LOCATION)
                != PackageManager.PERMISSION_GRANTED) {
            ActivityCompat.requestPermissions(this,
                    new String[]{Manifest.permission.ACCESS_FINE_LOCATION},
                    LOCATION_PERMISSION_REQUEST_CODE);
        } else {
            if (mMap != null) {
                mMap.setMyLocationEnabled(true);
            }
            @SuppressLint("RestrictedApi") LocationRequest locationRequest = new LocationRequest();
            locationRequest.setInterval(2000);
            locationRequest.setFastestInterval(1000);
            locationRequest.setPriority(LocationRequest.PRIORITY_HIGH_ACCURACY);

            fusedLocationClient.requestLocationUpdates(locationRequest,
                    locationCallback,
                    null);
        }
    }

    @SuppressWarnings("MissingPermission")
    private void getAddress() {

        if (!Geocoder.isPresent()) {
            Toast.makeText(AddressListActivity.this,
                    "Can't find current address, ",
                    Toast.LENGTH_SHORT).show();
            return;
        }
        LatLng redmond = new LatLng(currentLocation.getLatitude(), currentLocation.getLongitude());
        mMap.moveCamera(CameraUpdateFactory.newLatLng(redmond));

        Intent intent = new Intent(this, GetAddressIntentService.class);
        intent.putExtra("add_receiver", addressResultReceiver);
        intent.putExtra("add_location", currentLocation);
        startService(intent);
    }

    @Override
    public void onRequestPermissionsResult(int requestCode, @NonNull String[] permissions,
                                           @NonNull int[] grantResults) {
        switch (requestCode) {
            case LOCATION_PERMISSION_REQUEST_CODE: {
                if (grantResults.length > 0
                        && grantResults[0] == PackageManager.PERMISSION_GRANTED) {
                    startLocationUpdates();

                } else {
                    Toast.makeText(this, "Location permission not granted, " +
                                    "restart the app if you want the feature",
                            Toast.LENGTH_SHORT).show();
                    showDefaultLocation();
                }
                return;
            }

        }
    }
    private class LocationAddressResultReceiver extends ResultReceiver {
        LocationAddressResultReceiver(Handler handler) {
            super(handler);
        }

        @Override
        protected void onReceiveResult(int resultCode, Bundle resultData) {

            if (resultCode == 0) {
                //Last Location can be null for various reasons
                //for example the api is called first time
                //so retry till location is set
                //since intent service runs on background thread, it doesn't block main thread
                Log.d("Address", "Location null retrying");
                getAddress();
            }

            if (resultCode == 1) {
                Toast.makeText(AddressListActivity.this,
                        "Address not found, " ,
                        Toast.LENGTH_SHORT).show();
            }

            String currentAdd = resultData.getString("address_result");
             currentAdd_City = resultData.getString("address_City");
             currentAdd_State = resultData.getString("address_State");
             currentAdd_Country = resultData.getString("address_Country");
             currentAdd_PostalCode = resultData.getString("address_postalCode");

            showResults(currentAdd);
        }
    }

    private void showResults(String currentAdd){
        currentAddTv.setText(currentAdd);
    }


    @Override
    protected void onResume() {
        super.onResume();
       // startLocationUpdates();
    }

    @Override
    protected void onPause() {
        super.onPause();
        fusedLocationClient.removeLocationUpdates(locationCallback);
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
//                        edtAddress1.setText(response.body().get_user_profile.address_line_1);
//                        edtAddress2.setText(response.body().get_user_profile.address_line_2);
                        edtCity.setText(response.body().get_user_profile.city);
                        edtState.setText(response.body().get_user_profile.state);
                        edtCountry.setText(response.body().get_user_profile.country);
                        edtCode.setText(response.body().get_user_profile.zipcode);
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

                        RequestOptions requestOptions = new RequestOptions();
                        requestOptions.placeholder(R.drawable.user);
                        requestOptions.error(R.drawable.user);

                        Glide.with(AddressListActivity.this)
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

    public void UpdateProfile() {
        progressbar.setVisibility(View.VISIBLE);
        String fullAddress = currentAddTv.getText().toString().trim();
        String subAddress = edtAddress1.getText().toString().trim() + edtAddress2.getText().toString().trim();
        RequestBody requestuserId = RequestBody.create(MediaType.parse("text/plain"), preferenceUtils.getUserId());
        RequestBody requestName = RequestBody.create(MediaType.parse("text/plain"), edtName.getText().toString().trim());
        RequestBody requestEmail = RequestBody.create(MediaType.parse("text/plain"), edtEmail.getText().toString().trim());
        RequestBody requestPassword = RequestBody.create(MediaType.parse("text/plain"), strPassword.toString().trim());
        RequestBody requestPhone = RequestBody.create(MediaType.parse("text/plain"), edtContactNo.getText().toString().trim());
        RequestBody requestAddress1 = RequestBody.create(MediaType.parse("text/plain"), fullAddress);
        RequestBody requestAddress2 = RequestBody.create(MediaType.parse("text/plain"), subAddress);
        RequestBody requestCity = RequestBody.create(MediaType.parse("text/plain"), currentAdd_City.trim());
        RequestBody requestState = RequestBody.create(MediaType.parse("text/plain"), currentAdd_State.trim());
        RequestBody requestCountry = RequestBody.create(MediaType.parse("text/plain"), currentAdd_Country.trim());
        RequestBody requestCode = RequestBody.create(MediaType.parse("text/plain"), currentAdd_PostalCode.trim());
        MultipartBody.Part part = null;
        if (requestBody != null) {
            part = MultipartBody.Part.createFormData("user_image", strFileName, requestBody);
        }
        eRestroAPI dawaAPI = RestApi.createAPI();
        Call<ResponseUpdateProfile> call = dawaAPI.UpdateProfile(requestuserId, requestName, requestEmail, requestPassword, requestPhone, requestAddress1,requestAddress2,requestCity,requestState,requestCountry,requestCode, part);
        call.enqueue(new Callback<ResponseUpdateProfile>() {
            @SuppressLint("CheckResult")
            @Override
            public void onResponse(Call<ResponseUpdateProfile> call, Response<ResponseUpdateProfile> response) {
                if (response.isSuccessful()) {
                    progressbar.setVisibility(View.GONE);
                    if (response.body().response.code == Constant.Response_OK) {
                        edtName.setText(response.body().update_user_profile.name);
                        edtEmail.setText(response.body().update_user_profile.email);
                        edtContactNo.setText(response.body().update_user_profile.phone);
                        edtAddress1.setText(response.body().update_user_profile.address_line_1);
                        edtAddress2.setText(response.body().update_user_profile.address_line_2);
                        edtCity.setText(response.body().update_user_profile.city);
                        edtState.setText(response.body().update_user_profile.state);
                        edtCountry.setText(response.body().update_user_profile.country);
                        edtCode.setText(response.body().update_user_profile.zipcode);
                        preferenceUtils.setUserImage(response.body().update_user_profile.user_image);

                        StringBuilder sb = new StringBuilder();
                        if (Validate.isNotNull(response.body().update_user_profile.address_line_1)) {
                            sb.append(response.body().update_user_profile.address_line_1 + " , ");
                        }
                        if (Validate.isNotNull(response.body().update_user_profile.address_line_2)) {
                            sb.append(response.body().update_user_profile.address_line_2 + " , ");
                        }
                        if (Validate.isNotNull(response.body().update_user_profile.city)) {
                            sb.append(response.body().update_user_profile.city + " , ");
                        }
                        if (Validate.isNotNull(response.body().update_user_profile.state)) {
                            sb.append(response.body().update_user_profile.state + " , ");
                        }
                        if (Validate.isNotNull(response.body().update_user_profile.country)) {
                            sb.append(response.body().update_user_profile.country + " , ");
                        }
                        if (Validate.isNotNull(response.body().update_user_profile.zipcode)) {
                            sb.append(response.body().update_user_profile.zipcode + " , ");
                        }
                        preferenceUtils.setAddress(sb.toString());
                        preferenceUtils.setPhoneno(response.body().update_user_profile.phone);
                        Log.e("Address==>", "" + sb.toString());

                        RequestOptions requestOptions = new RequestOptions();
                        requestOptions.placeholder(R.drawable.user);
                        requestOptions.error(R.drawable.user);

                        Glide.with(AddressListActivity.this)
                                .setDefaultRequestOptions(requestOptions)
                                .load(response.body().update_user_profile.user_image)
                                .into(ivProfileImage);
                        finish();
                    } else {
                        cc.showToast(response.body().response.message);
                    }
                } else {
                    progressbar.setVisibility(View.GONE);
                    cc.showToast(getString(R.string.msg_something_went_wrong));
                }
            }

            @Override
            public void onFailure(Call<ResponseUpdateProfile> call, Throwable t) {
                progressbar.setVisibility(View.GONE);
                cc.showToast(getString(R.string.msg_something_went_wrong));
                t.printStackTrace();
            }
        });
    }



}