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
        "js/knockout.js",
        "https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js",
        "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js",
        "js/jquery.waypoints.min.js",
        "js/readfile.js",
        "js/pcb.handle.js",
        "js/main.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
      //  'yii\bootstrap\BootstrapAsset',
    ];
}
