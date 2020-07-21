<?php

use mdm\admin\components\MenuHelper;
use yii\helpers\Url;
use common\helper\Helper;
use yii\helpers\ArrayHelper;

$callback = function ($menu) {

    return [
        'label' => $menu['name'],
        'url' => [$menu['route']],
        'options' => [
            'class' => '',
        ],
        'items' => $menu['children']
    ];
};
$menu = MenuHelper::getAssignedMenu(Yii::$app->user->id, 0, $callback);
$controller = Yii::$app->controller->id;
$action = Url::toRoute(Yii::$app->controller->getRoute());
$path = explode('/', $action);
$path = array_filter($path);

?>
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
                                        src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg"
                                        alt="User Image">
        <div>
            <p class="app-sidebar__user-name"><?= Yii::$app->user->getIdentity()->username?></p>
            <p class="app-sidebar__user-designation">Admin</p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item " href="<?= Url::toRoute(['site/index'])?>">
                <i class="app-menu__icon fa fa-dashboard"></i>
                <span class="app-menu__label">Trang chủ</span>
            </a>
        </li>
        <?php if (!empty($menu)) {
            foreach ($menu as $k => $item) {
                $items = $item['items'];
                if ($items && !empty($items)) {
                    ?>
                    <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                                    class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label"><?= $item['label']?></span><i
                                    class="treeview-indicator fa fa-angle-right"></i></a>
                        <ul class="treeview-menu">
                            <li><a class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>
                                    Bootstrap Elements</a></li>
                            <li><a class="treeview-item" href="https://fontawesome.com/v4.7.0/icons/" target="_blank"
                                   rel="noopener"><i class="icon fa fa-circle-o"></i> Font Icons</a></li>
                            <li><a class="treeview-item" href="ui-cards.html"><i class="icon fa fa-circle-o"></i> Cards</a></li>
                            <li><a class="treeview-item" href="widgets.html"><i class="icon fa fa-circle-o"></i> Widgets</a></li>
                        </ul>
                    </li>
                    <?php
                } else {
                    ?>
                    <li>
                        <a class="app-menu__item " href="<?= Url::toRoute($item['url'][0])?>">
                            <i class="app-menu__icon fa fa-dashboard"></i>
                            <span class="app-menu__label"><?= $item['label']?></span>
                        </a>
                    </li>
                    <?php
                }
            }
        } ?>
    </ul>
</aside>