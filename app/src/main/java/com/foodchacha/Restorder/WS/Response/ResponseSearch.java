package com.foodchacha.Restorder.WS.Response;

import java.util.List;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseSearch {
	public String message;
	public int code;
	
	public List<menuSearch> menu_search;
	
	public class menuSearch {
		public String mid;
		public String menu_name;
		public String menu_info;
		public String menu_type;
		public String menu_image;
		public String menu_price;
		public String menu_weight;
	}
}