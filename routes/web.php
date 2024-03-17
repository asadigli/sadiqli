<?php

// Route::prefix('/{lang?}/')->group(function($lang=null){
  Route::get('/', 'Controller@homepage');
  Route::get('/contact', 'Controller@contact');
  Route::get('/suggest-new-topic', 'Controller@suggest');
  Route::get('/all-blogs', 'DataController@all');
  Route::get('/blog/{slug}', 'Controller@blog');
  Route::get('/about', 'Controller@about');
  Route::get('/search', 'Controller@search');
  Route::get('/404', 'Controller@notfound')->name('404');
  Route::post('/contact','UserController@tocontact');
  Route::post('/addnewcomment','UserController@addnewcomment');
  Route::post('/addnewsubscription','UserController@addnewsubscription');
  Route::post('/likeblog','UserController@likeblog');
  Route::get('/index.html', function(){
      return redirect('/');
  });
  Route::get('contact.html', function(){
      return redirect('/contact');
  });
  Route::get('/page/{slug}','UserController@getpage');
  Route::get('post-rightsidebar.html', function(){
      return redirect('/blog');
  });
// });
