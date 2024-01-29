<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ConnectPoint extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'date'];
    protected $dates = ['date'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
