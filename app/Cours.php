<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    protected $table = 'course';
    protected $fillable = [
        'title',
        'code_cour'
    ];

    public function getCource()
    {
        return Cours::orderBy('created_at', 'DESC')
            ->get();
    }

    public function getDetail($id)
    {
        return Cours::where('id', $id)
            ->first();
    }

    public function createCour($request)
    {
        $cour = new Cours();

        $cour->title = $request['title'];
        $cour->code_cour = $request['code_cour'];
        $cour->address = $request['address'];

        $cour->save();
    }

    public function updateCource($id, $request)
    {
        $cour = Cours::findOrFail($id);

        $cour->title = $request['title'];
        $cour->code_cour = $request['code_cour'];
        $cour->address = $request['address'];

        $cour->save();
    }

    public function deleteCource($id)
    {
        $cours = Cours::findOrFail($id);
        return $cours->delete();
    }
}
