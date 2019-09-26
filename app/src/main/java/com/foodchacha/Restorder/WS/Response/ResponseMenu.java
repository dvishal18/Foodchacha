package com.foodchacha.Restorder.WS.Response;

import java.util.List;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseMenu {
	
	public List<MenucategoryList> menucategory_list;
	

		public String message;
		public int code;

	
	public class MenucategoryList {
		public String cid;
		public String category_name;
		public String category_image;
		public String total_rate;
		public String rate_avg;
		public String count;
	}
}
