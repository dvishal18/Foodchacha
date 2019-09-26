package com.foodchacha.Restorder.WS.Response;

import java.util.List;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseSlider {
	public Response response;
	public List<SliderList> slider_list;
	
	public class Response {
		public String message;
		public int code;
	}
	
	public class SliderList {
		public String banner_name;
		public String banner_desc;
		public String banner_name_imagepath;
		public String banner_image;
	}
}