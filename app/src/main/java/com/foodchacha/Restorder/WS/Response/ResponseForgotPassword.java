package com.foodchacha.Restorder.WS.Response;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseForgotPassword {
	public Response response;
	public ForgetPassword forget_password;
	
	public class Response {
		public String message;
		public int code;
	}
	
	public class ForgetPassword {
		public String success;
	}
}