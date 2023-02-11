<?php

namespace App\Models;

use DateTimeInterface;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // protected $casts = [
    //     'created_at' => 'datetime:Y-m-d',
    // ];
    
    protected function serializeDate(DateTimeInterface $date)
    {
        return $date->diffForHumans();
    }
    
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
}
