<?php

namespace Database\migration;

class create_categories_table extends BaseMigration
{

    /**
     * @var
     */
    public $table;

    /**
     * @return void
     */
    public function create()
    {
        // TODO: Implement create() method.
    }

    /**
     * @return void
     */
    public function drop()
    {
        // TODO: Implement drop() method.
    }

    /**
     * @return string
     */
    public function clear(): string
    {
        return "TRUNCATE TABLE " .$this->table;
    }
}