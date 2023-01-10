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
                //reassign array keys for each instance to YYYY_MMM e.g. '2022_JAN'
                $newInstKey = $instance['term']['year'].'_'.$instance['term']['month'];
                $subject['instances'][$newInstKey] = $subject['instances'][$oldkey];
                unset($subject['instances'][$oldkey]);
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
        $inst_arr = explode('_',$instance);
        $subject = Subject::where('code', '=', $inst_arr[0])->first();
        $term = Term::where('year', '=', $inst_arr[1])->where('month', '=', $inst_arr[2])->first();
        if(isset($_POST['lecturer']) && $_POST['lecturer'] != "Select a Lecturer"){
            $lecturer = User::find($_POST['lecturer']);
        }
        $sInst = new SubjectInstance;
        $sInst->subject_id = $subject->id;
        $sInst->term_id = $term->id;
        $sInst->version = 1;
        $sInst->user_id = $lecturer->id??NULL;
        $sInst->load = $_POST['load'] ?? 0;
        $sInst->save();

        return "success";
    }

    public function assignLecturer()
    {
        $instance = $_POST['instance'];
        $inst_arr = explode('_',$instance);
        $subject = Subject::where('code', '=', $inst_arr[0])->first();

        $term = Term::where('year', '=', $inst_arr[1])->where('month', '=', $inst_arr[2])->first();

        $model = SubjectInstance::where('subject_id', $subject->id)
                                ->where('term_id', $term->id)->first();

        if(isset($_POST['lecturer']) && $_POST['lecturer'] != "Select a Lecturer"){
            $lecturer = User::find($_POST['lecturer']);
        }

        $model->user_id = $lecturer->id ?? null;
        $model->load = $_POST['load'];
        $model->save();

        return "success";
    }

    public function lecturerSchedule(){
        $userId = Session::get('user')->id;
        $subjectInstances = SubjectInstance::whereRelation('user', 'user_id', '=', $userId)->with('subject', 'term')->get()->toArray();
        $arr = [];
        foreach($subjectInstances as $instance){
            $bool = array_key_exists($instance['subject']['code'], $arr);
            if(!array_key_exists($instance['subject']['code'], $arr)){
                $arr[$instance['subject']['code'] ] = [
                    'name' => $instance['subject']['name'],
                    'instances' => [
                        $instance['term']['year'].'_'.$instance['term']['month'],],
                        'color' => $instance[‘subject][‘color’]
                ];
            }else{
                array_push($arr[$instance['subject']['code']]['instances'],$instance['term']['year'].'_'.$instance['term']['month']);
            }
        }
        // dd($arr);
        return view('lecturer/schedule',['subjects'=>$arr]);
    }
}