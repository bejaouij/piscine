<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{

    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    public $table = 'shop';

    /**
     * The attributes that contains the table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'shop_siret';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

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
        "shop_position_y" => "float",
        "shop_position_x" => "float",
        "shop_is_delivery_possible" => "boolean"
    ];

}