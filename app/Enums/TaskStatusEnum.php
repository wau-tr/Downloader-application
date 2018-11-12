<?php

namespace App\Enums;

class TaskStatusEnum {
    
    const Pendind = 'pending';
    const Downloading = 'downloading';
    const Complete = 'complete';
    const Error = 'error';

    public static function getStatuses()
    {
        return [
            self::Pendind,
            self::Downloading,
            self::Complete,
            self::Error
        ];
    }

}