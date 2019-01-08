<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leading extends Model
{
    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    protected $table = 'leading';

    /**
     * The attributes that informs whether the table contains timestamp fields.
     *
     * @var bool
     */
    public $timestamps = false;
}
