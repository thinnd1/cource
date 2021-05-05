<?php

namespace App\Http\Controllers;

use App\Cours;
use App\Formation;
use App\Planning;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class LectureController extends Controller
{
    protected $user;
    protected $cours;
    protected $formation;
    protected $planning;

    public function __construct
    (
        User $user, Cours $cours, Formation $formation, Planning $planning
    )
    {
        $this->user = $user;
        $this->cours = $cours;
        $this->formation = $formation;
        $this->planning = $planning;
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

    public function getSchedule(Request $request)
    {
        $idEnseignant = Auth::user()->id;
        $cours = $this->cours->getCourByTeacher($idEnseignant);
        $search = $request->input('cours_id');
        $schedules = $this->cours->getSchedule($idEnseignant, $search);
        return view('enseignant/schedule', ['schedules'  => $schedules, 'cours' => $cours]);
    }

    public function getCreateCourceEnseignant()
    {
        $formation = $this->formation->getFormation();
        return view('enseignant/createcour', ['formation' => $formation]);
    }

    public function createCourse(Request $request)
    {
        $cource = $request->all();
        $user_id = Auth::user()->id;

        $this->cours->createCourenseignant($cource, $user_id);
        return redirect()->route('getCourByTeacher');
    }

    public function getUpdateCourceEnseignant($id)
    {
        $formation = $this->formation->getFormation();
        $cources = $this->cours->getDetail($id);
        return view('enseignant/updatecour', ['cources' => $cources, 'formation' => $formation ]);
    }

    public function updateCourceEnseignant(Request $request, $id)
    {
        $cources = $request->all();
        $this->cours->updateCourceenseignant($id, $cources);
        return redirect()->route('getCourByTeacher');
    }

    public function delete($id)
    {
        $this->cours->deleteCource($id);
        return redirect()->route('getCourByTeacher');
    }

    // manage planning

    public function getPlanning()
    {
        $planning = $this->planning->getPlanning();
        return view('enseignant/planning', ['planning' => $planning]);
    }

    public function getCreatePlanning()
    {
        $cours = $this->cours->getCource();
        return view('enseignant/createplanning', ['cours' => $cours]);
    }

    public function createPlanning(Request $request)
    {
        $planning = $request->all();
        $this->planning->createPlanning($planning);
        return redirect()->route('getPlanningEnseignant');
    }

    public function getUpdatePlanning($id)
    {
        $planning = $this->planning->getDetail($id);
        $cours = $this->cours->getCource();
        return view('enseignant/updateplanning', ['planning' => $planning, 'cours' => $cours]);
    }

    public function updatePlaning(Request $request, $id)
    {
        $planning = $request->all();
        $this->planning->updatePlaning($planning, $id);
        return redirect()->route('getPlanningEnseignant');
    }

    public function deletePlaning($id)
    {
        $this->planning->deletePlanning($id);
        return redirect()->route('getPlanningEnseignant');
    }
}
