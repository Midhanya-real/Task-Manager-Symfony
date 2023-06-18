<?php

namespace App\Config\Statuses;

enum TaskStatus: string
{
    case Start = 'start';
    case Process = 'process';
    case Finish = 'finish';

    public static function getAsArray(): array
    {
        return array_reduce(
            self::cases(),
            static fn(array $choices, TaskStatus $type) => $choices + [$type->name => $type->value],
            [],
        );
    }
}
