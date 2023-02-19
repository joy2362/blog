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
        $data = [];
        $data['firstName'] = 'varchar(255)';
        $data['lastName'] = 'varchar(255)';
        $data['address'] = 'varchar(255)';
        $data['city'] = 'varchar(255)';
        return $data;
    }

}