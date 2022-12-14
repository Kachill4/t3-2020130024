<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function author(){
        return $this->belongsTo('App\Models\author');
    }

    protected $primaryKey = 'id';

    public $incrementing = false;

    protected $keyType = 'char';
}
