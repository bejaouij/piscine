<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    public $table = 'photo';

    /**
     * The attributes that contains the table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'photo_id';

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

}