<?php

namespace App\Http\Controllers;

use App\Cours;
use App\Planning;
use Illuminate\Http\Request;
use App\User;
use App\Formation;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    protected $user;
    protected $formation;
    protected $cours;

    public function __construct
    (
        User $user,
        Formation $formation,
        Cours $cours
    )
    {
        $this->user = $user;
        $this->formation = $formation;
        $this->cours = $cours;
    }

    public function getInformation()
    {
        $id = Auth::user()->id;
        $information = $this->user->getDetail($id);
        return view('etudiant/myinformation', ['information' => $information]);
    }

    public function getUpdateInformation()
    {
        $editinfor = $this->user->getDetail(Auth::user()->id);
        return view('etudiant/updateinformation', ['editinfor' => $editinfor]);
    }

    public function updateInformation(Request $request)
    {
        $updateInformation = $request->all();
        $id = Auth::user()->id;
        $this->user->updateInformation($updateInformation, $id);
        return redirect()->route('getInformationStudent')->with('key', 'Update Successful');
    }

    public function getFormation(Request $request)
    {
        $formation_id = Auth::user()->formation_id;
        $search = $request->input('cours_id');
        $cours = $this->cours->getCourByStudent($formation_id, $search);

        return view('etudiant/formation', ['cours' => $cours]);
    }


    public function getListCource()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $cours = $user->cours()->get();
//        dd($user1->pivot->cours_id);
        return view('etudiant/listcour', ['cours' => $cours]);
    }

    public function getCreateCource()
    {
        $formation_id = Auth::user()->formation_id;
        $cours = $this->cours->getCourByStudent($formation_id);
        return view('etudiant/createCour', ['cours' => $cours]);
    }

    public function createCource($id)
    {
        $idUser = Auth::user()->id;
        $user = User::find($idUser);
        $user->cours()->attach($id);

        return redirect()->route('getCreateCourceEtudiant');
    }

    public function cancelCource($id)
    {
        $idUser = Auth::user()->id;
        $user = User::find($idUser);
        $user->cours()->detach($id);

        return redirect()->route('getListCource');
    }

    public function getSchedule()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $cours = $user->cours()->get();
        $time = array();

        foreach ($cours as $cour) {
            $time = Planning::where('cours_id', $cour->pivot->cours_id)->get(['date_debut', 'date_fin']);
        }

        return view('etudiant/schedule', ['cours' => $cours]);
    }
}
