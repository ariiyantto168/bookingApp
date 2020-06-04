<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Orders extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at','created_at'];

    protected $table = 'orders';
    protected $primaryKey = 'idorders';
    protected $fillable = [
        'name',  'created_at'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function internals()
    {
        return $this->belongsToMany('App\Models\Internals','orderdetails','idorders','idinternals')->withTimestamps();;
    }

    public function externals()
    {
        return $this->belongsToMany('App\Models\Externals','orderdetails','idorders','idexternals')->withTimestamps();;
    }


}
