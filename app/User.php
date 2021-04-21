<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    const USER_ACTIVE = 1;
    const STUDENT = 1;
    const TEACHER = 2;
    const ADMIN = 3;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name', 'birthday', 'email', 'active_flg'
    ];

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

    public function getUserConfirm()
    {
        return User::where('active_flg','<>', self::USER_ACTIVE)
            ->get();
    }

    public function getAllUser()
    {
        return User::where('active_flg', self::USER_ACTIVE)
            ->get();
    }

    public function getDetail($id)
    {
        return User::where('id', $id)->first();
    }

    public function createUser($request)
    {
        $user = new User();

        $user->username = $request->username;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->user_type = $request->user_type;
        $user->birthday = $request->birthday;
        $user->email = $request->email;

        $user->save();
    }

    public function updateUser($request, $id)
    {
        $updateUser = User::findOrFail($id);
        $updateUser->username = $request->username;
        $updateUser->first_name = $request->first_name;
        $updateUser->last_name = $request->last_name;
        $updateUser->user_type = $request->user_type;
        $updateUser->birthday = $request->birthday;
        $updateUser->email = $request->email;

        $updateUser->save();
    }

    public function changePassword($password, $id)
    {
        $updateUser = User::findOrFail($id);
        $updateUser->password = Hash::make($password);

        $updateUser->save();
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id);
        return $user->delete();
    }
}
