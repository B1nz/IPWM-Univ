<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected  $table = 'barang';

    protected $fillable = ['name', 'ruangan_id', 'total', 'broken', 'created_by', 'updated_by'];

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }
}
