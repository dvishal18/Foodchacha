package com.foodchacha.Restorder.WS.Response;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseComment {
	
	public Response response;
	public commentLst comment_lst;
	
	public class Response {
		public String message;
		public int code;
	}
	
	public class commentLst {
		public String count;
	}
}