<?php

namespace App;


use Illuminate\Database\Eloquent\Model;


class Copy extends Model
{

    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    public $table = 'copy';

    /**
     * The attributes that contains the table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'copy_id';

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
        "copy_stock" => "integer"
    ];

    public function product()
    {
        $this->hasOne('App\Product', "product_id", 'product_id');
    }

}