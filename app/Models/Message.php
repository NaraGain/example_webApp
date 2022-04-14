<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

protected $fillable = [
'message',
'uid',
'u2id',
'rid',
'username'
];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function OwnBy(User $user){
        return $user->id == $this->uid;
      }

      public function OwnByname(User $user){
          return $user->id == $this->uid && $user->id == $this->u2id;
      }
    public function rooms(){
        return $this->belongsTo(room::class);
    }

    public function username(){
        return  $this->hasOne(User::class);
    }

}
