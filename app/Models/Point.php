<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;
    protected $fillable = ['connect_id', 'status', 'number'];
    public function indicator()
    {
        return $this->belongsTo(Indicator::class, 'number', 'id');
    }
}
