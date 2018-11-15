<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    protected $table = 'customer';

    /**
     * The attributes that contains the table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * The attributes that informs whether the table contains timestamp fields.
     *
     * @var bool
     */
	public $timestamps = false;
}
