<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class item extends Model
{
    use HasFactory;

    public $table = "item";

    protected $primaryKey = 'code';


    protected $keyType = 'string';

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class, 'category_id');
    }

    public function barangmasuk(): HasMany
    {
        return $this->HasMany(BarangMasuk::class, 'code');
    }

    public function detailbarangmasuk(): HasMany
    {
        return $this->HasMany(DetailBarangMasuk::class, 'item_code');
    }

    public function detailPengadaan():HasMany
    {
        return $this->hasMany(detailPengadaan::class, 'item_code');
    }

    public function detailPermintaan():HasMany
    {
        return $this->hasMany(detailPermintaan::class, 'item_code');
    }


    protected $fillable =
    [
        'name',
        'code',
        'brand',
        'unit',
        'price',
        'stock',
        'minimum_stock',
        'category_id',
        'description',

    ];
}
