<?php


Route::get('annonces/{occupation}/p/annonce/new/create','MultiplesRouteTraitementController@annoncescreate')->name('annonces_site.create');
Route::get('annonce/{occupation}/{id}','MultiplesRouteTraitementController@annonceshow')->name('annonces_site.show');
Route::get('annonces/{occupation}/p/annonce/{id}/edit','MultiplesRouteTraitementController@annoncesedit')->name('annonces_site.edit');
Route::put('annonces/{occupation}/p/annonce/{id}','MultiplesRouteTraitementController@annoncesupdate')->name('annonces_site.update');
Route::get('user/{occupation}/annonce/like/{id}','MultiplesRouteTraitementController@annoncelike')->name('annonces_site.like');


Route::get('occupations/{occupation}/{categoryoccupation}/new/create','MultiplesRouteTraitementController@annoncesbycategoryoccupationcreate')->name('annonces_site.save_by_catgoryoccupation_create');
Route::post('occupations/{occupation}/{categoryoccupation}/new/store','MultiplesRouteTraitementController@annoncesbycategoryoccupationstore')->name('annonces_site.save_by_catgoryoccupation_store');

//Route blog traitement
Route::get('blog/p/new/create','MultiplesRouteTraitementController@blogscreate')->name('blog_site.create');
Route::post('blog/p/new/store','MultiplesRouteTraitementController@blogsstore')->name('blog_site.store');
Route::get('blogId/p/{id}/','MultiplesRouteTraitementController@blogshow')->name('blog_site.show');
Route::get('blog/p/{id}/edit','MultiplesRouteTraitementController@blogedit')->name('blog_site.edit');
