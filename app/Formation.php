<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    protected $table = 'formation';

    protected $fillable = [
        'title'
    ];

    public function getFormation($search = null)
    {
        $formation = Formation::orderBy('created_at', 'DESC')
            ->get();

        if ($search) {
            $formation = Formation::orderBy('created_at', 'DESC')
                ->where('title', 'like', '%' . $search . '%')
                ->get();
        }

        return $formation;
    }

    public function createFormation($request)
    {
        $formation = new Formation();
        $formation->title = $request['title'];
        $formation->save();
    }

    public function updateFormation($id, $request)
    {
        $formation = Formation::findOrFail($id);
        $formation->title = $request['title'];
        $formation->save();
    }

    public function deleteFormation($id)
    {
        $formation = Formation::findOrFail($id);
        return $formation->delete();
    }
}
