<?php

namespace Database\migration;

abstract class BaseMigration
{
    /**
     * @var string
     */
    public string $table;

    /**
     * @return mixed
     */
    abstract public function create(): mixed;

    /**
     * @return string
     */
    public function drop(): string
    {
        return "DROP TABLE IF EXISTS " . $this->table;
    }

    /**
     * @return string
     */
    public function clear(): string
    {
        return "TRUNCATE TABLE " . $this->table;
    }

    public function id(): string
    {
        return " INT NOT NULL AUTO_INCREMENT PRIMARY KEY";
    }

    public function string($length = 255): string
    {
        return " varchar(${length})";
    }

    public function integer(): string
    {
        return " integer";
    }


}