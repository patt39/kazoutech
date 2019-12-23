<?php




Route::get('annonce/{occupation}/{id}','MultiplesRouteTraitementController@annonceshow')->name('annonces_site.show');
Route::get('annonces/{occupation}/{id}/edit','MultiplesRouteTraitementController@annoncesedit')->name('annonces_site.edit');
Route::put('annonces/{occupation}/{id}','MultiplesRouteTraitementController@annoncesupdate')->name('annonces_site.update');
