<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Accessories extends Model
{
    protected $table 	= 'accessories';
    protected $fillable = ['apartment_id', 'internet', 'parking',
     'tv', 'klima', 'vesmasina', 'ljubimci'];
}
