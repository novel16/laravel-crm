<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pipeline extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id','name'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function stages()
    {
        return $this->hasMany(Stage::class);
    }
}
