<?php

namespace app\modules\messages\models;

use yii\base\Model;

/**
 * MessagesForm is the model behind the messages form.
 */
class MessagesForm extends Model
{
    public $text;
    public $parent_id;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['text', 'required', 'message' => 'Пожалуйста, введите сообщение'],
            ['parent_id', 'required', 'message' => false]
        ];
    }

    /**
     * @return array customized attribute labels
     */
    public function attributeLabels()
    {
        return [
            'verifyCode' => 'Verification Code',
        ];
    }

}
