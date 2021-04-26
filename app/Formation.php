<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $table = 'formation';

    protected $fillable = [
        'intitule'
    ];

    public function getDetail($id)
    {
        return Formation::where('id', $id)
            ->first();
    }

    public function getFormation($search = null)
    {
        $formation = Formation::orderBy('created_at', 'DESC')
            ->get();

        if ($search) {
            $formation = Formation::orderBy('created_at', 'DESC')
                ->where('intitule', 'like', '%' . $search . '%')
                ->get();
        }

        return $formation;
    }

    public function createFormation($request)
    {
        $formation = new Formation();
        $formation->intitule = $request['intitule'];
        $formation->save();
    }

    public function updateFormation($id, $request)
    {
        $formation = Formation::findOrFail($id);
        $formation->intitule = $request['intitule'];
        $formation->save();
    }

    public function deleteFormation($id)
    {
        $formation = Formation::findOrFail($id);
        return $formation->delete();
    }
}
