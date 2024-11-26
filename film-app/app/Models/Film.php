<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    public function scopeByDecade(Builder $query, int $year): void
    {
        $query
            ->where('year', '>=', $year)
            ->where('year', '<', ($year + 10));
    }
}