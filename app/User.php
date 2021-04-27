<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    const USER_ACTIVE = true;
    const STUDENT = 'etudiant';
    const TEACHER = 'enseignant';
    const ADMIN = 'admin';

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
    public function getTeacher()
    {

    }

    public function getAllUser($id, $search = null)
    {
        $listuser = User::where('active_flg', self::USER_ACTIVE)
            ->where('id', '<>', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        if ($search) {
            $listuser = User::where('active_flg', self::USER_ACTIVE)
                ->where('id', '<>', $id)
                ->where('username', 'like', '%' . $search . '%')
                ->orderBy('created_at', 'DESC')
                ->get();
        }
        return $listuser;
    }

    public function getDetail($id)
    {
        return User::where('id', $id)->first();
    }

    public function createUser($request)
    {
        $user = new User();

        $user->username = $request['username'];
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->user_type = $request['user_type'];
        $user->active_flg = 1;
        $user->password = Hash::make($request['password']);
        $user->email = $request['email'];

        $user->save();
    }

    public function register($request)
    {
        $user = new User();

        $user->username = $request['username'];
        $user->active_flg = 0;
        $user->password = Hash::make($request['password']);

        $user->save();
    }

    public function updateUser($request, $id)
    {
        $updateUser = User::findOrFail($id);

        $updateUser->username = $request['username'];
        $updateUser->first_name = $request['first_name'];
        $updateUser->last_name = $request['last_name'];
        $updateUser->user_type = $request['user_type'];
        $updateUser->active_flg = true;
        $updateUser->password = Hash::make($request['password']);
        $updateUser->email = $request['email'];

        $updateUser->save();
    }

    public function updateInformation($request, $id)
    {
        $updateUser = User::findOrFail($id);

        $updateUser->username = $request['username'];
        $updateUser->first_name = $request['first_name'];
        $updateUser->last_name = $request['last_name'];
        $updateUser->password = Hash::make($request['password']);
        $updateUser->email = $request['email'];

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

    public function confirmUser($id)
    {
        $confirmUser = User::findOrFail($id);

        $confirmUser->active_flg = 1;

        $confirmUser->save();
    }
}
