<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginHistory extends Model
{
    protected $fillable = ['admin_id', 'action'];

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}