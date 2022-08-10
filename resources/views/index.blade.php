<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

  </head>
  
  <body class="bg-light">
    {{-- add new employee modal start --}}
<div class="modal fade" id="addEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Add New Employee</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="#" method="POST" id="add_employee_form" enctype="multipart/form-data">
      @csrf
      <div class="modal-body p-4 bg-light">
        <div class="row">
          <div class="col-lg">
            <label for="fname">First Name</label>
            <input type="text" name="fname" class="form-control" placeholder="First Name" required>
          </div>
          <div class="col-lg">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" class="form-control" placeholder="Last Name" required>
          </div>
        </div>
        <div class="my-2">
          <label for="email">E-mail</label>
          <input type="email" name="email" class="form-control" placeholder="E-mail" required>
        </div>
        <div class="my-2">
          <label for="phone">Phone</label>
          <input type="tel" name="phone" class="form-control" placeholder="Phone" required>
        </div>
        <div class="my-2">
          <label for="post">Post</label>
          <input type="text" name="post" class="form-control" placeholder="Post" required>
        </div>
        <div class="my-2">
          <label for="avatar">Select Avatar</label>
          <input type="file" name="avatar" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="add_employee_btn" class="btn btn-primary">Add Employee</button>
      </div>
    </form>
  </div>
</div>
</div>
{{-- add new employee modal end --}}

{{-- edit employee modal start --}}
<div class="modal fade" id="editEmployeeModal" tabindex="-1" aria-labelledby="exampleModalLabel"
data-bs-backdrop="static" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <form action="#" method="POST" id="edit_employee_form" enctype="multipart/form-data">
      @csrf
      <input type="hidden" name="emp_id" id="emp_id">
      <input type="hidden" name="emp_avatar" id="emp_avatar">
      <div class="modal-body p-4 bg-light">
        <div class="row">
          <div class="col-lg">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" class="form-control" placeholder="First Name" required>
          </div>
          <div class="col-lg">
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" class="form-control" placeholder="Last Name" required>
          </div>
        </div>
        <div class="my-2">
          <label for="email">E-mail</label>
          <input type="email" name="email" id="email" class="form-control" placeholder="E-mail" required>
        </div>
        <div class="my-2">
          <label for="phone">Phone</label>
          <input type="tel" name="phone" id="phone" class="form-control" placeholder="Phone" required>
        </div>
        <div class="my-2">
          <label for="post">Post</label>
          <input type="text" name="post" id="post" class="form-control" placeholder="Post" required>
        </div>
        <div class="my-2">
          <label for="avatar">Select Avatar</label>
          <input type="file" name="avatar" class="form-control">
        </div>
        <div class="mt-2" id="avatar">

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" id="edit_employee_btn" class="btn btn-success">Update Employee</button>
      </div>
    </form>
  </div>
</div>
</div>
{{-- edit employee modal end --}}


<div class="container">
  <div class="row my-5">
    <div class="col-lg-12">
      <div class="card shadow">
        <div class="card-header bg-danger d-flex justify-content-between align-items-center">
          <h3 class="text-light">Manage Employees</h3>
          <button class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addEmployeeModal"><i
              class="bi-plus-circle me-2"></i>Add New Employee</button>
        </div>
        <div class="card-body" id="show_all_employees">
          <h1 class="text-center text-secondary my-5">Loading...</h1>

         

        </div>
      </div>
    </div>
  </div>
</div>







    {{-- VENDOR --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    {{-- AJAX  --}}

    <script type="text/javascript">
        // ADD EMPLOYEE AJAX

    
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
       });



//UPDATE EMPLOYEE

$("#edit_employee_form").submit(function(e){
        e.preventDefault();

            const fd = new FormData(this);

            $("#edit_employee_btn").text('Updating...');

            $.ajax({
                type: 'POST',
                url: "{{ route('update') }}", 
                data: fd,
                cache: false,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);  
                    
                    if(response.status == 200){

                              Swal.fire(
                                'Updated!',
                                'Employee updated Successfully!',
                                'success'
                            )  
                           
                            fetchAllEmployees();
                        }


                       
                   $("#edit_employee_btn").text('Update Employee');
                   $("#edit_employee_form")[0].reset();
                   $("#editEmployeeModal").modal('hide');

                }

            });


       });

// ON DELETE

        $(document).on('click', '.deleteIcon', function(e){

          e.preventDefault();

          let id = $(this).attr('id');

          Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {

                          $.ajax({
                            type: 'GET',
                            url: "{{route('employeeDelete')}}",
                            data: {
                              id: id,
                              _token: '{{ csrf_token() }}'
                              },
                              success: function(response){
                                if(response.status == 200){
                                  Swal.fire(
                                            'Deleted!',
                                            'Employee Deleted Successfully!',
                                            'success'
                                        )  
                                        fetchAllEmployees();

                                }


                              }
                          });


                     
                    }
            })

          
        });



//EDIT DATA

       $(document).on('click','.editIcon',function(e){
        e.preventDefault();

        let id =  $(this).attr('id');
        
                    $.ajax({
                        type: 'GET',
                        url: "{{ route('edit') }}",
                        data: {
                            id: id,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response){
                            $("#fname").val(response.first_name);
                            $("#lname").val(response.last_name);
                            $("#email").val(response.email);
                            $("#phone").val(response.phone);
                            $("#post").val(response.post);
                            $("#avatar").html(`
                                <img src="storage/${response.avatar}" class="img-thumbnail img-fluid">
                            `);
                            $("#emp_id").val(response.id);
                            $("#emp_avatar").val(response.avatar);
                            
                        }
                    });

       });



//FETCH EMPLOYEE DATA

       fetchAllEmployees();

       function fetchAllEmployees(){
            $.ajax({
                type: 'GET',
                url: "{{ route('fetchall') }}",
                success: function(response){
                $("#show_all_employees").html(response);
                $("table").DataTable({
                    order:[0,'desc']
                });

                }
            });
       }



//   ADD EMPLOYEE

      $("#add_employee_form").submit(function(e){
        e.preventDefault();

        const fd = new FormData(this);

        $("#add_employee_btn").text('Adding...');

        $.ajax({
            type: 'POST',
            url: "{{ route('store') }}",
            data: fd,
            cache: false,
            processData: false,
            contentType: false,
            success: function(res){
                if(res.status == 200){
                    Swal.fire(
                        'Added!',
                        'Employee Added Successfully!',
                        'success'
                    )  
                    fetchAllEmployees();
                }

                $("#add_employee_btn").text('Add Employee');
                $("#add_employee_form")[0].reset();
                $("#addEmployeeModal").modal('hide');

            }
        });
      });


// ON UPDATE
      
   



      






    </script>
  </body>
</html>