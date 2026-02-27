<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id','email','role_id','token','status','expires_at'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }
}
