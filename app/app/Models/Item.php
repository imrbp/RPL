<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $table = 'items';
    protected $fillable = [
        'name',
        'description',
        'quantity'
    ];

    public $timestamps = false;

    public function inventory()
    {
        return $this->hasOne(Inventory::class, 'item_id', 'id');
    }
}
