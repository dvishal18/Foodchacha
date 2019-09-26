package com.foodchacha.Restorder.CommonClass;

import android.support.annotation.NonNull;
import android.support.annotation.Nullable;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class Validate {
	
	public static boolean isNull(@Nullable String str) {
		return str == null || str.equalsIgnoreCase("null") || str.trim().length() == 0;
	}
	
	@NonNull
	public static boolean isNotNull(@Nullable String str) {
		return !(str == null || str.equalsIgnoreCase("null") || str.trim().length() == 0);
	}
}
