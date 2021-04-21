<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{

    public function deletePlanning($id)
    {
        $planning = Planning::findOrFail($id);
        return $planning->delete();
    }
}
