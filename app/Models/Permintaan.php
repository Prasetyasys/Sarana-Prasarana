<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Permintaan extends Model
{
    use HasFactory;

    public $table = "permintaan";

    protected $guarded = [''];

    protected $primaryKey = 'code';

    protected $keyType = 'string';

    public $incrementing = false;

    public function pegawai():BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'nip');
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(Item::class, 'code');
    }

    public function detailPermintaan():HasOne
    {
        return $this->hasOne(detailPermintaan::class, 'request_code');
    }

    public function barangKeluar():HasMany
    {
        return $this->hasMany(BarangKeluar::class, 'request_code');
    }

    protected $fillable = [
        'code',
        'nip',
        'sifat',
        'regarding',
        'status',
        'total_item',
    ];
}
