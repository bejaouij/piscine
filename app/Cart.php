<?php

namespace App;

use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;
use App\Copy;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasCompositePrimaryKey;

    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    protected $table = 'cart';

    /**
     * The attributes that contains the table primary key.
     *
     * @var array
     */
    protected $primaryKey = ['copy_id', 'customer_id'];

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
        "cart_quantity" => "integer"
    ];

    public function copy() {
        return $this->hasOne('App\Copy', "copy_id", "copy_id");
    }

    public function getAllPrice() {
        return $this->copy->product->getDiscountedPrice()*$this->cart_quantity  ;
    }
}
