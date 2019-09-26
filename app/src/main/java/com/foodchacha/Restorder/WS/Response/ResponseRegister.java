package com.foodchacha.Restorder.WS.Response;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseRegister {
	
	public Response response;
	public RegisterDetail register_detail;
	
	public class Response {
		public String message;
		public int code;
	}
	
	public class RegisterDetail {
		public String user_id;
		public String name;
		public String email;
		public String phone;
		public String success;
	}
}