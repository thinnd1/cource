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

    public function deleteCource($id)
    {
        $cours = Cours::findOrFail($id);
        return $cours->delete();
    }
}
