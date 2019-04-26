<?php

Route::get('/', 'FrontendController@index')->name('index');
Route::get('/{any}', 'FrontendController@index');
Route::get('/{any}/{any1}', 'FrontendController@index');
//Route::view('/{any}', 'layouts.master');
//Route::view('/{any}/{any1}', 'layouts.master');


Route::prefix('admin/panel/')->group(function(){
    Auth::routes();
    Route::get('logout','Auth\LoginController@logout')->name('logout');
    Route::get('/home', 'AdminController@index')->name('home');

    Route::resource('slider','SliderController')->only(['index','store','edit','update']);
    Route::get('slider/{slider}', 'SliderController@destroy')->name('slider.delete');

    Route::resource('service','ServiceController')->only(['index','create','store','edit','update']);
    Route::get('service/show/{service}','ServiceController@show')->name('service.view');
    Route::get('service/{service}','ServiceController@destroy')->name('service.delete');

    Route::resource('package','PackageController');
    Route::get('package/{package}','PackageController@destroy')->name('package.delete');
    Route::get('package/{package}/show','PackageController@show')->name('package.show');

    Route::resource('teamMember','TeamMemberController')->only(['index','create','store','edit','update']);
    Route::get('teamMember/{teamMember}','TeamMemberController@destroy')->name('teamMember.delete');

    Route::resource('gallery', 'GalleryController')->only(['index','store']);
    Route::get('gallery/{gallery}','GalleryController@destroy')->name('gallery.delete');


    Route::get('welcome_note', 'GeneralController@welcome_note_page')->name('welcome.note');
    Route::get('company_profile', 'GeneralController@company_profile_page')->name('company.profile');
    Route::get('aboutUs', 'GeneralController@about_us_page')->name('aboutUs');
    Route::get('coverage', 'GeneralController@coverage_page')->name('coverage');
    Route::get('corporate', 'GeneralController@corporate_page')->name('corporate');
    Route::get('billing', 'GeneralController@billing_page')->name('billing');
    Route::get('support', 'GeneralController@support_page')->name('support');
    Route::post('general/store', 'GeneralController@store')->name('general.store');

    Route::get('contact', 'ContactUsController@index')->name('contactUs.index');
    Route::post('contact', 'ContactUsController@store')->name('contactUs.store');
    Route::get('contact/create', 'ContactUsController@create')->name('contactUs.create');
    Route::get('contact/edit/{contact}/','ContactUsController@edit')->name('contactUs.edit');
    Route::get('contact/show/{contact}/','ContactUsController@show')->name('contactUs.show');
    Route::post('contact/{contact}','ContactUsController@update')->name('contactUs.update');
    Route::get('contact/{contact}','ContactUsController@destroy')->name('contactUs.delete');

    Route::get('user-message', 'UserMessageController@index')->name('user.message');
});

