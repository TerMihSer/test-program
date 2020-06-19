<?php

namespace app\modules\messages\models;

use Yii;
use yii\base\Model;

class MessagesFormat extends Model
{
    /**
     * Подготавливает данные
     * @see getMessagesTree
     * @param array $messagesArray массив сообщений
     * @return array подготовленные данные
     */
    private function prepareDataForTree($messagesArray)
    {
        $messages = [];
        foreach ($messagesArray as $key => $value) {
            $messages[$value['id']] = $value;
        }
        return $messages;
    }

    /**
     * Строит дерево из массива сообщений
     * @param array $messagesArray массив сообщений
     * @return array массив преобразованный в древовидную структуру с parent и child
     */
    public function getMessagesTree($messagesArray)
    {
        $dataset = $this->prepareDataForTree($messagesArray);
        $messagesTree = array();

        foreach ($dataset as $id => &$node) {
            if (empty($node['parent_id'])) {
                $messagesTree[$id] = &$node;
            } else {
                $dataset[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $messagesTree;
    }

    /**
     * @param array $message сообщение
     * @return array сообщение подготовленное для отображения в виджете
     */
    public function getMessageTree($message)
    {
        return $this->prepareDataForTree(array($message));
    }
}
