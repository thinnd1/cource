<?php

namespace App\Http\Controllers;

use App\Cours;
use App\Formation;
use App\Planning;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $user;
    protected $cource;
    protected $planning;
    protected $formation;

    public function __construct
    (
        User $user,
        Cours $cource,
        Formation $formation,
        Planning $planning
    )
    {
        $this->user = $user;
        $this->cource = $cource;
        $this->formation = $formation;
        $this->planning = $planning;
    }

    public function getListUser(Request $request)
    {
        $id = Auth::user()->id;
        $formation = $this->formation->getFormation();
        $search = trim($request->input('search_account'));
        $users = $this->user->getAllUser($id, $search);
        return view('admin.home', compact('users', 'formation'));
    }

    public function getCreateUser()
    {
        $formation = $this->formation->getFormation();
        return view("admin/createuser", ['formation' => $formation]);
    }

    public function createUser(Request $request)
    {
        $createUser = $request->all();
        $this->user->createUser($createUser);

        return redirect()->route('getListUser')->with('key', 'Create User successful');
    }

    public function getUpdateUser($id)
    {
        $formation = $this->formation->getFormation();
        $editinfor = $this->user->getDetail($id);
        return view('admin/updateuser', ['editinfor' => $editinfor], ['formation' => $formation]);
    }

    public function updateUser(Request $request, $id)
    {
        $updateUser = $request->all();
        $this->user->updateUser($updateUser, $id);
        return redirect()->route('getListUser')->with('key', 'Cập nhật thông tin thành công');
    }

    public function getInformation()
    {
        $id = Auth::user()->id;
        $information = $this->user->getDetail($id);
        return view('admin/myinformation', ['information' => $information]);
    }

    public function getUpdateInformation()
    {
        $editinfor = $this->user->getDetail(Auth::user()->id);
        return view('admin/editformation', ['editinfor' => $editinfor]);
    }

    public function updateInformation(Request $request)
    {
        $updateInformation = $request->all();
        $id = Auth::user()->id;
        $this->user->updateInformation($updateInformation, $id);

        return redirect()->route('getInformation')->with('key', 'Update Successful');
    }

    public function deleteUser($id)
    {
        $this->user->deleteUser($id);
        return redirect()->route('getListUser')->with('key', 'User deleted');
    }

    public function getConfirm()
    {
        $users = $this->user->getUserConfirm();
        return view('admin/confirmregister', ['users'  => $users]);
    }

// xac nhan dang ky thanh cong hay ko
    public function acceptRegiter(Request $request, $id)
    {
        $this->user->confirmUser($id);
        return redirect()->route('getConfirm');
    }

// manage cource
    public function getCreateCource()
    {
        $teacher = $this->user->getTeacher();
        $formation = $this->formation->getFormation();
        return view('admin/createcour', ['teacher' => $teacher, 'formation' => $formation]);
    }

    public function createCource(Request $request)
    {
        $cource = $request->all();
        $this->cource->createCour($cource);
        return redirect()->route('getCource');
    }

    public function getCource()
    {
        $cources = $this->cource->getCource();
        return view('admin/getcour', ['cources'  => $cources]);
    }

    public function getUpdateCource($id)
    {
        $teacher = $this->user->getTeacher();
        $formation = $this->formation->getFormation();
        $cources = $this->cource->getDetail($id);
        return view('admin/updatecour', ['cources' => $cources, 'teacher' => $teacher, 'formation' => $formation]);
    }

    public function updateCource(Request $request, $id)
    {
        $cource = $request->all();
        $this->cource->updateCource($id, $cource);
        return redirect()->route('getCource');
    }

    public function deleteCource($id)
    {
        $this->cource->deleteCource($id);
        return redirect()->route('getCource')->with('key', 'Delete successful');
    }

    // quan ly dao tao
    public function getFormation()
    {
        $formations = $this->formation->getFormation();
        return view('admin/formation', ['formations' => $formations]);
    }

    public function getCreateFormation()
    {
        return view('admin/createformation');
    }

    public function createFormation(Request $request)
    {
        $formation = $request->all();
        $this->formation->createFormation($formation);
        return redirect()->route('getFormation');
    }

    public function getUpdateFormation($id)
    {
        $formation = $this->formation->getDetail($id);
        return view('admin/editformation', ['formation' => $formation]);
    }

    public function updateFormation(Request $request, $id)
    {
        $formation = $request->all();
        $this->formation->updateFormation($id, $formation);
        return redirect()->route('');
    }

    public function deleteFormation($id)
    {
        $this->cource->deleteCource($id);
        return redirect()->route('getListUser')->with('key', 'Delete Successful');
    }

// manage planning
    public function getPlanning()
    {
        $planning = $this->planning->getPlanning();
        return view('admin/planning', ['planning' => $planning]);
    }

    public function getCreatePlanning()
    {
        $cours = $this->cource->getCource();
        return view('admin/createplanning', ['cours' => $cours]);
    }

    public function createPlanning(Request $request)
    {
        $planning = $request->all();
        $this->planning->createPlanning($planning);
        return redirect()->route('getPlanning');
    }

    public function getUpdatePlanning($id)
    {
        $planning = $this->planning->getDetail($id);
        $cours = $this->cource->getCource();
        return view('admin/updateplanning', ['planning' => $planning, 'cours' => $cours]);
    }

    public function updatePlaning(Request $request, $id)
    {
        $planning = $request->all();
        $this->planning->updatePlaning($planning, $id);
        return redirect()->route('getPlanning');
    }

    public function deletePlaning($id)
    {
        $this->planning->deletePlanning($id);
        return redirect()->route('getPlanning');
    }
}
