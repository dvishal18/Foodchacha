package com.foodchacha.Restorder.Service;

import android.app.IntentService;
import android.content.Intent;
import android.location.Address;
import android.location.Geocoder;
import android.location.Location;
import android.os.Bundle;
import android.os.ResultReceiver;
import android.support.annotation.Nullable;
import android.util.Log;



import java.util.List;
import java.util.Locale;

public class GetAddressIntentService extends IntentService {

    private static final String IDENTIFIER = "GetAddressIntentService";
    private ResultReceiver addressResultReceiver;
    private String add_City,add_State, add_Country, add_PostalCode;

    public GetAddressIntentService() {
        super(IDENTIFIER);
    }

    //handle the address request
    @Override
    protected void onHandleIntent(@Nullable Intent intent) {
        String msg = "";
        //get result receiver from intent
        addressResultReceiver = intent.getParcelableExtra("add_receiver");

        if (addressResultReceiver == null) {
            Log.e("GetAddressIntentService",
                    "No receiver, not processing the request further");
            return;
        }

        Location location = intent.getParcelableExtra("add_location");

        //send no location error to results receiver
        if (location == null) {
            msg = "No location, can't go further without location";
            sendResultsToReceiver(0, msg,"","","","");
            return;
        }
        //call GeoCoder getFromLocation to get address
        //returns list of addresses, take first one and send info to result receiver
        Geocoder geocoder = new Geocoder(this, Locale.getDefault());
        List<Address> addresses = null;

        try {
            addresses = geocoder.getFromLocation(
                    location.getLatitude(),
                    location.getLongitude(),
                    1);
        } catch (Exception ioException) {
            Log.e("", "Error in getting address for the location");
        }

        if (addresses == null || addresses.size()  == 0) {
            msg = "No address found for the location";
            sendResultsToReceiver(1, msg,"","","","");
        } else {
            Address address = addresses.get(0);
            StringBuffer addressDetails = new StringBuffer();

            addressDetails.append(address.getFeatureName());
//            addressDetails.append("\n");
            addressDetails.append(",");
            addressDetails.append(address.getThoroughfare());
//            addressDetails.append("\n");

//            addressDetails.append("Locality: ");
            addressDetails.append(",");
            addressDetails.append(address.getLocality());
//            addressDetails.append("\n");

//            addressDetails.append("County: ");
//            addressDetails.append(",");
//            addressDetails.append(address.getSubAdminArea());
//            addressDetails.append("\n");
                add_City = ""+address.getLocality();
//            addressDetails.append("State: ");
//            addressDetails.append(",");
//            addressDetails.append(address.getAdminArea());
//            addressDetails.append("\n");

            add_State = ""+address.getAdminArea();

//            addressDetails.append("Country: ");
//            addressDetails.append(",");
//            addressDetails.append(address.getCountryName());
//            addressDetails.append("\n");
            add_Country = ""+address.getCountryName();

//            addressDetails.append("Postal Code: ");
//            addressDetails.append(",");
//            addressDetails.append(address.getPostalCode());
//            addressDetails.append("\n");
            add_PostalCode = ""+address.getPostalCode();

            sendResultsToReceiver(2,addressDetails.toString() , add_City.toString().trim(), add_State.toString().trim(), add_Country.toString().trim(),add_PostalCode.toString().trim());
        }
    }
    //to send results to receiver in the source activity
    private void sendResultsToReceiver(int resultCode, String message, String City, String State, String Country,String postalCode) {
        Bundle bundle = new Bundle();
        bundle.putString("address_result", message);
        bundle.putString("address_City", City);
        bundle.putString("address_State", State);
        bundle.putString("address_Country", Country);
        bundle.putString("address_postalCode", postalCode);

        addressResultReceiver.send(resultCode, bundle);
    }
}