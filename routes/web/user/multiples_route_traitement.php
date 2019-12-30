<?php


Route::get('annonces/{occupation}/new/p/create','MultiplesRouteTraitementController@annoncescreate')->name('annonces_site.create');
Route::get('annonce/{occupation}/{id}','MultiplesRouteTraitementController@annonceshow')->name('annonces_site.show');
Route::get('annonces/{occupation}/p/annonce/{id}/edit','MultiplesRouteTraitementController@annoncesedit')->name('annonces_site.edit');
Route::put('annonces/{occupation}/p/annonce/{id}','MultiplesRouteTraitementController@annoncesupdate')->name('annonces_site.update');



//Route blog traitement
Route::get('blogs/create','MultiplesRouteTraitementController@blogscreate')->name('blogs_site.create');
