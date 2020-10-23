<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;

    protected $table = "banks";

    protected $fillable = ['name', 'email', 'website', 'about'];

    protected $guarded = [];

    public function accounts(){
        $this->hasMany('App\Account');
    }

    public function users(){
        return $this->hasManyThrough('App\Account', 'App\User');
    }
}
