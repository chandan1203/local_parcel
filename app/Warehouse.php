<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = "warehouses";

    protected $fillable = ['id', 'name', 'area_id','user_id', 'hub_id', 'capacity', 'incharge_name', 'incharge_phone','created_at', 'updated_at'];

    public function area()
    {
        return $this->belongsTo('App\Area');
    }

    public function hub()
    {
        return $this->belongsTo('App\Hub');
    }

    public function user()
    {
        return $this->belongsTo('App\User','user_id','id');
    }
}
