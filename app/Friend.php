<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class friend extends Model
{
    public function contacts()
    {
        return $this->hasMany('App\FriendContact');
    }
}
