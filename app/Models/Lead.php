<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id','stage_id','assigned_to','name','email','phone','company','status','source','value','created_by'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function assigned()
    {
        return $this->belongsTo(User::class, 'assigned_to');
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function notes()
    {
        return $this->hasMany(LeadNote::class);
    }

    public function activities()
    {
        return $this->hasMany(LeadActivity::class);
    }

    public function tags()
    {
        return $this->belongsToMany(LeadTag::class, 'lead_tag_map', 'lead_id', 'tag_id');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class);
    }
}
