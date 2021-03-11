<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    protected $table = "areas";

    protected $fillable = ['id', 'name', 'level_color', 'generate_level','status', 'created_at', 'updated_at'];

    public function hubs()
    {
        return $this->hasMany('App\Hub');
    }
}
