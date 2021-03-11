<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    protected $table = "hubs";

    protected $fillable = ['id', 'name', 'area_id', 'incharge_name', 'incharge_phone','status','created_at', 'updated_at'];

    public function area()
    {
        return $this->belongsTo('App\Area');
    }
}
