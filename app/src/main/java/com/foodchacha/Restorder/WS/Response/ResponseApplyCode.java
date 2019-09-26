package com.foodchacha.Restorder.WS.Response;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public class ResponseApplyCode {
	public String message;
	public int code;
	
	public promoCodeApply promo_code_apply;
	
	public class promoCodeApply {
		public String promo_value;
		public String promo_percentage;
		public String promo_title;
	}
}