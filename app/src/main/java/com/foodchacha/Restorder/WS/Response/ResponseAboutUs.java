package com.foodchacha.Restorder.WS.Response;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseAboutUs {
	public String message;
	public int code;
	public aboutUsDetail about_us_detail;
	
	public class aboutUsDetail {
		public String about_desc;
	}
}