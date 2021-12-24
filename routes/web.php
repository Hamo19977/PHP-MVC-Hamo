<?php

Route::get("", "AdminController@homepage");
                /// AUTH
Route::get("register","AuthController@register");
Route::post("register","AuthController@registerPost");

                        /// DASHBOARD
Route::get("dashboard", "AdminController@index", 'admin');
                        /// DASHBOARD USERS
Route::get("dashboard/users", "AdminController@users",'admin');
Route::get("dashboard/users/all", "AdminController@getAllUsers",'admin');
Route::post("dashboard/users/all", "AuthController@delete",'admin');
Route::get("dashboard/users/edit", "AuthController@edit",'admin');
Route::post("dashboard/users/edit", "AuthController@updateUser",'admin');
Route::get("dashboard/users/view", "AuthController@view",'admin');


                        /// DASHBOARD Products
Route::get("dashboard/products", "AdminController@products",'admin');
Route::get("dashboard/products/all", "ProductsController@getAllProducts",'admin');
Route::post("dashboard/products/all", "ProductsController@deleteProduct",'admin');
Route::get("dashboard/products/create", "ProductsController@createProduct",'admin');
Route::post("dashboard/products/create", "ProductsController@storeProducts",'admin');
Route::get("dashboard/products/edit", "ProductsController@edit",'admin');
Route::post("dashboard/products/edit", "ProductsController@updateProduct",'admin');
Route::get("dashboard/products/view", "ProductsController@view",'admin');
Route::post("dashboard/products/view", "ReviewsController@store",'admin');
                        //// DASHBOARD Rewies
Route::get("dashboard/reviews", "ReviewsController@index",'admin');
Route::get("dashboard/reviews/all", "ReviewsController@allReviews",'admin');
Route::post("dashboard/reviews/all", "ReviewsController@delete",'admin');
Route::get("dashboard/reviews/edit", "ReviewsController@edit",'admin');
Route::post("dashboard/reviews/edit", "ReviewsController@editReview",'admin');
Route::get("dashboard/reviews/create", "ReviewsController@create",'admin');
Route::post("dashboard/reviews/create", "ReviewsController@storeReviews",'admin');


Route::get("signin", "AuthController@signin");
Route::post("signin", "AuthController@login");
Route::get("signup", "AuthController@signup");
Route::post("signup", "AuthController@storeUser");
