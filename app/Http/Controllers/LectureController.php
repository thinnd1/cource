<?php

namespace App\Http\Controllers;

use App\Cours;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
{
    protected $user;
    protected $cours;

    public function __construct
    (
        User $user, Cours $cours
    )
    {
        $this->user = $user;
        $this->cours = $cours;
    }

    public function getInformation()
    {
        $id = Auth::user()->id;
        $user = $this->user->getDetail($id);
        return view('enseignant/myinformation', ['user' => $user]);
    }

    public function getUpdateInformation()
    {
        $editinfor = $this->user->getDetail(Auth::user()->id);
        return view('enseignant/updateinformation', ['editinfor' => $editinfor]);
    }

    public function updateInformation(Request $request)
    {
        $updateInformation = $request->all();
        $id = Auth::user()->id;
        $this->user->updateInformation($updateInformation, $id);
        return redirect()->route('getInformationLecture')->with('key', 'Update Successful');
    }

    public function getCourByTeacher()
    {
        $idEnseignant = Auth::user()->id;
        $cources = $this->cours->getCourByTeacher($idEnseignant);
        return view('enseignant/getcour', ['cources'  => $cources]);
    }
}
