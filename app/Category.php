<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    public $table = 'category';

    /**
     * The attributes that contains the table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'category_id';

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
    protected $fillable = ['category_name'];

}