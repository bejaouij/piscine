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
    protected $primaryKey = 'product_id';

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

    /**
     * Get the price with the discount
     *
     * @return int
     */
    public function getDiscountedPrice()
    {
        return $this->product_price - $this->product_price * ($this->product_discount_percentage / 100);
    }

    /**
     * Get the shop that owns the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function shop()
    {
        return $this->belongsTo('App\Shop', "shop_siret", 'shop_siret');
    }

    /**
     * Get the category associated to the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'category_id');
    }

    /**
     * Get the photo associated to the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function photo_path()
    {
        return $this->hasOne('App\Photo', 'photo_id', 'photo_id');
    }

    /**
     * Get the copies for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function copies()
    {
        return $this->hasMany('App\Copy', 'product_id', 'product_id');
    }

    /**
     * Get the reviews for the product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany('App\Review', 'product_id', 'product_id');
    }
}

