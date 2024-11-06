<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Supplier extends Model
{
    use HasFactory;

    public $table = "supplier";

    protected $guarded = [''];

    protected $primaryKey = 'code';

    protected $keyType = 'string';

    public $incrementing = false;

    public function getRouteKeyName()
    {
        return 'code';
    }

    public function barangMasuk(): HasOne
    {
        return $this->hasOne(BarangMasuk::class);
    }

    protected $fillable =
    [
        'code',
        'name',
        'address',
    ];
}
