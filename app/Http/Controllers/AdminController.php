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
        $search = trim($request->input('search_account'));
        $users = $this->user->getAllUser($id, $search);
        return view('admin.home', compact('users'));
    }

    public function getCreateUser()
    {
        return view("admin/createuser");
    }

    public function createUser(Request $request)
    {
        $createUser = $request->all();
        $this->user->createUser($createUser);

        return redirect()->route('getListUser')->with('key', 'Create User successful');
    }

    public function getUpdateUser($id)
    {
        $editinfor = $this->user->getDetail($id);
        return view('admin/updateuser', ['editinfor' => $editinfor]);
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
        $active_flg = $request->active_flg;
        $this->user->confirmUser($id, $active_flg);
        return redirect('getconfirm');
    }

// manage cource
    public function getCreateCource()
    {

    }

    public function createCource(Request $request)
    {

    }

    public function getCource()
    {

    }

    public function getUpdateCource()
    {
        return view('teacher.updateinformation', ['editinfor' => $editinfor]);
    }


    public function updateCource(Request $request)
    {

    }

    public function deleteCource($id)
    {
        $this->cource->deleteCource($id);
        return redirect()->route('getListUser')->with('key', 'Đã xóa thành viên');
    }

    // quan ly dao tao
    public function getFormation()
    {

    }

    public function getCreateFormation()
    {

    }

    public function createFormation(Request $request)
    {

    }

    public function getUpdateFormation()
    {

    }

    public function updateFormation(Request $request)
    {

    }

    public function deleteFormation($id)
    {
        $this->cource->deleteCource($id);
        return redirect()->route('getListUser')->with('key', 'Đã xóa thành viên');
    }

// manage planning
    public function getPlanning()
    {

    }

    public function getCreatePlanning()
    {

    }

    public function createPlanning(Request $request)
    {

    }

    public function getUpdatePlanning()
    {

    }

    public function updatePlaning(Request $request)
    {

    }

    public function deletePlaning($id)
    {
        $this->planning->deletePlanning($id);
//        return redirect()->route('getListUser')->with('key', 'Đã xóa thành viên');
    }
}
