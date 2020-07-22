<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <script>
        var config = {
            ajaxUpload : "<?= Url::toRoute(['ajax/ajax-file'])?>",
            ajaxLoadPropites : "<?= Url::toRoute(['ajax/load-propities'])?>",
            maxSize : 10485760,
            type : ['application/zip','application/x-rar','application/x-zip-compressed']
        }
    </script>
</head>
<body>
<?php $this->beginBody() ?>
<?= $this->render("../parts/nav")?>
<div class="container-fluid py-5 my-5">
    <?= $content?>
</div>
<?= $this->render("../parts/footer")?>
<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="fa fa-arrow-up"></i></a>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
