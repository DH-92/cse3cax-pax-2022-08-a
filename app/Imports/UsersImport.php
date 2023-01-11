<?php

namespace App\Imports;

use App\Models\User;
use Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class UsersImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new User([
            'firstName' => $row['firstname'],
            'lastName' => $row['lastname'],
            'email' => $row['email'],
            'password' => Hash::make($row['password']),
            'phone' => $row['phone'],
            'employmentType' => $row['employmenttype'],
            'userType' => $row['usertype'],
            'maxLoad' => $row['maxload'],

        ]);
    }
}
