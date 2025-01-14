<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class DetailPengadaan extends Model
{
    use HasFactory;

    public $table = "detail_pengadaan";

    protected $guarded = [''];

    protected $primaryKey = 'code';

    protected $keyType = 'string';

    public $incrementing = false;

    public function pengadaan():BelongsTo
    {
        return $this->belongsTo(Pengadaan::class, 'submission_code');
    }

    public function item():BelongsTo
    {
        return $this->belongsTo(item::class, 'item_code');
    }

}
