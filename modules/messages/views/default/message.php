<?php

use app\modules\messages\widgets\Messages;

/* @var array $messages дерево сообщений */
echo Messages::widget(['messages' => $messages]);