<?php
  
namespace App\Imports;
  
use App\Models\Subject;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

  
class SubjectsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Subject([
            'code'=>$row[0],
            'name'=>$row[1],
            'description'=>$row[2], 
           
         
            
        ]);
    }
}