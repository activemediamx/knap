@extends($global->theme_folder.'.layouts.user')
@section('style')

    <link rel="stylesheet" href="{{ asset($global->theme_folder.'/global/css/components-md.min.css') }}">
@endsection
<style>
    .contacts-list li.active{
       background: #000 !important;
   }
   .direct-chat-contacts {
       height:auto!important;
   }
    .slimScrollDiv{
        height: 293px !important;
    }

</style>
@section('page-header')
    <section class="content-header">
        <h1>
            {{$pageTitle}}
        </h1>
        <ol class="breadcrumb">
                <li><a href="{{route('dashboard.index')}}"><i class="fa fa-dashboard"></i> @lang('menu.home')</a></li>
            <li class="active">@lang('menu.userChat')</li>
        </ol>
    </section>
@endsection
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="box padding2em">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="box userListBox">
                            <div class="box-header">
                                <div class="caption">
                                    <i class="icon-bubbles font-dark"></i>
                                    <span class="caption-subject font-dark bold uppercase">@lang('menu.users')</span>
                                </div>

                            </div>
                            <div class="box-body main-header" id="userList">
                                <!-- Contacts are loaded here -->
                                <div class="direct-chat-contacts navbar" >
                                    <ul class="contacts-list userList" id="user_list" >
                                        @forelse($userList as $users)
                                            <li id="dp_{{$users->id}}">
                                                <a href="javascript:;" data-toggle="tooltip" title="" onclick="knap.getChatData({{$users->id}}, '{{addslashes($users->name)}}');return false;" >
                                                    <img class="contacts-list-img" src="{{$users->getGravatarAttribute(250)}}" alt="User Image" style="height: 35px; width: 35px;">

                                                    <div class="contacts-list-info">
                                                    <span class="contacts-list-name">
                                                        {{$users->name}}
                                                    </span>
                                                    </div>
                                                    <!-- /.contacts-list-info -->
                                                </a>
                                            </li>
                                            @empty
                                            <li>
                                                @lang('messages.noUserFound')
                                            </li>
                                            @endforelse
                                          <!-- End Contact Item -->
                                    </ul>
                                    <!-- /.contatcts-list -->
                                </div>
                                <!-- /.direct-chat-pane -->
                            </div>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <!-- DIRECT CHAT DANGER -->
                        <div class="box direct-chat direct-chat-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title dpName" id="dpName">{{$dpName}}</h3>

                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages chats" style="padding: 1.5em !important;" id="chatsRecord">

                                </div>
                                <!--/.direct-chat-messages-->

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer" id="box-footer">
                               {!! Form::open(['url' => '' ,'method' => 'post',]) !!}
                                    <div class="input-group">
                                        <input type="text" name="message" id="submitTexts" placeholder="@lang('core.typeYourMessage')" class="form-control">
                                        <input  id="dpID" value="{{$dpData}}"  type="hidden"  />
                                        <input  id="dpName" value="{{$dpName}}"  type="hidden"  />
                                              <span class="input-group-btn" >
                                                <button id="submitBtn" type="submit" onclick="knap.sendMessage('box-footer');return false;" class="btn btn-primary btn-flat">@lang('core.send')</button>
                                              </span>
                                    </div>
                                    </br>
                                {!! Form::close() !!}
                                <div id="errorMessage"></div>
                            </div>
                            <!-- /.box-footer-->
                        </div>
                        <!--/.direct-chat -->
                    </div>
                </div>


                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>
        <!-- /.col -->
    </div>

@endsection

@section('footerjs')
    <script src="{{ asset($global->theme_folder.'/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>

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