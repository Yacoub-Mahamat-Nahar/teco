@extends('layouts.forum')
@section('css')
    <link rel="stylesheet" href="{{ url('css/chat.css') }}">
   <style>
      .card-bordered {
    border: 1px solid #ebebeb
}

.card {
    border: 0;
    border-radius: 0px;
    margin-bottom: 30px;
    -webkit-box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
    box-shadow: 0 2px 3px rgba(0, 0, 0, 0.03);
    -webkit-transition: .5s;
    transition: .5s
}

.padding {
    padding: 3rem !important
}

body {
    background-color: #f9f9fa
}

.card-header:first-child {
    border-radius: calc(.25rem - 1px) calc(.25rem - 1px) 0 0
}

.card-header {
    display: -webkit-box;
    display: flex;
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    padding: 15px 20px;
    background-color: transparent;
    border-bottom: 1px solid rgba(77, 82, 89, 0.07)
}

.card-header .card-title {
    padding: 0;
    border: none
}

h4.card-title {
    font-size: 17px
}

.card-header>*:last-child {
    margin-right: 0
}

.card-header>* {
    margin-left: 8px;
    margin-right: 8px
}

.btn-secondary {
    color: #4d5259 !important;
    background-color: #e4e7ea;
    border-color: #e4e7ea;
    color: #fff
}

.btn-xs {
    font-size: 11px;
    padding: 2px 8px;
    line-height: 18px
}

.btn-xs:hover {
    color: #fff !important
}

.card-title {
    font-family: Roboto, sans-serif;
    font-weight: 300;
    line-height: 1.5;
    margin-bottom: 0;
    padding: 15px 20px;
    border-bottom: 1px solid rgba(77, 82, 89, 0.07)
}

.ps-container {
    position: relative
}

.ps-container {
    -ms-touch-action: auto;
    touch-action: auto;
    overflow: hidden !important;
    -ms-overflow-style: none
}

.media-chat {
    padding-right: 64px;
    margin-bottom: 0
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear
}

.media .avatar {
    flex-shrink: 0
}

.avatar {
    position: relative;
    display: inline-block;
    width: 36px;
    height: 36px;
    line-height: 36px;
    text-align: center;
    border-radius: 100%;
    background-color: #f5f6f7;
    color: #8b95a5;
    text-transform: uppercase
}

.media-chat .media-body {
    -webkit-box-flex: initial;
    flex: initial;
    display: table
}

.media-body {
    min-width: 0
}

.media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px;
    font-weight: 100;
    color: #9b9b9b
}

.media>* {
    margin: 0 8px
}

.media-chat .media-body p.meta {
    background-color: transparent !important;
    padding: 0;
    opacity: .8
}

.media-meta-day {
    -webkit-box-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    align-items: center;
    margin-bottom: 0;
    color: #8b95a5;
    opacity: .8;
    font-weight: 400
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear
}

.media-meta-day::before {
    margin-right: 16px
}

.media-meta-day::before,
.media-meta-day::after {
    content: '';
    -webkit-box-flex: 1;
    flex: 1 1;
    border-top: 1px solid #ebebeb
}

.media-meta-day::after {
    content: '';
    -webkit-box-flex: 1;
    flex: 1 1;
    border-top: 1px solid #ebebeb
}

.media-meta-day::after {
    margin-left: 16px
}

.media-chat.media-chat-reverse {
    padding-right: 12px;
    padding-left: 64px;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: reverse;
    flex-direction: row-reverse
}

.media-chat {
    padding-right: 64px;
    margin-bottom: 0
}

.media {
    padding: 16px 12px;
    -webkit-transition: background-color .2s linear;
    transition: background-color .2s linear
}

.media-chat.media-chat-reverse .media-body p {
    float: right;
    clear: right;
    background-color: #50aecb;
    color: #fff
}

.media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px
}


.media-chat.media-chat-reverse .media-body p time {
    float: right;
    clear: right;
   color: rgb(0, 0, 0)
}

.media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px;
}

.media-chat .media-body p {
    position: relative;
    padding: 6px 8px;
    margin: 4px 0;
    background-color: #f5f6f7;
    border-radius: 3px;
    font-weight: 100;
    color: #000000;
}

.media-chat .media-body p time{
    color: #000000;
}


.border-light {
    border-color: #f1f2f3 !important
}

.bt-1 {
    border-top: 1px solid #ebebeb !important
}

.publisher {
    position: relative;
    display: -webkit-box;
    display: flex;
    -webkit-box-align: center;
    align-items: center;
    padding: 12px 20px;
    background-color: #f9fafb
}

.publisher>*:first-child {
    margin-left: 0
}

.publisher>* {
    margin: 0 8px
}

.publisher-input {
    -webkit-box-flex: 1;
    flex-grow: 1;
    border: none;
    outline: none !important;
    background-color: transparent
}

button,
input,
optgroup,
select,
textarea {
    font-family: Roboto, sans-serif;
    font-weight: 300
}

.publisher-btn {
    background-color: transparent;
    border: none;
    color: #8b95a5;
    font-size: 16px;
    cursor: pointer;
    overflow: -moz-hidden-unscrollable;
    -webkit-transition: .2s linear;
    transition: .2s linear
}

.file-group {
    position: relative;
    overflow: hidden
}

.publisher-btn {
    background-color: transparent;
    border: none;
    color: #000000;
    font-size: 16px;
    cursor: pointer;
    overflow: -moz-hidden-unscrollable;
    -webkit-transition: .2s linear;
    transition: .2s linear
}

.file-group input[type="file"] {
    position: absolute;
    opacity: 0;
    z-index: -1;
    width: 20px
}

.text-info {
    color: #50aecb !important
}

.msg_send_btn {
    background: #50aecb none repeat scroll 0 0;
    border: medium none;
    border-radius: 50%;
    color: #fff;
    cursor: pointer;
    font-size: 17px;
    height: 33px;
    position: absolute;
    right: 0;
    top: 11px;
    width: 33px;
}

.active_chat {
    background: #50aecb;
}
.chat_list {
    border-bottom: 1px solid #ffff;
    margin: 0;
    padding: 18px 16px 10px;
}

.chat_ib .chat-title {
   color: #ffffff;
}

.inbox_people {
    background: #50aecb none repeat scroll 0 0;
    float: left;
    overflow: hidden;
    width: 40%;
    border-right: 1px solid #c4c4c4;
}

   </style>
@endsection
@section('title')
    Forum
@endsection
@section('content')


   <div class="container" style="padding-top: 2%">
    <div>

        <div class="container">
            <div style="padding-top: 2%">
                <h3 class="pull-left">Forum</h3> &nbsp; &nbsp;
                @if (auth()->user())
                    @if (auth()->user()->hasRole('Médiathécaire'))
                         <button class="btn btn-sm btn-outline-primary pull-right sujet" type="button">+ Nouveau sujet</button>
                    @endif
                @endif

            </div>
            <br>
        </div>
        <div class="messaging">
              <div class="inbox_msg">
                <div class="inbox_people">

                  <div class="inbox_chat">

                  </div>
                </div>
                <div class="mesgs">

                    <div class="ps-container ps-theme-default ps-active-y" id="chat-content" >

                             <div class="msg_history"></div>
                    </div>

                  <div class="type_msg">
                    <div class="input_msg_write">
                      <input type="text" class="write_msg" placeholder="" />
                      <input type="hidden"  class="hidden">
                      <button class="msg_send_btn btn-primary" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                    </div>
                  </div>
                </div>
              </div>



            </div></div>
   </div>



 <div class="modal fade bs-example-modal-lg formulaire" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myLargeModalLabel">Connection</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form class="form-horizontal">


                    <div>
                        <label for="email" class="col-md-12 control-label">Nom </label>

                        <div class="col-md-12">
                            <input type="text" class="form-control nom" name="email"  required autofocus>

                        </div>
                    </div>



            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light creer-sujet">Créer le sujet</button>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
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

function loadForumSubject() {
    var url = "{!! url('')!!}/" + "web-api-forum";
                axios.get(url)
                    .then((response) => {
                    $('.inbox_chat').replaceWith('<div class="inbox_chat"></div>')
                    available_chat = response.data.available_chat;
                    chat_room = '';

                    available_chat.forEach(function(value) {
                       chat_room +='<div class="chat_list active_chat"><div class="chat_people"><div class="chat_ib"><a href="javascript: void(0);" onclick="getMessage('+value.id+')"><h5 class="chat-title">'+ value.nom+'<span class="chat_date">'+value.created_at+'</span> <span><i class="fa fa-flip-horizontal"></i></span></h5></a></div></div></div>';

                    });

                    $('.inbox_chat').append(chat_room);

                    }).catch((response) => {
                        console.log(response);
                    }
                );
}


function getMessage(id){
    var url = "{!! url('')!!}" + "/web-api-forum-message/" + id;
        var _token= + "{!! auth()->user()->id !!}";
        $('.msg_history').replaceWith('<div class="msg_history"></div>');
        $('.hidden').replaceWith('<input type="hidden"  class="hidden">');
        $('.hidden').replaceWith('<input type="hidden"  class="hidden" value="'+id+'">');

        $('.write_msg').replaceWith(' <input type="text" class="write_msg" placeholder="" />');
        const array = [];
         axios.get(url)
                    .then((response) => {
                    available_messages = response.data.messages;
                    available_messages.forEach(function(value) {
                        chat_room = '';
                         if (value.is_mine != _token) {
                          chat_room +=' <div class="media media-chat">' +
                                        '<img class="avatar" src="https://img.icons8.com/color/36/000000/administrator-male.png" alt="..."> <p class="small">'+value.sender.first_name+'</p>'+
                                             '<div class="media-body">' +
                                                             '<p>'+value.contenu+'</p>'+
                                                             ' <p class="meta"><time>'+value.created_at+'</time></p>'+
                                                    '</div>' +
                                     '</div>';
                         $('.msg_history').append(chat_room);
                    } else {
                        chat_room +='<div class="media media-chat media-chat-reverse">' +
                                         ' <div class="media-body">' +
                                                  '<p>'+value.contenu+'</p>'+
                                                 '<p class="meta"><time>'+value.created_at+'</time></p>'+
                                         '</div>' +
                                     '</div>';
                                    $('.msg_history').append(chat_room);
                              }
                    });

                         $('.chat_ijb').append(chat_room);
                    }).catch((response) => {
                        console.log(response);
                    }
                );

}






function clearMessageBox(){

}

$('.msg_send_btn').on('click',function(){

    var message = $('.write_msg').val();
    var chat_online = + $('.hidden').val();

    var _token= + "{!! auth()->user()->id !!}";

    var _data = {
        contenu : message,
        sender: _token,
        is_mine: _token,
        chat_online: chat_online
    }

   var url =  "{!! url('')!!}" + "/web-api-forum-store";

    axios.post(url,_data).then((response) => {
          $('.write_msg').replaceWith(' <input type="text" class="write_msg" placeholder="" />');
          getMessage(chat_online);
    })

});

     $(document).ready(function () {
        loadForumSubject();
    });
 </script>
@endsection
