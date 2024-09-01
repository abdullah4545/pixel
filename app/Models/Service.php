<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    static public function getData()
    {
        return self::where('status', '1')->get();
    }

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function priceing()
    {
        return $this->hasMany(PricePlan::class, 'service_id');
    }

    public function projects()
    {
        return $this->hasMany(Project::class, 'service_id');
    }
}
