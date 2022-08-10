<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Employee;


class EmployeeController extends Controller
{
    //

    public function index(){
        return view('index');
    }

    public function delete(Request $request){
        
        Employee::deleteEmployee($request->id);
        return response()->json([
            'status' => 200,
        ]);
    }

    public function update(Request $request){

     $emp = Employee::searchEmployee($request->emp_id);

    

     if($request->avatar){
        $imagePath = request('avatar')->store('uploads','public');
     }

     $data = [
        'first_name' => $request->fname,
        'last_name' => $request->lname,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'post'=>$request->post,
        'avatar' => ($request->avatar) ? $imagePath : $request->emp_avatar
     ];

     Employee::updateEmployee($emp,$data);


     return response()->json([
        'status' => 200,
    ]);

    }

    public function edit(Request $request){
        $id = $request->id;

        $emp = Employee::searchEmployee($id);
        
        return response()->json($emp);
    }


    public function fetchAll(){
        $emp =Employee::fetchAllEmployee();
        $output = '';

        if($emp->count() > 0 ){
            $output .='<table class="table table-striped text center align-middle">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Avatar</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Phone</th>
                                <th>Post</th>
                                <th>Action</th>

                            </tr>

                        </thead>

                        <tbody>';
            foreach($emp as $data){

                $output .='
                        <tr>
                            <td>'.$data->id.'</td>
                            <td><img src="storage/'.$data->avatar.'" class="img-thumbnail img-fluid" ></td>
                            <td>'.$data->first_name.' '.$data->last_name.'</td>
                            <td>'.$data->email.'</td>
                            <td>'.$data->phone.'</td>
                            <td>'.$data->post.'</td>
                            <td>
                                    <a href="#" id="'.$data->id.'" class="text-success mx-1 editIcon" data-bs-toggle="modal" data-bs-target="#editEmployeeModal">
                                    <i class="bi bi-pencil-square h4"></i>
                                    </a>

                                    <a href="#" id="'.$data->id.'" class="text-danger mx-1 deleteIcon" data-bs-toggle="modal" data-bs-targe="#deleteEmployeeModal">
                                    <i class="bi bi-trash h4"></i>
                                    </a>
                            </td>
                            
                        </tr>
                ';
            }


            $output .='</tbody></table>';

            echo $output;


        } else{
            echo '<h1 class="text-center text-secondary my-5"> No record present in the database!</h1>';
        }

        
    }


    public function store(Request $request){

        $imagePath = request('avatar')->store('uploads','public');

        $data = [
            'first_name' => $request->fname,
            'last_name' => $request->lname,
            'email' => $request->email,
            'phone' => $request->phone,
            'post' => $request->post,
            'avatar' => $imagePath
        ];
        
        Employee::saveEmployee($data);

        return response()->json([
			'status' => 200,
		]);

        
    }
}
