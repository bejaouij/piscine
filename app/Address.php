<?php

namespace App;


use Illuminate\Database\Eloquent\Model;

class Address extends Model
{

    /**
     * The attributes that contains the table name.
     *
     * @var string
     */
    public $table = 'address';

    /**
     * The attributes that contains the table primary key.
     *
     * @var string
     */
    protected $primaryKey = 'address_id';

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
        "address_street_number" => "integer"
    ];

    /**
     * Génère un string de l'addresse
     *
     * @return String
     */
    public function toStringTop()
    {
        return $this->address_street_number . " " . $this->address_street;
    }

    public function toStringBottom()
    {
        return $this->address_postal_code . " " . $this->address_city;
    }

}