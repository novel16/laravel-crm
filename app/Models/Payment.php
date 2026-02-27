<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id','amount','provider','reference','status','paid_at'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
