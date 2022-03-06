<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

   protected $fillable = [
       'body'
   ];
//this method allow us to check user if user in the table 
   public function likeBy(User $user){
     return $this->likes->contains('user_id',$user->id);
   }

   public function OwnBy(User $user){
    return $user->id == $this->user_id;
  }

  public function EditOwnBy(User $user){
    return $user->id == $this->user_id;
  }


//this function is make to  relationship between user and post table 
   public function user(){
     return $this->belongsTo(User::class);
   }

   public function likes(){
     return $this->hasMany(Likes::class);
   }
}
