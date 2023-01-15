<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\SubjectInstance;
use App\Models\Term;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ModalController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getQualifiedLecturers($code)
    {
        $subject = Subject::where('code', $code)->first();

        return $subject->lecturers()->get();
    }

    public function assignLecturer($id)
    {
        if (! $this->isInstanceCodeValid($id)) {
            return $this->error('Invalid Instance Code: '.$id);
        }

        $code = explode('_', $id);
        $result = ['id' => $id, 'lecturers' => $this->getQualifiedLecturers($code[0])];

        $term = Term::where('month', $code[2])->where('year', $code[1])->first();
        $subject = Subject::where('code', $code[0])->first();
        $instance = SubjectInstance::where('term_id', $term->id)->where('subject_id', $subject->id)->first();
        $result['load'] = $instance->load;
        $result['published'] = $instance->published;

        $result['assigned'] = '';
        if ($instance->user_id != null) {
            $result['assigned'] = $instance->user_id;
        }
        $result['assignedSupport'] = '';
        if ($instance->support_id != null) {
            $result['assignedSupport'] = $instance->support_id;
        }
        $result['lecturer_load'] = $instance->lecturer_load ?? 100;

        return view('modal/assignLecturer', $result);
    }

    public function createInstance($id)
    {
        if (! $this->isInstanceCodeValid($id)) {
            return $this->error('Invalid InstanceCode - '.$id);
        }

        $code = explode('_', $id);

        return view('modal/createInstance', ['id' => $id, 'lecturers' => $this->getQualifiedLecturers($code[0])]);
    }

    public function isInstanceCodeValid($id): bool
    {
        //TODO: Some validation of the instance code here; check exists etc.
        return true;
    }

    public function publish($id)
    {
        return view('modal/publish', ['id' => $id]);
    }

    public function error(string $message)
    {
        return view('modal/error', ['message' => $message]);
    }
}
