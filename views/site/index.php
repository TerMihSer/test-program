<?php

/* @var $this yii\web\View */
/* @var $modelMessagesForm app\modules\messages\models\MessagesForm */

$this->title = 'My Yii Application';
?>

<?php
echo $this->renderFile('@app/modules/messages/views/default/main.php', ['modelMessagesForm' => $modelMessagesForm, 'parentIdForm' => 0, 'messages' => $messages]);
?>