<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\User;
use App\Models\Classroom;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','visible_password','classroom_id','school','phone','is_admin',
    ];
    private $limit = 10;
    private $order = 'DESC';
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function classroom(){
      return $this->belongsTo(Classroom::class);
    }

    public function storeUser($data){
        $data['visible_password'] = $data['password'];
        $data['password'] = bcrypt($data['password']);
        $data['classroom_id'] = $data['classroom'];
        $data['is_admin'] =0;
        return User::create($data);

    }

    public function allUsers(){
      return User::orderBy('created_at',$this->order)->paginate($this->limit);
    }

    public function findUser($id){
        return User::find($id);
    }

    public function updateUser($data,$id){
        $user = User::find($id);
        if($data['password']){
            $user->password = bcrypt($data['password']);
            $user->visible_password = $data['password'];
        }

        $user->classroom_id = $data['classroom'];
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->phone = $data['phone'];
        $user->school = $data['school'];
        $user->save();
        return $user;

    }

    public function deleteUser($id){
        return User::find($id)->delete();
    }




}
