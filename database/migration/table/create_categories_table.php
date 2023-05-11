<?php

namespace Database\migration\table;

use Database\migration\BaseMigration;

/**
 *
 */
class create_categories_table extends BaseMigration
{


    /**
     * @var string
     */
    public string $table = "categories";

    /**
     * @return array
     */
    public function create(): array
    {
        return [
            'id' => $this->id(),
            'lastName' => $this->string(),
            'address' => $this->string(),
            'city' => $this->string()
        ];
    }

}