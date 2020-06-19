<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\Url;
use app\modules\messages\widgets\FormAlert;


/* @var $this yii\web\View */
/* @var $modelMessagesForm app\modules\messages\models\MessagesForm */
/* @var int $messageId id сообщения */

?>

<?php $form = ActiveForm::begin(['options' => ['id' => 'w' . $messageId, 'class' => 'messages__form', 'data-url' => Url::to(['/messages/default/save-message'])]]);
$form->action = Url::to(['/messages/default/save-message']);
?>


<?= $form->field($modelMessagesForm, 'text')->textarea(['rows' => '6'])->label('Текст сообщения') ?>
<?= $form->field($modelMessagesForm, 'parent_id')->hiddenInput(['value' => $messageId])->label(false) ?>
<?= $form->field($modelMessagesForm, 'form_url')->hiddenInput(['value' => Url::to()])->label(false) ?>
<?= FormAlert::widget(); ?>
    <div class="form-group">
        <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
    </div>

<?php ActiveForm::end(); ?>