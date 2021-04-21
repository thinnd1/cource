<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    public function deleteCource($id)
    {
        $cours = Cours::findOrFail($id);
        return $cours->delete();
    }
}
