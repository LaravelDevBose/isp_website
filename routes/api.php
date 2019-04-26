<?php

Route::get('menu-list', 'Api\FrontendController@menu_list');
Route::get('footer-info', 'Api\FrontendController@footer_info');
Route::get('slider-info', 'Api\FrontendController@slider_images');
Route::get('services', 'Api\FrontendController@services_data');
Route::get('price-table', 'Api\FrontendController@price_tables_data');
Route::get('price-list', 'Api\FrontendController@price_list_data');
Route::post('general-page', 'Api\FrontendController@general_pages_data');
Route::get('contact-us', 'Api\FrontendController@contact_us_data');
Route::get('/service/{service}', 'Api\FrontendController@single_service_data');

Route::post('user-message/store', 'Api\FrontendController@store');
