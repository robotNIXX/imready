<?php

    namespace App\Enums;

    use BenSampo\Enum\Enum;

    /**
     * Class TaskPriorityEnum
     *
     * @package App\Enums
     */
    final class TaskPriorityEnum extends Enum
    {
        const LOW    = 0;
        const MIDDLE = 1;
        const HIGH   = 2;
    }
