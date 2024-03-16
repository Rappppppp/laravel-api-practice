<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CDs extends Model
{
    use HasFactory;

    protected $table = 'cds'; // I put this because mysql modifies the table into => c_ds
    protected $guarded = [];
}
