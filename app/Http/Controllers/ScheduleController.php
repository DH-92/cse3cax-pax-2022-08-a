<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ScheduleController extends Controller
{
    public function index()
    {
        $currentURL = url()->current();
        $redirectURL = "";
        $subjects = Subject::with('instances', 'instances.term', 'instances.user')->get()->toArray();
        //check if manager or lecturer schedule requested
        if(Str::contains($currentURL, 'lecturer')){
            $redirectURL = "lecturer/schedule";
        }else{
            $redirectURL = "manager/schedule";            
        }
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
        // dd($subjects);
        return view($redirectURL, ['subjects'=>$subjects]);
    }
}
