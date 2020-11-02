<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Training extends Model
{
    use HasFactory;

    protected $with = ['group'];

    protected $fillable = [
        'date',
        'record',
        'group_id'
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function members()
    {
        return $this->belongsToMany(Member::class, 'presence');
    }
}
