<?php

use Vatsim\Osticket\AttachmentRetention\Plugin;

return [
    'id' => 'attachment:retention',
    'version' => '1.0',
    'ost_version' => '1.16',
    'name' => 'Attachment Retention',
    'author' => 'VATSIM Tech Team <tech@vatsim.net>',
    'description' => 'Customize retention policies for thread attachments',
    'plugin' => 'bootstrap.php:'.Plugin::class,
];
