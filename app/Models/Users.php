<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Barang;
use App\Models\Pinjaman;

class Users extends Model
{
    use HasFactory;

    protected $table = 'users';

    public function pinjaman(): HasMany
    {
        return $this->hasMany(Pinjaman::class);
    }
}
