<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengadaan extends Model
{
    use HasFactory;

    public $table = "pengadaan";

    protected $guarded = ['id'];

    public function pegawai():BelongsTo
    {
        return $this->belongsTo(Pegawai::class, 'nip');
    }

    public function detailPengadaan():HasOne
    {
        return $this->hasOne(detailPengadaan::class, 'submission_code');
    }

    protected $fillable = [
        'code',
        'nip',
        'regarding',
        'status',
        'total_item',
    ];
}
