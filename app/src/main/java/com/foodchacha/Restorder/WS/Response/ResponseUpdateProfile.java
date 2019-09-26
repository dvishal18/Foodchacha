package com.foodchacha.Restorder.WS.Response;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseUpdateProfile {
	public Response response;
	public updateUserProfile update_user_profile;
	
	public class Response {
		public String message;
		public int code;
	}
	
	public class updateUserProfile {
		public String user_id;
		public String name;
		public String email;
		public String phone;
		public String address_line_1;
		public String address_line_2;
		public String city;
		public String state;
		public String country;
		public String zipcode;
		public String user_image;
		public String msg;
		public String success;
	}
}