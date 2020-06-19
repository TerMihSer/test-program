<?php
/* @var string $text текст сообщения */
/* @var int $messageId id сообщения */
/* @var string $url урл для получения формы */
?>
<div class="messages__message"><?= $text ?>
    <div><a class="messages__reply" href="#" data-message_id="<?= $messageId ?>"
            data-url="<?= $url ?>">Ответить</a>
    </div>