<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    public $table = 'product';


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
        "product_price" => "float",
        "product_discount_percentage" => "float",
        "product_booking_duration" => "integer"
    ];


}