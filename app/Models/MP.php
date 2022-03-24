<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MP extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primary_key='id';
    protected $guarded = [];
}
