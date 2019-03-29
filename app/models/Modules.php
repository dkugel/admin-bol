<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Modules extends Eloquent {
    protected $table = 'directorio_general';

    public function module_categories()
    {
        return $this->hasMany();
    }
}