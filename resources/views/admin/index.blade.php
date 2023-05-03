@extends('admin.admin_dashboard')

@section('admin')

<script
  src="https://code.jquery.com/jquery-3.6.4.slim.min.js"
  integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw="
  crossorigin="anonymous"></script>

  <style>
    .col-lg-12 {
        display: flex;
        justify-content: space-between;
        margin-bottom: 1rem; 
    }

    .editButton {
        margin-right: 1rem;
    }

    .col-lg-11 {
        width: 100% !important;
        margin-bottom: 1rem; 
    }
  </style>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="ps-3">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="Create_Courses" data-bs-target="#CreateCourses">Create Courses</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="Create_Member" data-bs-target="#member">Join Courses</button>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="Student_Mark" data-bs-target="#Mark">Student Mark</button>
            <nav aria-label="breadcrumb">
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" id="add_User" data-bs-target="#addUser">Add User</button>
            </div>
        </div>
        
    </div>
    <!--end breadcrumb-->
    
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="user-table" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>SL</th>
                            <th>User Name</th>
                            <th>Name</th>
                            <th>User Email</th>
                            <th>User Phone</th>
                            <th>User Address</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                    
                </table>
            </div>
        </div>
    </div>
    
</div>


    
    <div class="modal fade ajax-model" id="addUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <form action="" id="ajaxForm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add User</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <input type="hidden" name="user_id" id="user_id">
                                <label class="form-control-label" for="input-username">UserName</label>
                                <input type="text" id="username" name="username" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Name</label>
                                <input type="text" id="name" name="name" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Email</label>
                                <input type="email" id="email" name="email" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                            <div class="form-group focused password">
                                <label class="form-control-label" for="input-username">Password</label>
                                <input type="password" id="password" name="password" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Phone</label>
                                <input type="phone" id="phone" name="phone" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Address</label>
                                <input type="text" id="address" name="address" class="form-control padding form-control-alternative" placeholder="Username">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        
                        <div class="" id="In_active">

                        </div>

                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="savebtn" class="btn btn-primary">Save User</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <div class="modal fade ajax-model2" id="CreateCourses" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <form action="" id="FormCreateCourses">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Create Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-11">
                            <div class="form-group focused">
                                {{-- <input type="hidden" name="user_id" id="user_id"> --}}
                                <label class="form-control-label" for="input-username">Name Courses</label>
                                <input type="text" id="coursename" name="coursename" class="form-control padding form-control-alternative" placeholder="Courses">
                            </div>
                        </div>
                        <div class="col-lg-11">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Minimum Mark</label>
                                <input type="number" id="mark" name="mark" class="form-control padding form-control-alternative" placeholder="Mark">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="" id="In_active">

                        </div>

                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="savebtnCreateCourses" class="btn btn-primary">Save Course</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <div class="modal fade ajax-model3" id="member" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <form action="" id="FormMember">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-11">
                            <div class="form-group focused">
                                {{-- <input type="hidden" name="user_id" id="user_id"> --}}
                                <label class="form-control-label" for="input-username">Courses</label>
                                <select class="form-select mb-3" id="AllCourse" name="AllCourse" aria-label="Default select example">
									
								</select>
                                
                            </div>
                        </div>
                        <div class="col-lg-11">
                            <div class="form-group focused">

                                <label class="form-control-label" for="input-username">Student</label>
                                <select class="form-select mb-3" id="Student" name="Student" aria-label="Default select example">
									
								</select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="" id="In_active">

                        </div>

                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="savebtnMember" class="btn btn-primary">Save Member</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <div class="modal fade ajax-model4" id="Mark" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">

        <form action="" id="FormMark">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Course</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="col-lg-11">
                            <div class="form-group focused">
                                {{-- <input type="hidden" name="user_id" id="user_id"> --}}
                                <label class="form-control-label" for="input-username">Courses</label>
                                <select class="form-select mb-3" id="courses_id" name="courses_id" aria-label="Default select example">
									
								</select>
                                
                            </div>
                        </div>
                        <div class="col-lg-11">
                            <div class="form-group focused">

                                <label class="form-control-label" for="input-username">Student</label>
                                <select class="form-select mb-3" id="student_id" name="student_id" aria-label="Default select example">

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-11">
                            <div class="form-group focused">
                                <label class="form-control-label" for="input-username">Mark</label>
                                <input type="number" id="mark" name="mark" class="form-control padding form-control-alternative mark_Student" placeholder="Mark">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="" id="In_active">

                        </div>

                        <div>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" id="savebtnMark" class="btn btn-primary">Save Member</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>

<script
  src="https://code.jquery.com/jquery-3.6.4.js"
  integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
  crossorigin="anonymous"></script>


<script>

    
    $(document).ready(function(){
            
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

        
        // function to get user data using Ajax
        function getUserData() {
            $.ajax({
                url: "{{ route('user.index') }}",
                method: "GET",
                success: function(response) {
                    // empty the table body first
                    $("#user-table tbody").empty();

                    // loop through the response data and append it to the table
                    $.each(response, function(key, user) {
                        var table = $("#user-table tbody").append(
                            "<tr>" +
                            "<td>" + user.id + "</td>" +
                            "<td>" + user.username + "</td>" +
                            "<td>" + user.name + "</td>" +
                            "<td>" + user.email + "</td>" +
                            "<td>" + user.phone + "</td>" +
                            "<td>" + user.address + "</td>" +
                            "<td>" +
                            "<a href='javascript:void(0)' class='btn btn-info editButton' data-id='" + user.id + "'>Edit</a>" +
                            "<a href='javascript:void(0)' id='delete' class='btn btn-danger delButton' data-id='" + user.id + "'>Delete</a>" +
                            "</td>" +
                            "</tr>"
                        );
                    });
                        
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // call the function to display user data on page load
        getUserData();



        var formData = $("#ajaxForm")[0];
        $('#savebtn').click(function(){

            var form = new FormData(formData);
            
            console.log(form);

            $.ajax({
                url: '{{route("user.store")}}' ,
                method: 'POST' ,
                processData : false ,
                contentType : false ,
                data : form ,

                success : function (response) {
                    // var table = $("#user-table tbody") ;
                    // table.draw();
                    

                    getUserData();
                    getData();
                   
                    $(".ajax-model").modal('hide');

                   

                    console.log(response.success , 'response.success');
                } ,
                error : function (error) {
                    console.log(error,'error');
                }
            });
        });

        $('body').on('click','.editButton',function(){

            var id = $(this).data('id');
            
            $.ajax({
                url: '{{ url("user", '') }}' + '/' + id + '/edit' ,
                method: 'GET' ,

                success : function (response) {
                    $(".ajax-model").modal('show');
                    $('.modal-title').html('Edit User');
                    $('#savebtn').html('Update');
                    // $('.password').hide();

                    $('#user_id').val(response.id);
                    $('#username').val(response.username);
                    $('#name').val(response.name);
                    $('#email').val(response.email);
                    $('#phone').val(response.phone);
                    $('#address').val(response.address);
                    
                    console.log(response);

                    // $.get('{{route("user.index")}}', function(data) {
                    //     console.log(data,"data");
                    //     $('#user-table tbody').draw();
                    // });

                    function active_inactive() {
                        
                        $("#In_active").empty();
    
                        if (response.status == 'active') {
                            
                            $("#In_active").html(
                                
                                "<a href='javascript:void(0)' class='btn btn-info' id='Active' data-id=''>Active</a>"
                            );
    
                            
                        }else {
                            $("#In_active").append(
    
                                "<a href='javascript:void(0)' class='btn btn-danger' id='InActive' data-id=''>InActive</a>"
                            );
    
                        }
                    }

                    active_inactive();

                } ,
                error : function (error) {
                    console.log(error,'error');
                }
            });


        });

        $('body').on('click','#InActive',function(){

            var form = new FormData(formData);

            console.log(form);

            $.ajax({
                url: '{{route("user.In.Active")}}' ,
                method: 'POST' ,
                processData : false ,
                contentType : false ,
                data : form ,

                success : function (response) {
                    function active_inactive() {
                        
                        $("#In_active").empty();
    
                        if (response.status == 'active') {
                            
                            $("#In_active").html(
                                
                                "<a href='javascript:void(0)' class='btn btn-info' id='Active' data-id=''>Active</a>"
                            );
    
                            
                        }else {
                            $("#In_active").append(
    
                                "<a href='javascript:void(0)' class='btn btn-danger' id='InActive' data-id=''>InActive</a>"
                            );
    
                        }
                    }

                    active_inactive();

                    console.log(response.success , 'response.success');
                } ,
                error : function (error) {
                    console.log(error,'error');
                }
            });
        });

        $('body').on('click','#Active',function(){

            var form = new FormData(formData);

            console.log(form);

            $.ajax({
                url: '{{route("user.Active")}}' ,
                method: 'POST' ,
                processData : false ,
                contentType : false ,
                data : form ,

                success : function (response) {
                    function active_inactive() {
                        
                        $("#In_active").empty();
    
                        if (response.status == 'active') {
                            
                            $("#In_active").html(
                                
                                "<a href='javascript:void(0)' class='btn btn-info' id='Active' data-id=''>Active</a>"
                            );
    
                            
                        }else {
                            $("#In_active").append(
    
                                "<a href='javascript:void(0)' class='btn btn-danger' id='InActive' data-id=''>InActive</a>"
                            );
    
                        }
                    }

                    active_inactive();

                    console.log(response.success , 'response.success');
                } ,
                error : function (error) {
                    console.log(error,'error');
                }
            });
        });

        $('body').on('click','.delButton',function(){
            var id = $(this).data('id');
            
            $.ajax({
                url: '{{ url("user/delete", '') }}' + '/' + id  ,
                method: 'DELETE' ,

                success : function (response) {
                   
                    console.log(response);
                    getUserData();

                } ,
                error : function (error) {
                    console.log(error,'error');
                }
            });

        });

        $('#add_User').click(function(){
            $('.modal-title').html('Create User');
            $('.savebtn').html('Save User');

            $('#user_id').val('');
            $('#username').val('');
            $('#name').val('');
            $('#email').val('');
            $('#phone').val('');
            $('#address').val('');

        });


        ///////////////// CreateCourses //////////////////
       

        var FormCreateCourses = $("#FormCreateCourses")[0];
        $('#savebtnCreateCourses').click(function(){

            var formCourses = new FormData(FormCreateCourses);
            
            console.log(formCourses);

            $.ajax({
                url: '{{route("Courses.store")}}' ,
                method: 'POST' ,
                processData : false ,
                contentType : false ,
                data : formCourses ,

                success : function (response) {
                
                    getData();
                   console.log(response , 'response Courses');
                    $(".ajax-model2").modal('hide');

                   

                    console.log(response.success , 'response.success');
                } ,
                error : function (error) {
                    console.log(error,'error');
                }
            });
        });

        $('#Create_Courses').click(function(){
            $('.modal-title').html('Create Courses');
            $('.savebtn').html('Save Course');
           
            $('#coursename').val('');
            $('#mark').val('');

        });


          // get all data courses
        function getData() {
            $.ajax({
                url: "{{ route('course.index') }}",
                method: "GET",
                success: function(response) {
                    // empty the table body first
                    $("#AllCourse").empty();

                    // loop through the response data and append it to the table
                    $.each(response, function(key, course) {
                        var option = $("#AllCourse").append(

                            "<option value="+ course.id +">"+ course.coursename + "</option>" 
                            
                        );
                    });
                        
                },
                error: function(error) {
                    console.log(error);
                }
            });

            $('select[name="AllCourse"]').on('change', function(){
            var AllCourse = $(this).val();

                if (AllCourse) {
                    $.ajax({
                        url: '{{ url("/student-all/ajax", '') }}' + '/' + AllCourse ,
                        method: 'GET' ,
                        dataType:"json",
                        success:function(data){

                            $('select[name="Student"]').html('');
                            var d =$('select[name="Student"]').empty();
                            $.each(data, function(key, value){
                                console.log(value , 'student-all');
                                $('select[name="Student"]').append('<option value="'+ value.id + '">' + value.name + '</option>');
                            });
                        },

                    });
                } else {
                    alert('danger');
                }
            });

           
        }

        // call the function to display user data on page load
        getData();



        var formDatamembers = $("#FormMember")[0];

        $('#savebtnMember').click(function(){
            
            var FormMem = new FormData(formDatamembers);

            console.log(FormMem , 'hi');

            $.ajax({
                url: '{{route("Member.store")}}' ,
                method: 'POST' ,
                processData : false ,
                contentType : false ,
                data : FormMem,
                dataType : 'json',

                success : function (response) {
                
                    // getData();
                    console.log(response , 'response Member');
                    $(".ajax-model3").modal('hide');

                } ,
                error : function (error) {
                    console.log(error,'error');
                }
            });

        });

        $('#Create_Member').click(function(){
            $('.modal-title').html('Members');
            $('.savebtn').html('Save Member');
           
            $('#AllCourse').val('');
            $('#Student').val('');

        });
            
            
        //////////////////////// Student Mark /////////////////// 

        ////// get All data course 
         function getData2() {
            $.ajax({
                url: "{{ route('course.index') }}",
                method: "GET",
                success: function(response) {
                    // empty the table body first
                    $("#courses_id").empty();

                    // loop through the response data and append it to the table
                    $.each(response, function(key, course) {
                        var option = $("#courses_id").append(

                            "<option value="+ course.id +">"+ course.coursename + "</option>" 
                            
                        );
                    });
                        
                },
                error: function(error) {
                    console.log(error);
                }
            });

          
        }

        // call the function to display user data on page load
        getData2();


        ////// get data student that doesnt join the courses
        $('select[name="courses_id"]').on('change', function(){
            var courses_id = $(this).val();

            if (courses_id) {
                $.ajax({
                    url: '{{ url("/student-get/ajax", '') }}' + '/' + courses_id ,
                    method: 'GET' ,
                    dataType:"json",
                    success:function(data){

                        $('select[name="student_id"]').html('');
                        var d =$('select[name="student_id"]').empty();
                        $.each(data, function(key, value){
                            console.log(value);
                            $('select[name="student_id"]').append('<option value="'+ value.id + '">' + value.name + '</option>');
                        });
                    },

                });
            } else {
                alert('danger');
            }
        });


        ///////////// post the mark student ///

        var formDatamark = $("#FormMark")[0];

        $('#savebtnMark').click(function(){
            
            var FormMark = new FormData(formDatamark);

            console.log(FormMark , 'hi');

            $.ajax({
                url: '{{route("Student.Store.Mark")}}' ,
                method: 'POST' ,
                processData : false ,
                contentType : false ,
                data : FormMark,
                dataType : 'json',

                success : function (response) {
                
                    getData2();
                    console.log(response , 'response Member');
                    $(".ajax-model4").modal('hide');

                } ,
                error : function (error) {
                    console.log(error,'error');
                }
            });

        });

        $('#Student_Mark').click(function(){
            $('.modal-title').html('Student Mark');
            $('.savebtn').html('Save Mark');
        
            $('#courses_id').val('');
            $('#student_id').val('');
            $('.mark_Student').val('');

        });
            

    });

</script>
@endsection
