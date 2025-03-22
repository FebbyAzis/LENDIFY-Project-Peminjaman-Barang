<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Users;
use App\Models\Pinjaman;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    public function pinjaman(): HasMany
    {
        return $this->hasMany(Pinjaman::class);
    }
}
