<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BarangMasuk extends Model
{
    use HasFactory;

    public $table = "barang_masuk";

    protected $guarded = [];

    protected $primaryKey = 'code';

    protected $keyType = 'string';

    public $incrementing = false;

    public function supplier():BelongsTo
    {
        return $this->belongsTo(Supplier::class, 'supplier_code');
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class, 'nip');
    }

    public function detailbarangmasuk():HasMany
    {
        return $this->hasMany(DetailBarangMasuk::class);
    }
}
