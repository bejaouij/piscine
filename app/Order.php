<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    public $table = 'order';

    /**
     * The attributes that contains the table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'order_id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * The attributes that informs whether the table contains timestamp fields.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [''];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        "order_discount_fidelity" => "float"
    ];

}