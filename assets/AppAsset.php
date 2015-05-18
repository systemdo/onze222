<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        // 'lib/dataTable/css/jquery.dataTables.min.css',
        'lib/dataTable/css/dataTables.bootstrap.css',
        'lib/ui/jquery-ui.structure.css',
        'lib/ui/jquery-ui.theme.css',
        'lib/ui/jquery-ui.theme.css',
        // 'lib/ui/jquery-ui.min.css',
        'css/responsive-tables.css',
        'theme/bootstrap.css',
        'theme/usebootstrap.css',
        'css/site.css',
    ];
    public $js = [
        'lib/dataTable/js/jquery.dataTables.min.js',
        'js/bootstrap/bootstrap.min.js',
        'js/responsive-tables.js',
        'lib/ui/jquery-ui.min.js',
        'js/jquery.maskedinput.min.js',
        'js/jquery.maskMoney.min.js',
        'js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
