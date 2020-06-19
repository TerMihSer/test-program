<?php

namespace app\modules\messages\models;

use yii\db\ActiveRecord;

class MessagesRepository extends ActiveRecord
{

    public static function tableName()
    {
        return '{{messages}}';
    }

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['text', 'required', 'message' => 'Пожалуйста, введите сообщение'],
            ['parent_id', 'required']
        ];
    }

    /**
     * Возвращает массив сообщений
     * @return array|ActiveRecord[]
     */
    public function getMessages()
    {
        $query = $this->find();
        return $query->asArray()->all();
    }

    /**
     * @param int $id идентификатор сообщения
     * @return array сообщение
     */
    public function getMessage($id)
    {
        return self::findOne($id)->attributes;
    }

}