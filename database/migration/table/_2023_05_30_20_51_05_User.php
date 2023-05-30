<?php

namespace Database\migration\table;

use Database\migration\BaseMigration;

/**
 *
 */
class _2023_05_30_20_51_05_User extends BaseMigration
{


    /**
     * @var string
     */
    public string $table = "users";

    /**
     * @return array
     */
    public function create(): array
    {
        return [
            'id' => $this->id(),
            'name' => $this->string(),
            'email' => $this->string(),
            'password' => $this->string(),
        ];
    }

}