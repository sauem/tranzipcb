<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "css/media_query.css",
        "css/bootstrap.css",
        "https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css",
        "css/animate.css",
        "https://fonts.googleapis.com/css?family=Poppins",
        "css/owl.carousel.css",
        "css/owl.theme.default.css",
        "css/style_1.css",
        ["css/caculate.css?v=1.3", "async" => true],
    ];
    public $js = [
        "js/modernizr-3.5.0.min.js",
        "js/owl.carousel.min.js",
        "js/handlebars-v4.7.6.js",
        ["js/handlebar-helper.js?v=1.2", "async" => true],
        "js/knockout.js",
        "https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js",
        "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js",
        "js/jquery.waypoints.min.js",
        "https://cdn.jsdelivr.net/npm/sweetalert2@9",
        ["js/readfile.js?v=1.4" ,"async" =>true],
        ["js/caculate.js?v=1.3" ,"async" =>true],
        "js/pcb.handle.js?v=1.2",
        "js/main.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
      //  'yii\bootstrap\BootstrapAsset',
    ];
}
