<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pegawai extends Model
{
    use HasFactory;

    public $table = "pegawai";

    protected $guarded = [];

    protected $keyType = 'string';

    protected $primaryKey = 'nip';

    public function user(): HasMany
    {
        return $this->hasMany(User::class, 'nip');
    }

    public function pengadaan():HasMany
    {
        return $this->hasMany(Pengadaan::class);
    }

    public function permintaan():HasMany
    {
        return $this->hasMany(Permintaan::class);
    }

    protected $fillable =
    [
       'nip',
       'name',
    ];
}
