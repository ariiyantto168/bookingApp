<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Externals extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at','created_at'];

    protected $table = 'externals';
    protected $primaryKey = 'idexternals';
    protected $fillable = [
        'name', 'created_at'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Orders','orderdetails','idexternals','idorders')->withTimestamps();;
    }
}
