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
    abstract public function create();

    /**
     * @return string
     */
    public function drop(): string
    {
        return "DROP TABLE IF EXISTS ".$this->table;
    }

    /**
     * @return string
     */
    public function clear(): string
    {
        return "TRUNCATE TABLE " .$this->table;
    }}