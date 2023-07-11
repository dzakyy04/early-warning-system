<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data2021 extends Model
{
    use HasFactory;

    public function konseptor()
{
    return $this->belongsTo(Konseptor::class);
}
}
