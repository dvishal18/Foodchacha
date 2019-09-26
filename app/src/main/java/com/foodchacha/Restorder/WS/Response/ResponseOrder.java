package com.foodchacha.Restorder.WS.Response;

import java.util.List;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseOrder {
	
	public String message;
	public int code;
	
	public List<orderSummary> user_order_list;
	
	public class orderSummary {
		public String order_id;
		public String status;
		public String total_price;
		}
	}
