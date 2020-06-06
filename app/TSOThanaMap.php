<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TSOThanaMap extends Model
{
    protected $table = "tbl_tso_thana_map";
    public $timestamps = false;

    public function tso()
    {
        return $this->hasOne('App\TSO', 'id', 'tso_id');
    }

    public function thana()
    {
        return $this->hasOne('App\Thana', 'id', 'thana_id');
    }
}
