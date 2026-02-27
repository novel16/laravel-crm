<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;

    protected $fillable = ['name','price','max_users','max_leads'];

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
}
