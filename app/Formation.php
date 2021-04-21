<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Formation extends Model
{
    public function deleteFormation($id)
    {
        $formation = Formation::findOrFail($id);
        return $formation->delete();
    }
}
