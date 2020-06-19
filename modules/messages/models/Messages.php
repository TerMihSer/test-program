<?php

namespace app\modules\messages\models;

use Yii;
use yii\base\Model;
use yii\db\ActiveRecord;


class Messages extends Model
{
    public $repository;
    public $format;

    public function __construct(ActiveRecord $repository, Model $format, $config = [])
    {
        parent::__construct($config);
        $this->repository = $repository;
        $this->format = $format;
    }

    /**
     * Сохраняет сообщение
     * @param array $params атрибуты сохраняемого сообщения.
     * @return array|bool возвращает сохраненное сообщение в виде дерева для возможного отображения через виджет.
     */
    public function saveMessage($params)
    {
        $modelMessagesForm = new MessagesForm();
        $modelMessagesForm->attributes = $params;

        if ($modelMessagesForm->validate()) {
            $this->repository->attributes = $modelMessagesForm->attributes;
            $this->repository->save();
            $result = $this->repository->getMessage(Yii::$app->db->lastInsertID);
            $message = $this->format->getMessageTree($result);
            return $message;
        } else {
            $errors = $modelMessagesForm->getErrors();
            foreach ($errors['text'] as $content) {
                Yii::$app->session->setFlash('module-messages-form-error', $content);
            }
        }
    }

    /**
     * @return array возвращает сообщения в виде дерева.
     */
    public function showMessages()
    {
        $messagesArray = $this->repository->getMessages();
        $arrayMessagesTree = $this->format->getMessagesTree($messagesArray);
        return $arrayMessagesTree;
    }


}