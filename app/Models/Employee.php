<?php

namespace App\Models;
use Illuminate\Http\Request;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable=[
        'first_name',
        'last_name',
        'email',
        'phone',
        'post',
        'avatar'
    ];

    public static function deleteEmployee(int $id){
        return Employee::find($id)->delete();
    }
    public static function updateEmployee(Employee $employee, Array $request){
        return $employee->update($request);
    }
    public static function searchEmployee(int $id){
        return Employee::find($id);
    }

    public static function fetchAllEmployee(){
        return Employee::all();
    }

    public static function saveEmployee(Array $request){

        return Employee::create($request);

    }
}
