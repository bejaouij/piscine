<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

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

    /**
     * Get order lines from the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function orderLines()
    {
        return $this->hasMany('App\OrderLine', "order_id", "order_id");
    }

    /**
     * Get the address from the order (not necessarily the user address)
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function address()
    {
        return $this->hasOne('App\Address', 'address_id', 'address_id');
    }

    /**
     * Get the customer from the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        return $this->hasOne('App\Customer', 'user_id', 'customer_id');
    }

    /**
     * Get the shop from the order
     *
     * Search the shop in the product from the copy from one orderline from the order
     *
     * @return \App\Shop
     */
    public function getShop()
    {

        $orderLine = $this->orderLines->first();

        $copy = $orderLine->copy;

        $product = $copy->product;

        $shop = $product->shop;

        return $shop;

    }


}