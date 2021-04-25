<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
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
}
