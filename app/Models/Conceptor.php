<?php

namespace App\Models;

use App\Models\Document\Document2020;
use App\Models\Document\Document2021;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conceptor extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function document2020s()
    {
        return $this->hasMany(Document2020::class);
    }

    public function document2021s()
    {
        return $this->hasMany(Document2021::class);
    }
}
