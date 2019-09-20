<?php
/**
 * Created by PhpStorm.
 * User: boclairtemgoua
 * Date: 2019-08-10
 * Time: 06:40
 */

Route::group(['namespace' => 'Admin'], function(){


    /*
     * Je tiens à preciser que les routes dans cette partis seront sour
     * forme de https://kazoutech/api/exemple.com
     * donc je recupere le "api/exemple" a ne
     * pas confondre avec celle du web
     */

    /* Admin */
    require(__DIR__ . DIRECTORY_SEPARATOR . 'faqs.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'occupations.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'permissions.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'roles.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'laravel-auditing.php');

    /* C'est route son dans la cartella partial */
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'tags.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'cities.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'colors.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'category_faqs.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'tasks.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'notes.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'partial'. DIRECTORY_SEPARATOR . 'diplomas.php');


    /* C'est route son dans la cartella page */
    require(__DIR__ . DIRECTORY_SEPARATOR . 'page'. DIRECTORY_SEPARATOR . 'abouts.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'page'. DIRECTORY_SEPARATOR . 'testimonials.php');

    /* C'est route son dans la cartella info */
    require(__DIR__ . DIRECTORY_SEPARATOR . 'info'. DIRECTORY_SEPARATOR . 'legal_notice.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'info'. DIRECTORY_SEPARATOR . 'documentation.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'info'. DIRECTORY_SEPARATOR . 'conditions.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'info'. DIRECTORY_SEPARATOR . 'licence_site.php');
    require(__DIR__ . DIRECTORY_SEPARATOR . 'info'. DIRECTORY_SEPARATOR . 'policy_privacy.php');





});
