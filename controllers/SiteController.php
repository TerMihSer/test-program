<?php

namespace app\controllers;

use app\modules\messages\models\Messages;
use app\modules\messages\models\MessagesForm;
use app\modules\messages\models\MessagesRepository;
use app\modules\messages\models\MessagesFormat;
use yii\web\Controller;



class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $messages = new Messages(new MessagesRepository(), new MessagesFormat());
        $arrayMessagesTree = $messages->showMessages();
        return $this->render('index', ["modelMessagesForm" => new MessagesForm(), "messages" => $arrayMessagesTree]);
    }
}
