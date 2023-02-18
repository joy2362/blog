<?php

namespace Database\migration;

abstract class BaseMigration
{
    public $table;
    abstract public function create();

    abstract public function drop();

    abstract public function clear();
}