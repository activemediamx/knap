@extends($global->theme_folder.'.layouts.user')
@section('style')

@endsection

@section('page-header')
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title">{{$pageTitle}}</h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">

            <ol class="breadcrumb">
                <li><a href="#">@lang('menu.home')</a></li>
                <li class="active">{{$pageTitle}}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection
@section('content')

    <div class="panel panel-default">

        <div class="panel-body">
            <!-- .chat-row -->
            <div class="chat-main-box">
                <!-- .chat-left-panel -->
                <div class="chat-left-aside">
                    <div class="open-panel"><i class="ti-angle-right"></i></div>
                    <div class="chat-left-inner" >
                        <div class="form-material p-20">
                           </div>
                        <ul class="chatonline style-none" id="user_list">
                            @forelse($userList as $users)
                            <li  onclick="knap.getChatData({{$users->id}}, '{{addslashes($users->name)}}');return false;">
                                <a class="mt-comment" href="javascript:void(0)" id="dp_{{$users->id}}">
                                    <img src="{{$users->getGravatarAttribute(250)}}" alt="user-img" class="img-circle" style="height: 35px; width: 35px;"> <span>{{$users->name}}</span>
                                </a>
                            </li>
                            @empty
                                <li>
                                    @lang('messages.noUserFound')
                                </li>
                            @endforelse
                            <li class="p-20"></li>
                        </ul>
                    </div>
                </div>
                <!-- .chat-left-panel -->
                <!-- .chat-right-panel -->
                <div class="chat-right-aside">
                    <div class="chat-main-header">
                        <div class="p-20 b-b">
                            <h3 class="box-title dpName"  id="dpName">{{$dpName}}</h3> </div>
                    </div>
                    <div class="chat-box">
                        <ul class="chat-list slimscroll p-t-30 chats" id="chatsRecord">

                        </ul>
                        <div class="row send-chat-box">
                            {!! Form::open(['url' => '' ,'method' => 'post',]) !!}
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="submitTexts" name="message" placeholder="@lang('core.typeYourMessage')">
                                    <input  id="dpID" value="{{$dpData}}"  type="hidden"  />
                                    <input  id="dpName" value="{{$dpName}}"  type="hidden"  />
                                    <div class="custom-send">
                                        <button id="submitBtn" onclick="knap.sendMessage('send-chat-box');return false;" class="btn btn-danger btn-rounded" type="submit">@lang('core.send')</button>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
                <!-- .chat-right-panel -->
            </div>
            <!-- /.chat-row -->
            <!-- /.row -->

        </div>
    </div>

@endsection

@section('footerjs')
    <script src="{{ asset($global->theme_folder.'/js/chat.js') }}"></script>

    <!-- DataTables -->
    <script>
        $(function(){
            $('#userList').slimScroll({
                height: '250px'
            });
        });

        var dpButtonID = "";
        var dpName     = "";

        var dpClassID = '{{$dpData}}';

        if(dpClassID){ $('#dp_'+dpClassID).addClass('active');}

        //getting data
        knap.getChatData(dpButtonID , dpName);

    </script>
@endsection