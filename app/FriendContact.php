<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendContact extends Model
{
    public function friend()
    {
        return $this->belongsTo('App\Friend');
    }
}
