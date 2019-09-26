package com.foodchacha.Restorder.WS.Response;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseAddCart {
	public Response response;
	public AddCart add_cart;
	
	public class Response {
		public String message;
		public int code;
	}
	
	public class AddCart {
		public String cart_items;
		public String success;
		
	}
}