<?php

namespace app\modules\messages\assets;

use yii\web\AssetBundle;

/**
 * Комплект ресурсов модуля сообщений.
 */
class MessagesAsset extends AssetBundle
{
    public $sourcePath = '../modules/messages/web';
    public $css = [
        'css/messages.css',
    ];
    public $js = [
        'js/messages.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
