package com.foodchacha.Restorder.WS.Response;

import java.util.List;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseMenuDetail {
	
	public List<MenuListCat> menu_list_cat;
	
		public String message;
		public int code;

	public class MenuListCat {
		public String mid;
		public String menu_name;
		public String menu_info;
		public String menu_price;
		public String menu_qty;
		public String total_rate;
		public String rate_avg;
		public String menu_weight;
		public String menu_image;
		public String menu_type;
		public int itemCount = 0;
	}
}
