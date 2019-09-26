package com.foodchacha.Restorder.WS;

import com.foodchacha.Restorder.CommonClass.Constant;
import com.foodchacha.Restorder.WS.Response.ResponseAboutUs;
import com.foodchacha.Restorder.WS.Response.ResponseAddCart;
import com.foodchacha.Restorder.WS.Response.ResponseApplyCode;
import com.foodchacha.Restorder.WS.Response.ResponseCartList;
import com.foodchacha.Restorder.WS.Response.ResponseComment;
import com.foodchacha.Restorder.WS.Response.ResponseDeleteItem;
import com.foodchacha.Restorder.WS.Response.ResponseFbLogin;
import com.foodchacha.Restorder.WS.Response.ResponseForgotPassword;
import com.foodchacha.Restorder.WS.Response.ResponseGPLogin;
import com.foodchacha.Restorder.WS.Response.ResponseGetLike;
import com.foodchacha.Restorder.WS.Response.ResponseLike;
import com.foodchacha.Restorder.WS.Response.ResponseLogin;
import com.foodchacha.Restorder.WS.Response.ResponseMenu;
import com.foodchacha.Restorder.WS.Response.ResponseMenuDetail;
import com.foodchacha.Restorder.WS.Response.ResponseMenuItemDetail;
import com.foodchacha.Restorder.WS.Response.ResponseMenuSlider;
import com.foodchacha.Restorder.WS.Response.ResponseOfferList;
import com.foodchacha.Restorder.WS.Response.ResponseOrder;
import com.foodchacha.Restorder.WS.Response.ResponseOrderDetails;
import com.foodchacha.Restorder.WS.Response.ResponsePayment;
import com.foodchacha.Restorder.WS.Response.ResponseProfile;
import com.foodchacha.Restorder.WS.Response.ResponseRating;
import com.foodchacha.Restorder.WS.Response.ResponseRegister;
import com.foodchacha.Restorder.WS.Response.ResponseSearch;
import com.foodchacha.Restorder.WS.Response.ResponseSlider;
import com.foodchacha.Restorder.WS.Response.ResponseUpdateProfile;
import com.google.gson.JsonObject;

import okhttp3.MultipartBody;
import okhttp3.RequestBody;
import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.Field;
import retrofit2.http.FormUrlEncoded;
import retrofit2.http.GET;
import retrofit2.http.Headers;
import retrofit2.http.Multipart;
import retrofit2.http.POST;
import retrofit2.http.Part;
import retrofit2.http.Query;

/**
 * @author Vishal Darekar
 * Dew Solutions
 * +91 7875880072
 */
public interface eRestroAPI {
	
	@FormUrlEncoded
	@POST("user_login_api.php")
	Call<ResponseLogin> getLogin(@Field("email") String email,
	                             @Field("password") String password);
	
	@FormUrlEncoded
	@POST("user_forgot_pass_api.php")
	Call<ResponseForgotPassword> getPassword(@Field("email") String email);
	
	@Multipart
	@POST("user_register_api.php")
	Call<ResponseRegister> getRegister(@Part("name") RequestBody name,
	                                   @Part("email") RequestBody email,
	                                   @Part("password") RequestBody password,
	                                   @Part("phone") RequestBody phone,
	                                   @Part("address_line_1") RequestBody address_line_1,
	                                   @Part("address_line_2") RequestBody address_line_2,
	                                   @Part("city") RequestBody city,
	                                   @Part("state") RequestBody state,
	                                   @Part("country") RequestBody country,
	                                   @Part("zipcode") RequestBody zipcode,
	                                   @Part MultipartBody.Part user_image);

	@FormUrlEncoded
	@POST("user_register_fb_api.php")
	Call<ResponseFbLogin> getFbLogin(@Field("name") String name,
	                                 @Field("email") String email,
	                                 @Field("phone") String phone,
	                                 @Field("user_image") String user_image,
	                                 @Field("fb_id") String fb_id);
	
	@FormUrlEncoded
	@POST("user_register_gplus_api.php")
	Call<ResponseGPLogin> getGpLogin(@Field("name") String name,
	                                 @Field("email") String email,
	                                 @Field("phone") String phone,
	                                 @Field("user_image") String user_image,
	                                 @Field("gplus_id") String gplus_id);
	
	@GET(Constant.WEBSERVICE_API_PATH + "slider_list")
	Call<ResponseSlider> getSlider();
	
	@GET(Constant.WEBSERVICE_API_PATH + "cat_list")
	Call<ResponseMenu> getMenuList();
	
	@GET(Constant.WEBSERVICE_API_PATH)
	Call<ResponseMenuDetail> getMenuDetailList(@Query("menu_list_cat_id") String menu_list_cat_id,
	                                           @Query("user_id") String user_id);
	
	@GET(Constant.WEBSERVICE_API_PATH)
	Call<ResponseMenuItemDetail> getMenuDetailItem(@Query("menu_list_cat_detail_id") String menu_list_cat_detail_id,
	                                               @Query("menu_id") String menu_id);
	
	@GET(Constant.WEBSERVICE_API_PATH)
	Call<ResponseMenuSlider> getMenuSlider(@Query("menu_multiple_image") String menu_multiple_image);
	
	@FormUrlEncoded
	@POST(Constant.WEBSERVICE_API_PATH + "api_cart_add_update")
	Call<ResponseAddCart> AddCart(@Field("user_id") String user_id,
	                              @Field("menu_id") String menu_id,
	                              @Field("menu_name") String menu_name,
	                              @Field("menu_price") String menu_price,
	                              @Field("menu_qty") String menu_qty);
	
	@FormUrlEncoded
	@POST(Constant.WEBSERVICE_API_PATH + "getCartList")
	Call<ResponseCartList> getCartList(@Field("user_id") String user_id);
	
	@FormUrlEncoded
	@POST(Constant.WEBSERVICE_API_PATH + "api_cart_item_delete")
	Call<ResponseDeleteItem> deleteItem(@Field("cart_id") String cart_id,
	                                    @Field("user_id") String user_id);
	
	@GET(Constant.WEBSERVICE_API_PATH + "promo_code")
	Call<ResponseOfferList> getOfferList();
	
	@GET(Constant.WEBSERVICE_API_PATH)
	Call<ResponseOrder> getOrderList(@Query("order_summary") String order_summary);

	@FormUrlEncoded
	@POST(Constant.WEBSERVICE_API_PATH + "order_detaillist")
	Call<ResponseOrderDetails> orderDetails(@Field("order_detaillist") String order_detaillist);
	
	@GET(Constant.WEBSERVICE_API_PATH)
	Call<ResponseProfile> getProfile(@Query("get_user_profile") String get_user_profile);
	
	@GET("api_rating.php?")
	Call<ResponseRating> getRating(@Query("user_id") String user_id,
	                               @Query("rate") String rate,
	                               @Query("msg") String msg,
	                               @Query("mid") String mid);
	
	@GET(Constant.WEBSERVICE_API_PATH + "about_us_detail")
	Call<ResponseAboutUs> getAboutUs();
	
	@GET(Constant.WEBSERVICE_API_PATH)
	Call<ResponseSearch> getSearch(@Query("get_search_menu") String get_search_menu);
	
	@FormUrlEncoded
	@POST(Constant.WEBSERVICE_API_PATH + "promo_code_apply")
	Call<ResponseApplyCode> ApplyCode(@Field("promo_code_apply") String promo_code_apply,
	                                  @Field("total_cart_total") String total_cart_total);
	
	@FormUrlEncoded
	@POST(Constant.WEBSERVICE_API_PATH + "get_like")
	Call<ResponseGetLike> getLikes(@Field("menu_id") String menu_id,
	                               @Field("user_id") String user_id);
	
	@FormUrlEncoded
	@POST(Constant.WEBSERVICE_API_PATH + "like")
	Call<ResponseLike> addLike(@Field("menu_id") String menu_id,
	                           @Field("user_id") String user_id);
	
	@FormUrlEncoded
	@POST(Constant.WEBSERVICE_API_PATH + "unlike")
	Call<ResponseLike> addunlike(@Field("menu_id") String menu_id,
	                             @Field("user_id") String user_id);
	
	@POST(Constant.WEBSERVICE_API_PATH + "payment_detail")
	Call<ResponsePayment> getPayment(@Body JsonObject jsonObject);
	
	@FormUrlEncoded
	@POST(Constant.WEBSERVICE_API_PATH + "comment")
	Call<ResponseComment> addComment(@Field("menu_id") String menu_id,
	                                 @Field("user_id") String user_id,
	                                 @Field("comment") String comment);
	
	@Multipart
	@POST("user_profile_update_api.php")
	Call<ResponseUpdateProfile> UpdateProfile(@Part("user_id") RequestBody user_id,
	                                          @Part("name") RequestBody name,
	                                          @Part("email") RequestBody email,
	                                          @Part("password") RequestBody password,
	                                          @Part("phone") RequestBody phone,
	                                          @Part("address_line_1") RequestBody address_line_1,
	                                          @Part("address_line_2") RequestBody address_line_2,
	                                          @Part("city") RequestBody city,
	                                          @Part("state") RequestBody state,
	                                          @Part("country") RequestBody country,
	                                          @Part("zipcode") RequestBody zipcode,
	                                          @Part MultipartBody.Part user_image);
	
}