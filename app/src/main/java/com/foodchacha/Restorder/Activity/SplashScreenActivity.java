package com.foodchacha.Restorder.Activity;

import android.content.Intent;
import android.os.Bundle;
import android.os.Handler;
import android.support.v7.app.AppCompatActivity;
import android.view.animation.Animation;
import android.view.animation.LinearInterpolator;
import android.view.animation.RotateAnimation;
import android.widget.ImageView;

import com.foodchacha.Restorder.CommonClass.PreferenceUtils;
import com.foodchacha.Restorder.CommonClass.Validate;
import com.foodchacha.Restorder.R;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class SplashScreenActivity extends AppCompatActivity {
	PreferenceUtils preferenceUtils;
	
	@Override
	protected void onCreate(Bundle savedInstanceState) {
		super.onCreate(savedInstanceState);
		setContentView(R.layout.activity_splash_screen);
		
		preferenceUtils = new PreferenceUtils(this);
		
		ImageView ivSplash = findViewById(R.id.ivSplash);
		
		Animation anim = new RotateAnimation(0f, 360f,
			   Animation.RELATIVE_TO_SELF, 0.5f, Animation.RELATIVE_TO_SELF,
			   0.5f);
		anim.setInterpolator(new LinearInterpolator());
		anim.setRepeatCount(Animation.ABSOLUTE);
		anim.setDuration(4000);
		
		ivSplash.setAnimation(anim);
		
		new Handler().postDelayed(new Runnable() {
			public void run() {
				if (Validate.isNotNull(preferenceUtils.getUserId()) || preferenceUtils.getIsFbLogin() || preferenceUtils.getIsGpLogin()) {
					startActivity(new Intent(SplashScreenActivity.this, MainBottomNavigationActivity.class));
				} else {
					startActivity(new Intent(SplashScreenActivity.this, LoginActivity.class));
				}
				finish();
			}
		}, 5000);
	}
}
