<?php

namespace App;

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
        'login', 'prenom', 'nom', 'formation_id', 'mdp'
    ];

    public function username()
    {
        return 'login';
    }

    public function getAuthPassword() {
        return $this->mdp;
    }

    public function formation()
    {
        return $this->belongsTo('App\Formation');
    }

    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'cours_users');
    }

    public function getUserConfirm()
    {
        return User::where('active_flg','<>', self::USER_ACTIVE)
            ->get();
    }
    public function getTeacher()
    {
        return User::where('type', self::TEACHER)->get();
    }

    public function getAllUser($id, $search = null)
    {
        $listuser = User::where('id', '<>', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        if ($search) {
            $listuser = User::where('id', '<>', $id)
                ->where('login', 'like', '%' . $search . '%')
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

        $user->login = $request['username'];
        $user->prenom = $request['first_name'];
        $user->nom = $request['last_name'];
        $user->type = $request['user_type'];
        $user->formation_id = $request['formation_id'];
        $user->mdp = Hash::make($request['password']);

        $user->save();
    }

    public function register($request)
    {
        $user = new User();

        $user->login = $request['username'];
        $user->type = $request['user_type'];
        $user->formation_id = $request['formation_id'];
        $user->mdp = Hash::make($request['mdp']);

        $user->save();
    }

    public function updateUser($request, $id)
    {
        $updateUser = User::findOrFail($id);

        $updateUser->login = $request['username'];
        $updateUser->prenom = $request['first_name'];
        $updateUser->nom = $request['last_name'];
        $updateUser->type = $request['user_type'];
        $updateUser->mdp = Hash::make($request['password']);

        $updateUser->save();
    }

    public function updateInformation($request, $id)
    {
        $updateUser = User::findOrFail($id);

        $updateUser->login = $request['username'];
        $updateUser->prenom = $request['first_name'];
        $updateUser->nom = $request['last_name'];
        $updateUser->mdp = Hash::make($request['password']);

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
