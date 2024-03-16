<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class CartItems extends Model
{
    use HasFactory;
    protected $table = "cart_items";
    protected $guarded = [];
    
    public function cd()
    {
        return $this->belongsTo(CDs::class, 'cd_id');
    }
}
