<?php

namespace App\Config\Statuses;

enum TaskStatus: string
{
    case Start = 'start';
    case Process = 'process';
    case Finish = 'finish';
}
