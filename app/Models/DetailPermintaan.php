<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailPermintaan extends Model
{
    use HasFactory;

    public $table = "detail_permintaan";

    protected $guarded = [''];

    protected $primaryKey = 'code';

    protected $keyType = 'string';

    public $incrementing = false;

    public function permintaan():BelongsTo
    {
        return $this->belongsTo(Permintaan::class, 'request_code');
    }

    public function item():BelongsTo
    {
        return $this->belongsTo(item::class, 'item_code');
    }
}
