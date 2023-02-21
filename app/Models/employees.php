<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'firstname',
        'lastname'
    ];

    public function companies() 
    {
        return $this->belongsTo(companies::class);
    }
}
