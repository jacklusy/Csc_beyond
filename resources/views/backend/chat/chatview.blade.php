@extends('admin.admin_dashboard')

@section('admin')

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


{{-- <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
</div>
<div class="ps__rail-y" style="top: 0px; height: 520px; right: 0px;">
    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 235px;"></div>
</div> --}}


<script>

    $(document).ready(function(){
                
        $.ajaxSetup({
            headers:{
                'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
            }
        })

                
      // get all user
        function users_get() {
            $.ajax({
                url: "{{ route('user.index') }}",
                method: "GET",
                success: function(response) {
                    // empty the table body first
                    console.log(response);
                    $("#users_get").empty();

                    // loop through the response data and append it to the table
                    $.each(response, function(key, user) {
                        var table = $("#users_get").append(
                            
                            `<a href="javascript:;" data-id="${user.id}" class="list-group-item btnGetDataUser">
                                <div class="d-flex">
                                    <div class="chat-user-online">
                                        <img src="{{url('upload/default.jpg')}}" width="42" height="42" class="rounded-circle" alt="">
                                    </div>
                                    <div id="" class="flex-grow-1 ms-2">
                                        <h6 class="mb-0 chat-title">${user.name}</h6>
                                    </div>
                                    <div class="chat-time">9:51 AM</div>
                                </div>
                            </a>`
                        );
                    });
                        
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        users_get();


        //// get data Receiver
        function dataReceiver() {

            $('body').on('click','.btnGetDataUser',function(){

                var receiver_id = $(this).data('id');
                console.log(receiver_id ,'receiver_id');

                $.ajax({
                    url: '{{ url("receiver/get/data", '') }}' + '/' + receiver_id ,
                    method: "GET",
                    success: function(response) {
                        // empty the table body first
                        console.log(response[0].name,"Message data");
                        $('.nameUser').html(response[0].name);
                        $('#receiver_id').val(response[0].id );
                        var sender_id = $('#sender_id').val();

                        $.ajax({
                            url: '{{ url("receiver/message", '') }}' + '/' + receiver_id + '/' + sender_id ,
                            method: "GET",
                            success: function(response) {
                                // empty the table body first
                                console.log(response,"ReceiverMessage");


                                $("#receiverMessage").empty();

                                // // loop through the response data and append it to the table
                                $.each(response, function(key, user) {
                                    var table = $("#receiverMessage").append(
                                        
                                    `
                                            <div class="d-flex">
                                                <img src="{{url('upload/default.jpg')}}" width="48" height="48" class="rounded-circle" alt="">
                                                <div class="flex-grow-1 ms-2">
                                                    <p class="mb-0 chat-time">jack, 2:35 PM</p>
                                                    <p class="chat-left-msg">${user.message}</p>
                                                </div>
                                            </div>
                                       

                                    `
                                    );
                                });
                                    
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
                   

            });
        }

        dataReceiver();




           //// get data Receiver
        function dataSender() {
            $('body').on('click','.btnGetDataUser',function(){

                var receiver_id = $(this).data('id');

                $.ajax({
                    url: '{{ url("receiver/get/data", '') }}' + '/' + receiver_id ,
                    method: "GET",
                    success: function(response) {
                        // empty the table body first
                        console.log(response[0].name,"Message data");
                    
                        var sender_id = $('#sender_id').val();

                        $.ajax({
                            url: '{{ url("sender/message", '') }}' + '/' + receiver_id + '/' + sender_id ,
                            method: "GET",
                            success: function(response) {
                                // empty the table body first
                                console.log(response,"senderMessage");


                                $("#senderMessage").empty();

                                // // loop through the response data and append it to the table
                                $.each(response, function(key, user) {
                                    var table = $("#senderMessage").append(
                                        
                                    `
                                    <div class="chat-content-rightside">
                                        <div class="d-flex ms-auto">
                                            <div class="flex-grow-1 me-2">
                                                <p class="mb-0 chat-time text-end">you, 2:37 PM</p>
                                                <p class="chat-right-msg">${user.message}</p>
                                            </div>
                                        </div>
                                    </div>
                                    

                                    `
                                    );
                                });
                                    
                            },
                            error: function(error) {
                                console.log(error);
                            }
                        });
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
                

            });
        }

        dataSender();

            


        var FormMessage = $("#FormMessage")[0];
        $('#sendAdminMessage').click(function(){

            var receiver_id = $('#receiver_id').val();
            var message = new FormData(FormMessage);
            
            console.log(message);

            $.ajax({
                url: '{{route("message.send.store")}}' ,
                method: 'POST' ,
                processData : false ,
                contentType : false ,
                data : message ,

                success : function (response) {
                   console.log(response , 'Send message');

                   console.log($('.btnGetDataUser').data('id'), 'id btnGetDataUser');
                   // Loop through each button with class btnGetDataUser
                    $('#users_get').each(function() {

                        if ($('.btnGetDataUser').data('id') == response) {

                            $('.btnGetDataUser').data('id', response).trigger('click');


                            return false;
                        }else {
                            console.log('nooooooooooooooooooo');
                        }
                        
                    });

                  

                } ,
                error : function (error) {
                    console.log(error,'error');
                }
            });
        });


          


    });

           

</script>
@endsection
