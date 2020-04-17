<?php

    namespace App\Enums;

    use BenSampo\Enum\Enum;

    /**
     * Class TaskStatusEnum
     *
     * @package App\Enums
     */
    final class TaskStatusEnum extends Enum
    {
        const CREATED     = 0;
        const IN_PROGRESS = 1;
        const COMPLETED   = 2;
        const CANCELED    = 3;
    }
