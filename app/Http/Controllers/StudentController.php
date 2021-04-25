<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    protected $user;

    public function __construct
    (
        User $user
    )
    {
        $this->user = $user;
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
}
