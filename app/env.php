<?php

/*************************
 *
 *     SYSTEME VARIABLE
 *
 ************************/

//prod OR dev
$APP_ENV = "prod";

// Link Variable
$SYSTEM_FRAMEWORK = "@tyrositeframework/";
$SYSTEM_COMPOSANT = "composant/";
$SYSTEM_EXTENSION = "file_extension/";
$SYSTEM_ASSETS = "file_assets/";
$SYSTEM_JAVASCRIPT = "file_javascript/";
$SYSTEM_CSS = "file_css/";


/*************************
 *
 *     INIT VARIABLE
 *
 ************************/

//Variable GLOBAL
$env_name = "Wassim Bouridah";
$env_logo = $SYSTEM_ASSETS . "logo.png";
$env_url = "https://wassimbouridah.fr"; /* for <meta> */
$env_desc = "Site internet du producteur de vidéo au format cour Wassim bouridah"; /* for <meta> */
$env_lang = "fr"; /* for <html lang=""> */

// PAGE MANAGEMENT
$env_page = array(
    //404
    0 => $env_name,
    //Page
    1 => array(
        "title" => $env_name,
        "name" => "Accueil",
        "url" => "./",
        "css" => "index.css",
    ),
    2 => array(
        "title" => "Test",
        "name" => "Exemple",
        "url" => "./exemple.php",
        "css" => "exemple.css",
    ),
    /*...*/
);

// FILE CSS GLOBAL
$env_css_global = array(
    "all.css",
);

// FILE JS GLOBAL
$env_js_global = array(
    "start.js"
);

/*************************
 *
 *     YOUR VARIABLE
 *
 ************************/

$env_titre = "";