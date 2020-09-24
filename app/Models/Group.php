<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'record'
    ];

    public function members() {
        return $this->hasMany(Member::class);
    }

    public function trainings() {
        return $this->hasMany(Training::class);
    }
}
