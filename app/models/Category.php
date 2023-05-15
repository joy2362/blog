<?php

namespace App\models;

class Category extends BaseModel
{
    public array $fillable = ['lastName', 'address', 'city'];
    public string $table = 'categories';

}