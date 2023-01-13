<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\SubjectInstance;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Mockery\Matcher\Subset;

class ScheduleController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('instances', 'instances.term', 'instances.user')->get()->toArray();

        foreach($subjects as $k => $subject){
            foreach($subject['instances'] as $oldkey => $instance){
                if($instance['active'] == 1) {
                    //reassign array keys for each instance to YYYY_MMM e.g. '2022_JAN'
                    $newInstKey = $instance['term']['year'] . '_' . $instance['term']['month'];
                    $subject['instances'][$newInstKey] = $subject['instances'][$oldkey];
                    unset($subject['instances'][$oldkey]);
                }
            }
            //reassign array keys for each subject to CODE e.g. 'CSE1ITX'
            $subjects[$k]['instances'] = $subject['instances'];
            $newSubKey = $subject['code'];
            $subjects[$newSubKey] = $subjects[$k];
            unset($subjects[$k]);
        }
        return view('manager/schedule', ['subjects'=>$subjects]);
    }

    public function storeInstance()
    {
        $instance = $_POST['instance'];
        $lecturer_load = $_POST['lecturer_load'];
        $inst_arr = explode('_',$instance);
        $subject = Subject::where('code', '=', $inst_arr[0])->first();
        $term = Term::where('year', '=', $inst_arr[1])->where('month', '=', $inst_arr[2])->first();
        if(isset($_POST['lecturer']) && $_POST['lecturer'] != "Select a Lecturer"){
            $lecturer = User::find($_POST['lecturer']);
        }
        if(isset($_POST['support']) && $_POST['support'] != 0){
            $support = User::find($_POST['support']);
        }

        $sInst = new SubjectInstance;
        $sInst->subject_id = $subject->id;
        $sInst->term_id = $term->id;
        $sInst->version = 1;
        $sInst->user_id = $lecturer->id??NULL;
        $sInst->published = $_POST['published'];
        $sInst->support_id = $support->id??NULL;
        $sInst->lecturer_load = $lecturer_load;
        $sInst->load = $_POST['load'] ?? 0;
        $sInst->save();

        return "success";
    }

    public function assignLecturer()
    {
        $instance = $_POST['instance'];
        $inst_arr = explode('_',$instance);
        $subject = Subject::where('code', '=', $inst_arr[0])->first();
        $lecturer_load = $_POST['lecturer_load'];
        $term = Term::where('year', '=', $inst_arr[1])->where('month', '=', $inst_arr[2])->first();

        $model = SubjectInstance::where('subject_id', $subject->id)
                                ->where('term_id', $term->id)->first();

        if(isset($_POST['lecturer']) && $_POST['lecturer'] != "Select a Lecturer"){
            $lecturer = User::find($_POST['lecturer']);
        }

        if(isset($_POST['support']) && $_POST['support'] != 0){
            $support = User::find($_POST['support']);
        }

        $model->user_id = $lecturer->id;
        $model->lecturer_load = $lecturer_load;
        $model->support_id = $support->id?? NULL;
        $model->user_id = $lecturer->id ?? null;
        $model->load = $_POST['load'];
        $model->published = $_POST['published'];
        $model->save();

        return "success";
    }

    public function deleteInstance(Request $request, $id){
        $exp = explode('_', $id);
        $term = Term::where('year', $exp[1])->where('month', $exp[2])->first();

        $subject = Subject::where('code', $exp[0])->first();

        $instance = SubjectInstance::where('term_id', $term->id)->where('subject_id', $subject->id)->first();
        $instance->active = 0;
        $instance->save();

        return $this->index();
    }

    public function publishSchedule(){
        $instances = SubjectInstance::all();//TODO: change to only instances within the current schedule when implementing pagination ca2-95

        foreach($instances as $instance){
            $instance->published = 1;
            if(!$instance->save()){
               return "failed to publish some instances";
            }
        }
        return "success";
    }

    public function lecturerSchedule(){
        $userId = Session::get('user')->id;
        $subjectInstances = SubjectInstance::whereRelation('user', 'user_id', '=', $userId)->where('published', 1)->with('subject', 'term')->get()->toArray();
        $arr = [];
        foreach($subjectInstances as $instance){
            if($instance['active'] == 1) {
                $bool = array_key_exists($instance['subject']['code'], $arr);
                if (!array_key_exists($instance['subject']['code'], $arr)) {
                    $arr[$instance['subject']['code']] = [
                        'name' => $instance['subject']['name'],
                        'color' => $instance['subject']['color'],
                        'instances' => [
                            $instance['term']['year'] . '_' . $instance['term']['month']]
                    ];
                } else {
                    array_push($arr[$instance['subject']['code']]['instances'], $instance['term']['year'] . '_' . $instance['term']['month']);
                }
            }
        }
        // dd($arr);
        return view('lecturer/schedule',['subjects'=>$arr]);
    }
}
