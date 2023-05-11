<?php

namespace Database\migration\table;

use Database\migration\BaseMigration;

/**
 *
 */
class _2023_05_11_21_12_26_create_users_table extends BaseMigration
{


    /**
     * @var string
     */
    public string $table = "_2023_05_11_21_12_26_create_users_table";

    /**
     * @return array
     */
    public function create(): array
    {
        return [
            'id' => $this->id(),

        ];
    }

}