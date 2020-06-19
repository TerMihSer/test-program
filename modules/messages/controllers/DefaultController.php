<?php

namespace app\modules\messages\controllers;

use yii\web\Controller;
use yii\helpers\Url;
use Yii;
use app\modules\messages\models\Messages;
use app\modules\messages\models\MessagesForm;
use app\modules\messages\models\MessagesRepository;
use app\modules\messages\models\MessagesFormat;

/**
 * Default controller for the `messages` module
 */
class DefaultController extends Controller
{
    /**
     * Сохранение сообщения
     * @return string возвращает сохраненное сообщение
     */
    public function actionSaveMessage()
    {
        $messages = new Messages(new MessagesRepository, new MessagesFormat);
        $params = Yii::$app->request->post('MessagesForm');
        $message = $messages->saveMessage($params);
        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('message', [
                'messages' => $message
            ]);
        } else {
            $this->redirect(Url::to($params['form_url']));
        }
    }

    /**
     * @return string возвращает форму
     */
    public function actionGetForm()
    {
        if (Yii::$app->request->isAjax) {
            $params = Yii::$app->request->post();
            return $this->renderAjax('form', [
                'modelMessagesForm' => new MessagesForm(),
                'messageId' => $params['message_id'] ? $params['message_id'] : 0,
            ]);
        }
    }
}
