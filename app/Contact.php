<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    // Table Name
    protected $table = 'contacts';
    // Primari Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;
}
