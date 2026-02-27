<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadTag extends Model
{
    use HasFactory;

    protected $fillable = ['tenant_id','name'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }

    public function leads()
    {
        return $this->belongsToMany(Lead::class, 'lead_tag_map', 'tag_id', 'lead_id');
    }
}
