<?php

namespace app\modules\messages\widgets;

use Yii;
use \app\widgets\Alert;

class FormAlert extends \app\widgets\Alert
{
    public $alertTypes = [
        'module-messages-form-error' => 'alert-danger',
    ];
}