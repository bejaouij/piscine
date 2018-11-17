<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Review extends Model
{

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
     * Set the keys for a save update query.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    protected function setKeysForSaveQuery(Builder $query)
    {
        $query
            ->where('product_id', '=', $this->getAttribute('product_id'))
            ->where('customer_id', '=', $this->getAttribute('customer_id'));
        return $query;
    }
}