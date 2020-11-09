@extends('layouts.master')
@section('title')
Messages
@stop

@section('css')
<style>
.bg-white {
  background-color: #fff;
}

.friend-list {
  list-style: none;
margin-left: -20px;
}

.friend-list li {
  border-bottom: 1px solid #eee;
}

.friend-list li a img {
  float: left;
  width: 45px;
  height: 45px;
  margin-right: 10px;
}

 .friend-list li a {
  position: relative;
  display: block;
  padding: 10px;
  transition: all .2s ease;
  -webkit-transition: all .2s ease;
  -moz-transition: all .2s ease;
  -ms-transition: all .2s ease;
  -o-transition: all .2s ease;
}

.friend-list li.active a {
  background-color: #f1f5fc;
}

.friend-list li a .friend-name,
.friend-list li a .friend-name:hover {
  color: #777;
}

.friend-list li a .last-message {
  width: 65%;
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
}

.friend-list li a .time {
  position: absolute;
  top: 10px;
  right: 8px;
}

small, .small {
  font-size: 85%;
}

.friend-list li a .chat-alert {
  position: absolute;
  right: 8px;
  top: 27px;
  font-size: 10px;
  padding: 3px 5px;
}

.chat-message {
  padding: 60px 20px 115px;
}

.chat {
    list-style: none;
    margin: 0;
}

.chat-message{
    background: #f9f9f9;
}

.chat li img {
  width: 45px;
  height: 45px;
  border-radius: 50em;
  -moz-border-radius: 50em;
  -webkit-border-radius: 50em;
}

img {
  max-width: 100%;
}

.chat-body {
  padding-bottom: 20px;
}

.chat li.left .chat-body {
  margin-left: 70px;
  background-color: #50aecb;
}



.chat li .chat-body {
  position: relative;
  font-size: 11px;
  padding: 10px;
  border: 1px solid #f1f5fc;
  box-shadow: 0 1px 1px rgba(0,0,0,.05);
  -moz-box-shadow: 0 1px 1px rgba(0,0,0,.05);
  -webkit-box-shadow: 0 1px 1px rgba(0,0,0,.05);
}

.chat li .chat-body .header {
  padding-bottom: 5px;
  border-bottom: 1px solid #f1f5fc;
}

.chat li .chat-body p {
  margin: 0;
}

.chat li.left .chat-body:before {
  position: absolute;
  top: 10px;
  left: -8px;
  display: inline-block;
  background: #fff;
  width: 16px;
  height: 16px;
  border-top: 1px solid #f1f5fc;
  border-left: 1px solid #f1f5fc;
  content: '';
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
  -moz-transform: rotate(-45deg);
  -ms-transform: rotate(-45deg);
  -o-transform: rotate(-45deg);
}

.chat li.right .chat-body:before {
  position: absolute;
  top: 10px;
  right: -8px;
  display: inline-block;
  background: #fff;
  width: 16px;
  height: 16px;
  border-top: 1px solid #f1f5fc;
  border-right: 1px solid #f1f5fc;
  content: '';
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -o-transform: rotate(45deg);
}

.chat li {
  margin: 15px 0;
}

.chat li.right .chat-body {
  margin-right: 70px;
  background-color: #fff;
}

.chat-box {
/*
  position: fixed;
  bottom: 0;
  left: 444px;
  right: 0;
*/
  padding: 15px;
  border-top: 1px solid #eee;
  transition: all .5s ease;
  -webkit-transition: all .5s ease;
  -moz-transition: all .5s ease;
  -ms-transition: all .5s ease;
  -o-transition: all .5s ease;
}

.primary-font {
  color: #3c8dbc;
}

a:hover, a:active, a:focus {
  text-decoration: none;
  outline: 0;
}

.msg_send_btn {
    background: #3c8dbc;
    border: #3c8dbc;
    color: #fff;
}

.msg_send_btn:hover {
    background: #ffffff;
    border: #3c8dbc;
    color: #3c8dbc;
}

.left .chat-body .primary-font {
 color: #fff;
}

.left .chat-body .text-muted {
 color: #fff;
}

.left .chat-body p {
 color: #fff;
}

.bg-w {
    background-color: #50aecb;
}

.bg-w .friend-list li .friend-name {
    background-color: #50aecb;
    color: #fff;
}

.bg-w .friend-list li  .last-message {
    color: #fff;
}

.bg-w .friend-list li  .time {
    color: #fff;
}

</style>
@endsection
@section('content')

<div class="bootstrap snippets bootdey">
    <div class="row">
		<div class="col-md-4 bg-w ">
            <div class=" row border-bottom padding-sm" style="height: 35px;">
            	Messages
            </div>

            <!-- =============================================================== -->
            <!-- member list -->
            <ul class="friend-list">


            </ul>
		</div>

        <!--=========================================================-->
        <!-- selected chat -->
    	<div class="col-md-8 bg-white ">
            <div class="chat-message">
                <ul class="chat">
                </ul>
            </div>
            <div class="chat-box bg-white">
            	<div class="input-group">
                <input type="hidden" class="hidden">
            		<input class="form-control border no-shadow no-rounded text-body" placeholder="">
            		<span class="input-group-btn">
            			<button class="btn btn-success no-rounded msg_send_btn" type="button">Envoyer</button>
            		</span>
            	</div><!-- /input-group -->
            </div>
		</div>
	</div>
</div>
@endsection

@section('js')
<script>
     function prettyTime(time) {
             var times = time.split('-', 3);
             return times[0] + ':' + times[1];
            }


$('.sujet').on('click', function(){
    Swal.fire({
  title: 'Ajouter un nouveau sujet sur le forum',
  input: 'text',
  inputAttributes: {
    autocapitalize: 'off'
  },
  showCancelButton: true,
  confirmButtonText: 'Enregisterer',
  cancelButtonText: 'Retour',
  showLoaderOnConfirm: true,
  preConfirm: (nom) => {
    var _data ={ nom : nom}
     var url = "{!! url('')!!}/" + '/web-api-forum/create';
        axios.post(url,_data).then(
            (response) => {
                if (response.data.status) {
                    toastr.success(response.data.message);
                    loadForumSubject();
                }else{
                    toastr.warning(response.data.message);
                }
            }
        )
   },
  allowOutsideClick: () => !Swal.isLoading()
})
});


$('.creer-sujet').on('click', function(){
    var nom = $('.nom').val();

});

function loadMessages() {
    var url = "{!! url('')!!}/" + "/web-api-messages-to-private";
                axios.get(url)
                    .then((response) => {
                    $('.friend-list').replaceWith('<ul class="friend-list"></ul>')
                    messages = response.data.messages;
                    sender = '';
                    receiver = '';

                    var sended_messages = response.data.sended_messages;
                    var received_messages = response.data.received_messages;

                    messages.forEach(function(value) {
                       sender +='<li>'+
                                    '<a href="javascript: void(0);" onclick="getMessages('+value.sender.id+')" class="clearfix">'+
                                        '<img src="https://bootdey.com/img/Content/user_2.jpg" alt="" class="img-circle">'+
                                        '<div class="friend-name">'+
                                            '<strong>'+value.sender.first_name+' '+value.sender.last_name+'</strong>'+
                                        '</div>'+
                                        '<div class="last-message text-muted">'+value.contenu+'</div>'+
                                        '<small class="time text-muted">'+value.created_at+'</small>'+
                                    '<small class="chat-alert text-muted"><i class="fa fa-check"></i></small>'+
                                    '</a>'+
                                 '</li>';

                    });

                    $('.friend-list').append(sender);

                    }).catch((response) => {
                        console.log(response);
                    }
                );
}


function getMessages(id){
    var url = "{!! url('')!!}" + "/web-api-private-message/" + id;
        var _token= + "{!! auth()->user()->id !!}";
        $('.chat').replaceWith('<ul class="chat"></ul>');
        $('.hidden').replaceWith('<input type="hidden"  class="hidden">');
        $('.hidden').replaceWith('<input type="hidden"  class="hidden" value="'+id+'">');

        $('.text-body').replaceWith('<input class="form-control border no-shadow no-rounded text-body" placeholder="">');
        const array = [];
         axios.get(url)
                    .then((response) => {
                    available_messages = response.data.messages;
                    available_messages.forEach(function(value) {
                        chat_room = '';
                         if (value.is_mine != _token) {
                          chat_room +=' <li class="left clearfix">' +
                                        '<span class="chat-img pull-left">' +
                                           '<img src="https://bootdey.com/img/Content/user_3.jpg" alt="User Avatar">'+
                                        '</span>'+
                                        '<div class="chat-body clearfix">'+
                                           '<div class="header">' +
                                               '<strong class="primary-font">'+value.sender.first_name+'</strong>'+
                                               ' <small class="pull-right text-muted"><i class="fa fa-clock-o"></i>'+value.created_at+'</small>'+
                                            '</div>' +
                                            '<p>'+value.contenu+'</p>'+

                                         '</div>'+
                                         '</li>';
                         $('.chat').append(chat_room);
                    } else {
                        chat_room +=' <li class="right clearfix">' +
                                        '<div class="chat-body clearfix">'+
                                           '<div class="header">' +
                                               ' <small class="pull-right text-muted"><i class="fa fa-clock-o"></i>'+value.created_at+'</small>'+
                                            '</div>' +
                                            '<p>'+value.contenu+'</p>'+

                                         '</div>'+
                                         '</li>'
                                    $('.chat').append(chat_room);
                              }
                    });

                    }).catch((response) => {
                        console.log(response);
                    }
                );

}






$('.msg_send_btn').on('click',function(){

    var message = $('.text-body').val();

    var _token= + "{!! auth()->user()->id !!}";
    var receiver = + $('.hidden').val();
    var _data = {
        contenu : message,
        sender: _token,
        is_mine: _token,
        receiver: receiver
    }

   var url =  "{!! url('')!!}" + "/web-api-forum-message-store";
   console.log(_data)
    axios.post(url,_data).then((response) => {
          $('.write_msg').replaceWith(' <input type="text" class="write_msg" placeholder="" />');

          getMessages(receiver);
    })

});

     $(document).ready(function () {
        loadMessages();
        console.log('ok')
    });
</script>
@endsection
