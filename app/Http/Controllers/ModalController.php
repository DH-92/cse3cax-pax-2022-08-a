<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class ModalController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    //TODO: remove hardcode
    public function getQualifiedLecturers(): array
    {
        return [
            0 => [
                "lastName" => "Acacia",
                "id" => 1,
                "color" => "yellow"],
            1 => [
                "lastName" => "Beech",
                "id" => 2,
                "color" => "green"],
            2 => [
                "lastName" => "Cypress",
                "id" => 3,
                "color" => "red"
            ]
        ];
    }

    public function assignLecturer($id){
        if(!$this->isInstanceCodeValid($id)){
            return $this->error("Invalid Instance Code: " . $id);
        }

        return view('modal/assignLecturer', ['id' => $id, 'lecturers' => $this->getQualifiedLecturers()]);
    }

    public function createInstance($id){
        if(!$this->isInstanceCodeValid($id)){
            return $this->error("Invalid InstanceCode - " .  $id);
        }

        return view('modal/createInstance', ['id' => $id, 'lecturers' => $this->getQualifiedLecturers()]);
    }

    public function isInstanceCodeValid($id): bool
    {
        //TODO: Some validation of the instance code here; check exists etc.
        return true;
    }

    public function import(){
        return view('modal/import');
    }

    public function error(String $message){
        return view('modal/error', ['message' => $message]);
    }
}
