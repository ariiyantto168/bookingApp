<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Internals extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at','created_at'];

    protected $table = 'internals';
    protected $primaryKey = 'idinternals';
    protected $fillable = [
        'name', 'created_at'
    ];

    protected $casts = [
        'active' => 'boolean'
    ];

    public function orders()
    {
        return $this->belongsToMany('App\Models\Orders','orderdetails','idinternals','idorders')->withTimestamps();;
    }


}
