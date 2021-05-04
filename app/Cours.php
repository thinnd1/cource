<?php

namespace App;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $table = 'cours';
    protected $fillable = [
        'intitule',
        'user_id',
        'formation_id'
    ];

    public function planning()
    {
        return $this->hasMany(Planning::class, 'cour_id');
    }

    public function formation()
    {
        return $this->belongsTo(Formation::class, 'formation_id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'cours_users');
    }

    public function getCource($search = null)
    {
        $cource =  Cours::orderBy('created_at', 'DESC')
            ->get();
        if ($search) {
            $cource = Cours::orderBy('created_at', 'DESC')
                ->where()
                ->get();
        }
        return $cource;
    }

    public function getDetail($id)
    {
        return Cours::where('id', $id)
            ->first();
    }

    public function createCour($request)
    {
        $cour = new Cours();

        $cour->intitule = $request['intitule'];
        $cour->user_id = $request['user_id'];
        $cour->formation_id = $request['formation_id'];

        $cour->save();
    }

    public function updateCource($id, $request)
    {
        $cour = Cours::findOrFail($id);

        $cour->intitule = $request['intitule'];
        $cour->user_id = $request['user_id'];
        $cour->formation_id = $request['formation_id'];

        $cour->save();
    }

    public function deleteCource($id)
    {
        $cours = Cours::findOrFail($id);
        return $cours->delete();
    }

    public function getCourByTeacher($id)
    {
        return Cours::where('user_id', $id)->get();
    }

    public function getCourByStudent($formation_id, $search = null)
    {
        $cours = Cours::where('formation_id', $formation_id)->get();

        if ($search) {
            $cours = Cours::where('formation_id', $formation_id)
                ->where('cours.id', $search)
                ->get();
        }

        return $cours;
    }

    public function getSchedule($id, $search = null)
    {
        $getSchedule =  DB::table('cours')
            ->where('user_id', $id)
            ->leftJoin('plannings', 'cours.id', '=', 'plannings.cours_id')
            ->get();
        if ($search) {
            $getSchedule =  DB::table('cours')
                ->where('user_id', $id)
                ->where('cours.id', $search)
                ->leftJoin('plannings', 'cours.id', '=', 'plannings.cours_id')
                ->get();
        }

        return $getSchedule;
    }
}
