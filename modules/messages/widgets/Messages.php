<?

namespace app\modules\messages\widgets;

use app\modules\messages\assets\MessagesAsset;
use yii\base\Widget;
use yii\helpers\Url;


class Messages extends Widget
{
    public $messages;

    public function run()
    {
        MessagesAsset::register($this->view);
        return $this->renderItems($this->messages);
    }

    /**
     * Рекурсивная отрисовка дерева сообщений
     * @param array $messages массив сообщения
     * @return bool|string html дерева сообщений
     */
    public function renderItems($messages)
    {
        if (is_array($messages)) {

            $tree = '';
            foreach ($messages as $key => $message) {

                $tree .= $this->render('startMessage', ['text' => $message['text'], 'messageId' => $message['id'], 'url' => Url::to(['/messages/default/get-form'])]);
                if (isset($message['childs'])) {
                    $tree .= $this->renderItems($message['childs']);
                }
                $tree .= $this->render('endMessage');
            }

        } else {
            return false;
        }
        return $tree;
    }

}