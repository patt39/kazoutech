<?php


Route::get('annonces/{occupation}/new/p/create','MultiplesRouteTraitementController@annoncescreate')->name('annonces_site.create');
Route::get('annonce/{occupation}/{id}','MultiplesRouteTraitementController@annonceshow')->name('annonces_site.show');
Route::get('annonces/{occupation}/p/annonce/{id}/edit','MultiplesRouteTraitementController@annoncesedit')->name('annonces_site.edit');
Route::put('annonces/{occupation}/p/annonce/{id}','MultiplesRouteTraitementController@annoncesupdate')->name('annonces_site.update');



//Route blog traitement
Route::get('blog/p/create','MultiplesRouteTraitementController@blogscreate')->name('blog_site.create');
Route::get('blogId/p/{id}/','MultiplesRouteTraitementController@blogshow')->name('blog_site.show');
Route::get('blog/p/{id}/edit','MultiplesRouteTraitementController@blogedit')->name('blog_site.edit');
