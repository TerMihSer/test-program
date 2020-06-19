<?php

use app\modules\messages\widgets\Messages;

/* @var $this yii\web\View */
/* @var $modelMessagesForm app\modules\messages\models\MessagesForm */
/* @var array $messages дерево сообщений */

?>
<div class="messages">
    <? echo $this->render("form", ['modelMessagesForm' => $modelMessagesForm, 'messageId' => 0]); ?>
    <div class="messages__content">
        <? echo Messages::widget(['messages' => $messages]); ?>
    </div>

</div>