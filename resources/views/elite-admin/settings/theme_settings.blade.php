@extends($global->theme_folder.'.layouts.user')

@section('style')
    <link href="{{ asset($global->theme_folder.'/plugins/icheck/skins/minimal/_all.css') }}" rel="stylesheet">

    <style>
        .list{
            float:left; width: 33.33333%; padding: 5px;
        }
        .radio label{
            background-color:#000000 !important;
            border:0;
        }
    </style>
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
                <li><a href="#">@lang('core.home')</a></li>
                <li class="active">{{$pageTitle}}</li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
@endsection
@section('content')
    <div class="panel panel-default">

        <div class="panel-body">
            {!! Form::open(['url' => '', 'method' => 'post', 'id' => 'add-edit-form','class'=>'form-horizontal']) !!}
            <input type="hidden" name="_method" value="PUT">
            <input type="hidden" name="setting" value="theme">
            <div class="form-body">
                <div class="md-radio-list">
                    <div class="form-group">
                        <div class="col-sm-4 text-center">
                            @lang('core.metronic')
                            <img id="metronic-img" src="{{asset('theme-images/metronic'.(($global->theme_folder=='metronic')?'-'.$global->theme_color:'').'.jpg')}}" style="width: 85%;height: 100%;margin-top: 10px;">

                        </div>
                        <div class="col-sm-4  text-center">
                            <ul class="list-unstyled clearfix">

                                <li style="float:left; width: 33.33333%; padding: 5px;">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="metronic" value="metronic:default" @if($global->theme_folder=='metronic' && $global->theme_color=='default')) checked @endif>
                                        <label for="metronic">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #4F5467;"></span>
                                        <span style="display:block;background: #4F5467; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: white;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.darkHeader')</p>

                                </li>
                                <li style="float:left; width: 33.33333%; padding: 5px;">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="metronic1" value="metronic:light" @if($global->theme_folder=='metronic' && $global->theme_color=='light')) checked @endif>
                                        <label for="metronic1">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span>
                                        </label>

                                    </div>
                                    <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.lightHeader')</p>


                                </li>
                            </ul>
                        </div>
                        <div class="col-sm-2 text-center">
                            RTL
                            <select name="rtl" id="" class="form-control">
                                <option value="0">@lang('core.no')</option>
                                <option value="1" @if($global->rtl==1) selected @endif>@lang('core.yes')</option>

                            </select>
                        </div>
                    </div>
                        <hr>
                    <div class="form-group" id="admin-lte-group">
                        <div class="col-sm-4 text-center">
                                <label>
                                    @lang('core.adminLte')
                                </label>
                            <img id="admin-lte-img" src="{{asset('theme-images/admin-lte'.(($global->theme_folder=='admin-lte')?'-'.$global->theme_color:'').'.jpg')}}" style="width: 85%;height: 100%;margin-top: 10px;">

                        </div>
                        <div class="col-sm-6 text-center">
                            <div class="radio radio-success">
                                <ul class="list-unstyled clearfix">

                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte1" value="admin-lte:blue" @if($global->theme_folder=='admin-lte' && $global->theme_color=='blue') checked @endif>
                                    </div>

                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9;"></span>
                                        <span class="bg-light-blue" style=" background:#3c8dbc; display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div><p class="text-center no-margin">@lang('core.blue')</p>
                                </li>

                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte2" value="admin-lte:black" @if($global->theme_folder=='admin-lte' && $global->theme_color=='black') checked @endif>
                                    </div>
                                    <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)"
                                         class="clearfix">
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #fefefe;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 7px; background: #fefefe;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #222;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>
                                    <p class="text-center no-margin">@lang('core.white')</p>
                                </li>

                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte3" value="admin-lte:purple" @if($global->theme_folder=='admin-lte' && $global->theme_color=='purple') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span>
                                        <span class="bg-purple" style="display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.purple')</p>
                                </li>

                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte4" value="admin-lte:green" @if($global->theme_folder=='admin-lte' && $global->theme_color=='green') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-green-active"></span>
                                        <span class="bg-green" style="background: green; display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>
                                    <p class="text-center no-margin">@lang('core.green')</p>
                                </li>


                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte5" value="admin-lte:red" @if($global->theme_folder=='admin-lte' && $global->theme_color=='red') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span>
                                        <span class="bg-red" style="background:red; display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>
                                    <p class="text-center no-margin">@lang('core.red')</p>
                                </li>


                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte6" value="admin-lte:yellow" @if($global->theme_folder=='admin-lte' && $global->theme_color=='yellow') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span>
                                        <span class="bg-yellow" style="background:yellow; display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #222d32;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>
                                    <p class="text-center no-margin">@lang('core.yellow')</p>
                                </li>


                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte7" value="admin-lte:blue-light" @if($global->theme_folder=='admin-lte' && $global->theme_color=='blue-light')checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #367fa9;"></span>
                                        <span class="bg-light-blue" style="background:cornflowerblue; display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.blueLight')</p>
                                </li>


                                <li class="list">

                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte8" value="admin-lte:black-light" @if($global->theme_folder=='admin-lte' && $global->theme_color=='black-light') checked @endif>
                                    </div>

                                    <div style="box-shadow: 0 0 2px rgba(0,0,0,0.1)" class="clearfix">
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: black;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 7px; background: black;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.blackLight')</p>
                                </li>
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte9" value="admin-lte:purple-light" @if($global->theme_folder=='admin-lte' && $global->theme_color=='purple-light') checked @endif>
                                    </div>
                                    <div>
                                        <span style="background:purple;  display:block; width: 20%; float: left; height: 7px;" class="bg-purple-active"></span>
                                        <span class="bg-purple" style="background:purple; display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>
                                    <p class="text-center no-margin">@lang('core.purpleLight')</p>
                                </li>

                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte10" value="admin-lte:green-light" @if($global->theme_folder=='admin-lte' && $global->theme_color=='green-light') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block;background:lawngreen;  width: 20%; float: left; height: 7px;" class="bg-green-active"></span>
                                        <span class="bg-green" style="background:lawngreen;  display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.greenLight')</p>
                                </li>

                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte11" value="admin-lte:red-light" @if($global->theme_folder=='admin-lte' && $global->theme_color=='red-light') checked @endif>
                                    </div>
                                    <div>
                                        <span style="background:red; display:block; width: 20%; float: left; height: 7px;" class="bg-red-active"></span>
                                        <span class="bg-red" style="background:red; display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.redLight')</p>
                                </li>

                                <li class="list">

                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="lte12" value="admin-lte:yellow-light" @if($global->theme_folder=='admin-lte' && $global->theme_color=='yellow-light') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block;background:yellow;  width: 20%; float: left; height: 7px;" class="bg-yellow-active"></span>
                                        <span class="bg-yellow" style="background:yellow;  display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #f9fafc;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin" style="font-size: 12px;">@lang('core.yellowLight')</p></li>
                            </ul>
                             </div>
                        </div>
                    </div>
                    <hr>
                    <div class="form-group" id="elite-admin-group">
                        <div class="col-sm-4 text-center">
                                <label>
                                    @lang('core.eliteAdmin')
                                </label>
                            <img id="elite-admin-img" src="{{asset('theme-images/elite-admin'.(($global->theme_folder=='elite-admin')?'-'.$global->theme_color:'').'.jpg')}}" style="width: 80%;height: 100%;margin-top: 10px;">
                        </div>

                        <div class="col-sm-6 text-center">
                            <div class="radio radio-success">
                              <ul class="list-unstyled clearfix">

                                {{--------------------Light Colors---------------}}
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elite1" value="elite-admin:blue" @if($global->theme_folder=='elite-admin' && $global->theme_color=='blue') checked @endif>
                                    </div>

                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #3598dc;"></span>
                                        <span class="bg-blue" style="display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: white;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.light_blue')</p>
                                </li>
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elite2" value="elite-admin:default" @if($global->theme_folder=='elite-admin' && $global->theme_color=='default') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #e7957d;"></span>
                                        <span style="display:block;background: #e7957d; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: white;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.light_default')</p>
                                </li>
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elite3" value="elite-admin:gray" @if($global->theme_folder=='elite-admin' && $global->theme_color=='gray') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #a0aec4;"></span>
                                        <span style="display:block;background: #a0aec4; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: white;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.light_gray')</p>
                                </li>
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elite4" value="elite-admin:green" @if($global->theme_folder=='elite-admin' && $global->theme_color=='green') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #00c292;"></span>
                                        <span style="display:block;background: #00c292; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: white;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.light_green')</p>
                                </li>
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elite5" value="elite-admin:megna" @if($global->theme_folder=='elite-admin' && $global->theme_color=='megna') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #01c0c8;"></span>
                                        <span style="display:block;background: #01c0c8; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: white;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.light_megna')</p>
                                </li>
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elite6" value="elite-admin:purple" @if($global->theme_folder=='elite-admin' && $global->theme_color=='purple') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #ab8ce4;"></span>
                                        <span style="display:block;background: #ab8ce4; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: white;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.light_purple')</p>
                                </li>

                                {{--------------------Dark  Colors---------------}}
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elitedark1" value="elite-admin:blue-dark" @if($global->theme_folder=='elite-admin' && $global->theme_color=='blue-dark') checked @endif>
                                    </div>

                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #3598dc;"></span>
                                        <span class="bg-blue" style="display:block; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #4f5467;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.dark_blue')</p>
                                </li>
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elitedark2" value="elite-admin:default-dark" @if($global->theme_folder=='elite-admin' && $global->theme_color=='default-dark') checked @endif>

                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #e7957d;"></span>
                                        <span style="display:block;background: #e7957d; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #4f5467;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.dark_default')</p>
                                </li>
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elitedark3" value="elite-admin:gray-dark" @if($global->theme_folder=='elite-admin' && $global->theme_color=='gray-dark') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #a0aec4;"></span>
                                        <span style="display:block;background: #a0aec4; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #4f5467;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.dark_gray')</p>
                                </li>
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elitedark4" value="elite-admin:green-dark" @if($global->theme_folder=='elite-admin' && $global->theme_color=='green-dark') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #00c292;"></span>
                                        <span style="display:block;background: #00c292; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #4f5467;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.dark_green')</p>
                                </li>
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elitedark5" value="elite-admin:megna-dark" @if($global->theme_folder=='elite-admin' && $global->theme_color=='megna-dark') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #01c0c8;"></span>
                                        <span style="display:block;background: #01c0c8; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #4f5467;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.dark_megna')</p>
                                </li>
                                <li class="list">
                                    <div class="md-radio">
                                        <input type="radio" name="theme" class="md-radio" id="elitedark6" value="elite-admin:purple-dark" @if($global->theme_folder=='elite-admin' && $global->theme_color=='purple-dark') checked @endif>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 7px; background: #ab8ce4;"></span>
                                        <span style="display:block;background: #ab8ce4; width: 80%; float: left; height: 7px;"></span>
                                    </div>
                                    <div>
                                        <span style="display:block; width: 20%; float: left; height: 20px; background: #4f5467;"></span>
                                        <span style="display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;"></span>
                                    </div>

                                    <p class="text-center no-margin">@lang('core.dark_purple')</p>
                                </li>

                            </ul>
                           </div>
                        </div>
                    </div>
                    </div>
                </div>

                <div class="form-group text-center">
                    <button type="button" class="btn btn-custom waves-effect waves-light m-r-10" onclick="knap.addUpdate('settings', '{{$global->id or ''}}');return false">@lang('core.submit')</button>
                </div>
            </div>
            {!! Form::close()!!}
        </div>
    </div>

@endsection

@section('scripts-footer')
    <script src="{{ asset($global->theme_folder.'/plugins/icheck/icheck.min.js') }}"></script>
    <script src="{{ asset($global->theme_folder.'/plugins/icheck/icheck.init.js') }}"></script>
    <script>

        $('input[type=radio]').on('ifClicked', function(event){
            var path = "{{asset('theme-images/')}}";
            var str = $(this).attr('value');
            var split = str.split(':');
            var img = split[1];
            $('#'+split[0]+'-img').attr("src", path+"/"+split[0]+"-"+img+".jpg");
        });
        $('input').iCheck({
            radioClass: 'iradio_minimal-red'
        });
    </script>
@endsection

