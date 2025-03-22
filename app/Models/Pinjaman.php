<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Users;
use App\Models\Barang;

class Pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }
    public function users(): BelongsTo
    {
        return $this->belongsTo(Users::class);
    }
}
