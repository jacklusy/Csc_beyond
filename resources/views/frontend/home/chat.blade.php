<!doctype html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">  
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--favicon-->
	<link rel="icon" href="{{asset('adminbackend/assets/images/favicon-32x32.png')}}" type="image/png" />
	<link href="{{asset('adminbackend/assets/plugins/input-tags/css/tagsinput.css')}}" rel="stylesheet" />
	<!--plugins-->
	<link href="{{asset('adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css')}}" rel="stylesheet"/>
	<link href="{{asset('adminbackend/assets/plugins/simplebar/css/simplebar.css')}}" rel="stylesheet" />
	<link href="{{asset('adminbackend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css')}}" rel="stylesheet" />
	<link href="{{asset('adminbackend/assets/plugins/metismenu/css/metisMenu.min.css')}}" rel="stylesheet" />
	<!-- loader-->
	<link href="{{asset('adminbackend/assets/css/pace.min.css')}}" rel="stylesheet" />
	<script src="{{asset('adminbackend/assets/js/pace.min.js')}}"></script>
	<!-- Bootstrap CSS -->
	<link href="{{asset('adminbackend/assets/css/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{asset('adminbackend/assets/css/app.css')}}" rel="stylesheet">
	<link href="{{asset('adminbackend/assets/css/icons.css')}}" rel="stylesheet">
	<!-- Theme Style CSS -->
	<link rel="stylesheet" href="{{asset('adminbackend/assets/css/dark-theme.css')}}" />
	<link rel="stylesheet" href="{{asset('adminbackend/assets/css/semi-dark.css')}}" />
	<link rel="stylesheet" href="{{asset('adminbackend/assets/css/header-colors.css')}}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
	
	<!-- Data Table -->
	<link href="{{asset('adminbackend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet')}}" />
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css" >

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">

	<title>Admin Dashboard</title>

	
</head>

<body>
    

    <div class="wrapper">

        <script
        src="https://code.jquery.com/jquery-3.6.4.slim.min.js"
        integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw="
        crossorigin="anonymous"></script>


        <div class="page-content">
            <div class="chat-wrapper">
                <div class="chat-sidebar">
                    
                    <div class="mb-3"></div>
                    <div class="chat-sidebar-content">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-Chats">
                                
                                <div class="chat-list ps ps--active-y">
                                    <div class="list-group list-group-flush" id="users_get">
                                        
                                        
                                    </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 300px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 168px;"></div></div></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="" id="dataUser">

                    <div class="chat-header d-flex align-items-center">
                        <div class="chat-toggle-btn"><i class="bx bx-menu-alt-left"></i>
                        </div>
                        <div>
                            <h4 class="mb-1 font-weight-bold nameUser"></h4>
                            
                        </div>
                    
                    </div>
                    <div data-id="${user.id}" class="chat-content ps ps--active-y userData">

                    
                        <div id="receiverMessage" class="chat-content-leftside">
                            
                        </div>
                        <div id="senderMessage" class="chat-content-rightside">
                        
                        </div>
                        

                    </div>

                </div>

                <div class="chat-footer d-flex align-items-center">
                    <div class="flex-grow-1 pe-2">

                        <form action="" id="FormMessage">

                            <div class="input-group">	

                                <input type="hidden" id="sender_id" name="sender_id" value="{{Auth::user()->id}}">
                                <input type="hidden" id="receiver_id" name="receiver_id" >

                                <input type="text" id="message" name="message" class="form-control" placeholder="Type a message">
                                <button type="button" id="sendAdminMessage" class="btn btn-primary">Send</button>

                            </div>

                        </form>

                    </div>
                    
                </div>
                
                <!--start chat overlay-->
                <div class="overlay chat-toggle-btn-mobile"></div>
                <!--end chat overlay-->
            </div>
        </div>



    </div>

<!--end wrapper-->
<!--start switcher-->
<script>

    $(document).ready(function(){
                
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

             
           // get all data courses
        function user_same_courses() {
        
            $.ajax({
                url: "{{ route('user.same.course') }}",
                method: 'GET' ,
                dataType:"json",
                success: function(response) {
                    // empty the table body first
                    console.log(response,"user same courses");



                    // // loop through the response data and append it to the table
                    $.each(response, function(key, user) {
                        console.log(user,'user');
                    });
                        
                },
                error: function(error) {
                    console.log(error);
                }

            });
           

        
        }

        // call the function to display user data on page load
        user_same_courses();


        // // get all user
        // function users_get() {
        //     $.ajax({
        //         url: "{{ route('user.same.course') }}",
        //         method: "GET",
        //         success: function(response) {
        //             // empty the table body first
        //             console.log(response,'response user');
        //             // $("#users_get").empty();

        //             // // loop through the response data and append it to the table
        //             // $.each(response, function(key, user) {
        //             //     var table = $("#users_get").append(
                            
        //             //         `<a href="javascript:;" data-id="${user.id}" class="list-group-item btnGetDataUser">
        //             //             <div class="d-flex">
        //             //                 <div class="chat-user-online">
        //             //                     <img src="{{url('upload/default.jpg')}}" width="42" height="42" class="rounded-circle" alt="">
        //             //                 </div>
        //             //                 <div id="" class="flex-grow-1 ms-2">
        //             //                     <h6 class="mb-0 chat-title">${user.name}</h6>
        //             //                 </div>
        //             //                 <div class="chat-time">9:51 AM</div>
        //             //             </div>
        //             //         </a>`
        //             //     );
        //             // });
                        
        //         },
        //         error: function(error) {
        //             console.log(error);
        //         }
        //     });
        // }

        // users_get();


        // //// get data Receiver
        // function dataReceiver() {

        //     $('body').on('click','.btnGetDataUser',function(){

        //         var receiver_id = $(this).data('id');
        //         console.log(receiver_id ,'receiver_id');

        //         $.ajax({
        //             url: '{{ url("receiver/get/data", '') }}' + '/' + receiver_id ,
        //             method: "GET",
        //             success: function(response) {
        //                 // empty the table body first
        //                 console.log(response[0].name,"Message data");
        //                 $('.nameUser').html(response[0].name);
        //                 $('#receiver_id').val(response[0].id );
        //                 var sender_id = $('#sender_id').val();

        //                 $.ajax({
        //                     url: '{{ url("receiver/message", '') }}' + '/' + receiver_id + '/' + sender_id ,
        //                     method: "GET",
        //                     success: function(response) {
        //                         // empty the table body first
        //                         console.log(response,"ReceiverMessage");


        //                         $("#receiverMessage").empty();

        //                         // // loop through the response data and append it to the table
        //                         $.each(response, function(key, user) {
        //                             var table = $("#receiverMessage").append(
                                        
        //                             `
        //                                     <div class="d-flex">
        //                                         <img src="{{url('upload/default.jpg')}}" width="48" height="48" class="rounded-circle" alt="">
        //                                         <div class="flex-grow-1 ms-2">
        //                                             <p class="mb-0 chat-time">jack, 2:35 PM</p>
        //                                             <p class="chat-left-msg">${user.message}</p>
        //                                         </div>
        //                                     </div>
                                        

        //                             `
        //                             );
        //                         });
                                    
        //                     },
        //                     error: function(error) {
        //                         console.log(error);
        //                     }
        //                 });
        //             },
        //             error: function(error) {
        //                 console.log(error);
        //             }
        //         });
                    

        //     });
        // }

        // dataReceiver();




            //// get data Receiver
        // function dataSender() {
        //     $('body').on('click','.btnGetDataUser',function(){

        //         var receiver_id = $(this).data('id');

        //         $.ajax({
        //             url: '{{ url("receiver/get/data", '') }}' + '/' + receiver_id ,
        //             method: "GET",
        //             success: function(response) {
        //                 // empty the table body first
        //                 console.log(response[0].name,"Message data");
                    
        //                 var sender_id = $('#sender_id').val();

        //                 $.ajax({
        //                     url: '{{ url("sender/message", '') }}' + '/' + receiver_id + '/' + sender_id ,
        //                     method: "GET",
        //                     success: function(response) {
        //                         // empty the table body first
        //                         console.log(response,"senderMessage");


        //                         $("#senderMessage").empty();

        //                         // // loop through the response data and append it to the table
        //                         $.each(response, function(key, user) {
        //                             var table = $("#senderMessage").append(
                                        
        //                             `
        //                             <div class="chat-content-rightside">
        //                                 <div class="d-flex ms-auto">
        //                                     <div class="flex-grow-1 me-2">
        //                                         <p class="mb-0 chat-time text-end">you, 2:37 PM</p>
        //                                         <p class="chat-right-msg">${user.message}</p>
        //                                     </div>
        //                                 </div>
        //                             </div>
                                    

        //                             `
        //                             );
        //                         });
                                    
        //                     },
        //                     error: function(error) {
        //                         console.log(error);
        //                     }
        //                 });
        //             },
        //             error: function(error) {
        //                 console.log(error);
        //             }
        //         });
                

        //     });
        // }

        // dataSender();

            


        // var FormMessage = $("#FormMessage")[0];
        // $('#sendAdminMessage').click(function(){

        //     var receiver_id = $('#receiver_id').val();
        //     var message = new FormData(FormMessage);
            
        //     console.log(message);

        //     $.ajax({
        //         url: '{{route("message.send.store")}}' ,
        //         method: 'POST' ,
        //         processData : false ,
        //         contentType : false ,
        //         data : message ,

        //         success : function (response) {
        //             console.log(response , 'Send message');

        //             console.log($('.btnGetDataUser').data('id'), 'id btnGetDataUser');
        //             // Loop through each button with class btnGetDataUser
        //             $('#users_get').each(function() {

        //                 if ($('.btnGetDataUser').data('id') == response) {

        //                     $('.btnGetDataUser').data('id', response).trigger('click');


        //                     return false;
        //                 }else {
        //                     console.log('nooooooooooooooooooo');
        //                 }
                        
        //             });

                    

        //         } ,
        //         error : function (error) {
        //             console.log(error,'error');
        //         }
        //     });
        // });


            


    });

            

</script>


































<script
src="https://code.jquery.com/jquery-3.6.4.slim.min.js"
integrity="sha256-a2yjHM4jnF9f54xUQakjZGaqYs/V1CYvWpoqZzC2/Bw="
crossorigin="anonymous"></script>
<!--end switcher-->
<!-- Bootstrap JS -->
<script src="{{asset('adminbackend/assets/js/bootstrap.bundle.min.js')}}"></script>
<!--plugins-->
<script src="{{asset('adminbackend/assets/js/jquery.min.js')}}"></script>
<script src="{{asset('adminbackend/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
<script src="{{asset('adminbackend/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
<script src="{{asset('adminbackend/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
<script src="{{asset('adminbackend/assets/plugins/chartjs/js/Chart.min.js')}}"></script>
<script src="{{asset('adminbackend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
<script src="{{asset('adminbackend/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<script src="{{asset('adminbackend/assets/plugins/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
<script src="{{asset('adminbackend/assets/plugins/sparkline-charts/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('adminbackend/assets/plugins/jquery-knob/excanvas.js')}}"></script>
<script src="{{asset('adminbackend/assets/plugins/jquery-knob/jquery.knob.js')}}"></script>


<script>
    $(function() {
        $(".knob").knob();
    });
</script>
<script src="{{asset('adminbackend/assets/js/index.js')}}"></script>
<script src="{{asset('adminbackend/assets/js/validate.min.js')}}"></script>

{{-- dataTables --}}
<script src="{{asset('adminbackend/assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
      } );
</script>

{{-- end dataTables --}}



<!--app JS-->
<script src="{{asset('adminbackend/assets/js/app.js')}}"></script>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    @if(Session::has('message'))
    var type = "{{ Session::get('alert-type','info') }}"
    switch(type){
        case 'info':
        toastr.info(" {{ Session::get('message') }} ");
        break;

        case 'success':
        toastr.success(" {{ Session::get('message') }} ");
        break;

        case 'warning':
        toastr.warning(" {{ Session::get('message') }} ");
        break;

        case 'error':
        toastr.error(" {{ Session::get('message') }} ");
        break; 
    }
    @endif 
</script>
    
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="{{ asset('adminbackend/assets/js/code.js') }}"></script>

<script src="{{ asset('adminbackend/assets/plugins/input-tags/js/tagsinput.js') }}"></script>

<script src='https://cdn.tiny.cloud/1/vdqx2klew412up5bcbpwivg1th6nrh3murc6maz8bukgos4v/tinymce/5/tinymce.min.js' referrerpolicy="origin">
</script>
<script>
    tinymce.init({
      selector: '#mytextarea'
    });
</script>

<script src="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css"></script>

<script>
    new PerfectScrollbar('.chat-list');
    new PerfectScrollbar('.chat-content');
</script>



</body>

</html>

