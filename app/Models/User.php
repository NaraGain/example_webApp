<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
   
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
//the function posts in use to define relationship between user table and post table
    public function posts(){
        //Post::class is Post.php in models folder
        return $this->hasMany(Post::class);

        
    }
    public function OwnBy(User $user){
        return $user->id == $this->user_id;
      }
    
    public function likes(){
        //Post::class is Post.php in models folder
        return $this->hasMany(likes::class);

        
    }

    public function message(){
        //Post::class is Post.php in models folder
        return $this->hasMany(Message::class);

        
    }
}
