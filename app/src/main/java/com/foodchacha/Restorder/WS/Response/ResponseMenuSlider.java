package com.foodchacha.Restorder.WS.Response;

import java.util.List;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseMenuSlider {
	public String message;
	public int code;
	public List<menuMultipleImage> menu_multiple_image;
	
	public class menuMultipleImage {
		public String mid;
		public String items_images;
	}
	
}
