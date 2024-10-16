<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'alias'];

    public $table = "kategori";

    public function items()
    {
        return $this->hasMany(Item::class, 'category_id');
    }
}
