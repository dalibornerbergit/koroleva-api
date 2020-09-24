<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $with = ['group'];

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'birth_date',
        'record',
        'group_id'
    ];

    public function group() {
        return $this->belongsTo(Group::class);
    }

    public function trainings()
    {
        return $this->belongsToMany(Training::class, 'presence');
    }
}
