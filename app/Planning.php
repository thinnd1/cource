<?php

namespace App;

use App\Http\Controllers\PlanningController;
use Illuminate\Database\Eloquent\Model;

class Planning extends Model
{
    protected $fillable = [
        'date_debut',
        'date_fin',
        'cour_id'
    ];
    protected $table = 'plannings';

    public function cours()
    {
        return $this->belongsTo('App\Cours');
    }

    public function getPlanning($search = null)
    {
        return Planning::get();
    }

    public function getDetail($id)
    {
        return Planning::where('id', $id)->first();
    }

    public function createPlanning($request)
    {
        $planning = new Planning();

        $planning->date_debut = $request['date_debut'];
        $planning->date_fin = $request['date_fin'];
        $planning->cours_id = $request['cours_id'];
        $planning->save();
    }

    public function updatePlaning($request, $id)
    {
        $planning = Planning::findOrFail($id);

        $planning->date_debut = $request['date_debut'];
        $planning->date_fin = $request['date_fin'];
        $planning->cours_id = $request['cours_id'];

        $planning->save();
    }

    public function deletePlanning($id)
    {
        $planning = Planning::findOrFail($id);
        return $planning->delete();
    }
}
