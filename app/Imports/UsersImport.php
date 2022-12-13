<?php
  
namespace App\Imports;
  
use App\Models\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Hash;
  
class UsersImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new User([
            'firstName'=>$row[0],
            'lastName'=>$row[1],
            'email'=>$row[2], 
            'password'=>Hash::make($row[3]),
            'phone'=>$row[4],
            'employmentType'=> $row[5],
            'userType'=> $row[6],
            'maxLoad'=> $row[7],
            
        ]);
    }
}