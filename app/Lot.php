<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $table = "lots";

protected $fillable = ['id', 'warehouse_id', 'capacity', 'lot_name','prefix','qr_code_generate', 'created_at', 'updated_at'];
}
