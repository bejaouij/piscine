<?php

namespace App;


use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasCompositePrimaryKey;

    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    public $table = 'orderLine';

    /**
     * The attributes that contains the table primary key.
     *
     * @var array
     */
    protected $primaryKey = ['order_id', 'copy_id'];

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
        "orderline_quantity" => "integer",
        "orderline_final_unit_price" => "float"
    ];

    /**
     * Get the order from the order line
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function order()
    {
        return $this->hasOne('App\Order', 'order_id', 'order_id');
    }

    /**
     * Get the copy form the OrderLine
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function copy()
    {
        return $this->hasOne('App\Copy', 'copy_id', 'copy_id');
    }

}