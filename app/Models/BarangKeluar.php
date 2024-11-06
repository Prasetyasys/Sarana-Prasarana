<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BarangKeluar extends Model
{
    use HasFactory;

    public $table = "barang_keluar";

    protected $guarded = [''];

    protected $primaryKey = 'code';

    protected $keyType = 'string';

    public $incrementing = false;

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'code');
    }

    public function pegawai(): BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'nip');
    }

    public function permintaan(): BelongsTo
    {
        return $this->belongsTo(Permintaan::class, 'code');
    }

    public function detailBarangKeluar(): HasMany
    {
        return $this->hasMany(DetailBarangKeluar::class, 'outgoing_item_code');
    }


}
