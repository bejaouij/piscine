<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use CoenJacobs\EloquentCompositePrimaryKeys\HasCompositePrimaryKey;

class Review extends Model
{
    use HasCompositePrimaryKey;

    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    public $table = 'review';

    /**
     * The attributes that contains the table primary key.
     *
     * @var string
     */
    protected $primaryKey = array('customer_id', 'product_id');

    /**
     * The attributes that contains the table primary key.
     *
     * @var string
     */
    //protected $primaryKey = ['customer_id', 'product_id'];

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
        "review_mark" => "integer"
    ];

    /**
     * Get the user who wrote the review
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function customer()
    {
        //return $this->hasOne('App\Customer', 'customer_id', 'user_id');
    }

}