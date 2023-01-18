<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\SubjectInstance;
use App\Models\Term;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ScheduleController extends Controller
{
    public function index()
    {
        $subjects = Subject::with('instances', 'instances.term', 'instances.user')->get()->toArray();

        foreach ($subjects as $k => $subject) {
            foreach ($subject['instances'] as $oldkey => $instance) {
                if ($instance['active'] == 1) {
                    //reassign array keys for each instance to YYYY_MMM e.g. '2022_JAN'
                    $newInstKey = $instance['term']['year'].'_'.$instance['term']['month'];
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

        return view('manager/schedule', ['subjects' => $subjects]);
    }

    public function storeInstance()
    {
        $instance = $_POST['instance'];
        $lecturer_load = $_POST['lecturer_load'];
        $inst_arr = explode('_', $instance);
        $subject = Subject::where('code', '=', $inst_arr[0])->first();
        $term = Term::where('year', '=', $inst_arr[1])->where('month', '=', $inst_arr[2])->first();
        if (isset($_POST['lecturer']) && $_POST['lecturer'] != 'Select a Lecturer') {
            $lecturer = User::find($_POST['lecturer']);
        }
        if (isset($_POST['support']) && $_POST['support'] != 0) {
            $support = User::find($_POST['support']);
        }

        $sInst = new SubjectInstance;
        $sInst->subject_id = $subject->id;
        $sInst->term_id = $term->id;
        $sInst->version = 1;
        $sInst->user_id = $lecturer->id ?? null;
        $sInst->published = $_POST['published'];
        $sInst->support_id = $support->id ?? null;
        $sInst->lecturer_load = $lecturer_load;
        $sInst->load = $_POST['load'] ?? 0;
        $sInst->active = 1;
        $sInst->save();

        return 'success';
    }

    public function assignLecturer()
    {
        $instance = $_POST['instance'];
        $inst_arr = explode('_', $instance);
        $subject = Subject::where('code', '=', $inst_arr[0])->first();
        $term = Term::where('year', '=', $inst_arr[1])
                    ->where('month', '=', $inst_arr[2])->first();
        $model = SubjectInstance::where('subject_id', $subject->id)
                                ->where('term_id', $term->id)->first();
        abort_if(! $model, 400);

        $model->user_id = null;
        $model->support_id = null;
        $model->lecturer_load = 100;
        $model->load = $_POST['load'];
        $model->published = $_POST['published'];

        if (isset($_POST['lecturer'])) {
            $lecturer = User::find($_POST['lecturer']);
            if ($lecturer) {
                $model->user_id = $lecturer->id ?? null;

                if (isset($_POST['support']) && $_POST['support'] != 0) {
                    $support = User::find($_POST['support']);
                    if ($support) {
                        $model->support_id = $support->id ?? null;
                        $model->lecturer_load = $_POST['lecturer_load'];
                    }
                }
            }
        }

        $model->save();

        return 'success';
    }

    public function deleteInstance(Request $request, $id)
    {
        $exp = explode('_', $id);
        $term = Term::where('year', $exp[1])->where('month', $exp[2])->first();

        $subject = Subject::where('code', $exp[0])->first();

        //TODO: change to soft delete when implementing versioning ca2-49
        SubjectInstance::where('term_id', $term->id)->where('subject_id', $subject->id)->first()->delete();

        return 'success';
    }

    public function publishSchedule()
    {
        $instances = SubjectInstance::all(); //TODO: change to only instances within the current schedule when implementing pagination ca2-95

        foreach ($instances as $instance) {
            $instance->published = 1;
            if (! $instance->save()) {
                return 'failed to publish some instances';
            }
        }

        return 'success';
    }

    public function lecturerSchedule()
    {
        $userId = Session::get('user')->id;
        $subjectInstances = SubjectInstance::whereRelation('user', 'user_id', '=', $userId)->orWhereRelation('user', 'support_id', '=', $userId)->where('published', 1)->with('subject', 'term')->get()->toArray();
        $arr = [];
        foreach ($subjectInstances as $instance) {
            if ($instance['active'] == 1) {
                $bool = array_key_exists($instance['subject']['code'], $arr);
                if (! array_key_exists($instance['subject']['code'], $arr)) {
                    $arr[$instance['subject']['code']] = [
                        'name' => $instance['subject']['name'],
                        'color' => $instance['subject']['color'],
                        'instances' => [
                            $instance['term']['year'].'_'.$instance['term']['month'] => $instance['user_id'],
                        ], ];
                } else {
                    $arr[$instance['subject']['code']]['instances'][$instance['term']['year'].'_'.$instance['term']['month']] = $instance['user_id'];
                }
            }
        }
        // dd($arr);
        return view('lecturer/schedule', ['subjects' => $arr]);
    }

    public function autoAssign(){
        $instances = SubjectInstance::whereRelation('term', 'year', '=', '2022')
        ->where([['published', '=', 0],
                ['user_id', '=', null]])
        ->with('subject', 'term')
        ->get()->keyBy('id');//->toArray()

        $qualified = [];
        $months = ["JAN", "FEB", "MAR", "APR", "MAY", "JUN", "JUL", "AUG", "SEP", "OCT", "NOV", "DEC"];

        foreach($instances as $instance){ 
            if(!array_key_exists($instance->subject->code, $qualified)){ //build an array of qualified lecturers for each subject in $instances
                $qualified[$instance->subject->code] = $instance->subject->lecturers()->get()->keyBy('id')->toArray();
            }
        }
        $grouped = $instances->groupBy('subject_id');
        $instance_arr = $grouped->toArray();
        array_multiSort($qualified, $instance_arr);// SORT_ASC

        $assigned = [];
        foreach($qualified as $s){
            foreach($s as $l){
                $assigned[$l['id']] = ["JAN"=>0, "FEB"=>0, "MAR"=>0, "APR"=>0, "MAY"=>0, "JUN"=>0, "JUL"=>0, "AUG"=>0, "SEP"=>0, "OCT"=>0, "NOV"=>0, "DEC"=>0];
            }
        }

        foreach($instance_arr as $subject){
            foreach($subject as $instance){
                if(count($qualified[$instance['subject']['code']]) == 1){ //only one lecturer is qualified, assign to instance
                    $model = SubjectInstance::find($instance['id']);
                    $model->user_id = array_key_first($qualified[$instance['subject']['code']]);
                    $model->save();
                    $instance['id'] = array_key_first($qualified[$instance['subject']['code']]);
                    $assigned[$model->user_id][$instance['term']['month']] = 1;
                    $instMonthIndex = array_search($instance['term']['month'],$months);
                    if($instMonthIndex <= 10){
                        $assigned[$model->user_id][$months[$instMonthIndex+1]] = 1;
                    }
                    if($instMonthIndex <= 9){
                        $assigned[$model->user_id][$months[$instMonthIndex+2]] = 1;
                    }
                }else{
                    foreach($qualified[$instance['subject']['code']] as $lecturer){

                        if($instance['user_id']==null){
                            $instMonthIndex = array_search($instance['term']['month'],$months);
                            // if(!array_key_exists($lecturer['id'], $assigned)){
                            //     $assigned[$lecturer['id']][$instance['term']['month']] = 1;
                            //     if($instMonthIndex+1 < 12){
                            //         $assigned[$lecturer['id']][$months[$instMonthIndex+1]] = 1;
                            //     }
                            //     if($instMonthIndex+2 < 12){
                            //         $assigned[$lecturer['id']][$months[$instMonthIndex+2]] = 1;
                            //     }

                            //     $model = SubjectInstance::find($instance['id']);
                            //     $model->user_id = $lecturer['id'];
                            //     if($model->save()){
                            //         $instance['user_id'] = $lecturer['id'];
                            //     }

                            // }elseif(!array_key_exists($months[$instMonthIndex],$assigned[$lecturer['id']])){

                            //     $assigned[$lecturer['id']][$instance['term']['month']] = 1;
                            //     if($instMonthIndex+1 < 12){
                            //         $assigned[$lecturer['id']][$months[$instMonthIndex+1]] = 1;
                            //     }
                            //     if($instMonthIndex+2 < 12){
                            //         $assigned[$lecturer['id']][$months[$instMonthIndex+2]] = 1;
                            //     }

                            //     $model = SubjectInstance::find($instance['id']);
                            //     $model->user_id = $lecturer['id'];
                            //     if($model->save()){
                            //         $instance['user_id'] = $lecturer['id'];
                            //     }

                            // }else
                            if(
                            $assigned[$lecturer['id']][$months[$instMonthIndex]] < $lecturer['maxLoad']*5 &&
                            $assigned[$lecturer['id']][$months[$instMonthIndex+1<11?$instMonthIndex+1:11]] < $lecturer['maxLoad']*5 &&
                            $assigned[$lecturer['id']][$months[$instMonthIndex+2<11?$instMonthIndex+1:11]] < $lecturer['maxLoad']*5
                            ){ 
                                $assigned[$lecturer['id']][$instance['term']['month']] += 1;
                                if($instMonthIndex+1 < 12){
                                    $assigned[$lecturer['id']][$months[$instMonthIndex+1]] += 1;
                                }
                                if($instMonthIndex+2 < 12){
                                    $assigned[$lecturer['id']][$months[$instMonthIndex+2]] += 1;
                                }

                                $model = SubjectInstance::find($instance['id']);
                                $model->user_id = $lecturer['id'];
                                if($model->save()){
                                    $instance['user_id'] = $lecturer['id'];
                                }
                            } 
                        } 
                    }
                }
            }
        }
        return redirect('/manager/schedule'); 
    }
}
