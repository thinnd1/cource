<?php

namespace App\Http\Controllers;

use App\Cours;
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

    }

    public function getCreateCource()
    {

    }

    public function createCource(Request $request)
    {
        $data = $request->all();
        $user_id = Auth::user()->id;

        return redirect('')->route('');
    }
}
