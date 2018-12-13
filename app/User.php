<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    protected $table = 'user';

    /**
     * The attributes that contains the table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'user_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_firstname',
        'user_lastname',
        'email',
        'password',
        'user_phone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Retrieve the related customer
     *
     * @return: App\Customer?
     */
    public function customer() {
        return $this->belongsTo('App\Customer', 'user_id', 'user_id');
    }

    /**
     * Retrieve the related shops
     *
     * @return: [App\Shop]?
     */
    public function shops() {
        return $this->belongsToMany('App\Shop', 'leading', 'user_id', 'shop_siret');
    }

    public function carts() {
        return Cart::where('customer_id', $this->user_id)->get();
    }
}
