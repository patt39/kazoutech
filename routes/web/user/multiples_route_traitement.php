<?php




Route::get('annonces/{occupation}/new/p/create','MultiplesRouteTraitementController@annoncescreate')->name('annonces_site.create');
Route::get('annonce/{occupation}/{id}','MultiplesRouteTraitementController@annonceshow')->name('annonces_site.show');
Route::get('annonces/{occupation}/p/{id}/edit','MultiplesRouteTraitementController@annoncesedit')->name('annonces_site.edit');
Route::put('annonces/{occupation}/p/{id}','MultiplesRouteTraitementController@annoncesupdate')->name('annonces_site.update');
