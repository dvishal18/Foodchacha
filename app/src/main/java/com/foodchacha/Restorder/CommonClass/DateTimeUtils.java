package com.foodchacha.Restorder.CommonClass;

import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Locale;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class DateTimeUtils {
	public static String getCurrentDateTimeMix() {
		try {
			SimpleDateFormat sdf = new SimpleDateFormat("yyyyMMddHHmmss", Locale.getDefault());
			return sdf.format(new Date());
		} catch (Exception e) {
			e.printStackTrace();
			return "0000-00-00 00:00:00";
		}
	}
	
}
