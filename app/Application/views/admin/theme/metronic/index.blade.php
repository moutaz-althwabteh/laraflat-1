@extends(layoutExtend())
@section('title')
    home Control
@endsection
@section('content')

    <div class="row clearfix">
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat blue">
                <div class="visual">
                    <i class="fa fa-user"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$data['userCount']}}">{{$data['userCount']}}</span>

                    </div>
                    <div class="desc">{{ adminTrans('home' ,'user') }}</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat purple">
                <div class="visual">
                    <i class="glyphicon glyphicon-list-alt"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$data['groupCount']}}">{{$data['groupCount']}}</span>

                    </div>
                    <div class="desc">{{ adminTrans('home' ,'groups') }}</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green">
                <div class="visual">
                    <i class="fa fa-unlock-alt"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$data['permissionsCount']}}">{{$data['permissionsCount']}}</span>

                    </div>
                    <div class="desc">{{ adminTrans('home' ,'permissions') }}</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat yellow-gold">
                <div class="visual">
                    <i class="fa fa-exchange"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$data['roleCount']}}">{{$data['roleCount']}}</span>

                    </div>
                    <div class="desc">{{ adminTrans('home' ,'roles') }}</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat red-mint">
                <div class="visual">
                    <i class="fa fa-file-text"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$data['pages']}}">{{$data['pages']}}</span>

                    </div>
                    <div class="desc">{{ adminTrans('home' ,'pages') }}</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat yellow-soft">
                <div class="visual">
                    <i class="fa fa-bars"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$data['menus']}}">{{$data['menus']}}</span>

                    </div>
                    <div class="desc">{{ adminTrans('home' ,'menus') }}</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat grey-mint">
                <div class="visual">
                    <i class="fa fa-cogs"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$data['setting']}}">{{$data['setting']}}</span>

                    </div>
                    <div class="desc">{{ adminTrans('home' ,'setting') }}</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
            <div class="dashboard-stat green-turquoise">
                <div class="visual">
                    <i class="icon-user-following"></i>
                </div>
                <div class="details">
                    <div class="number">
                        <span data-counter="counterup" data-value="{{$data['logs']}}">{{$data['logs']}}</span>

                    </div>
                    <div class="desc">{{ adminTrans('home' ,'logs') }}</div>
                </div>
                <a class="more" href="javascript:;"> View more
                    <i class="m-icon-swapright m-icon-white"></i>
                </a>
            </div>
        </div>

    </div>



    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-7 col-lg-7">
        <div class="portlet box purple">
            <div class="portlet-title">
                <div class="caption">
                    <i class="fa fa-user"></i>{{ adminTrans('home' ,'last_register_user') }}</div>
                <div class="tools">
                    <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover dashboard-task-infos">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>{{ adminTrans('home' ,'username') }}</th>
                            <th>{{ adminTrans('home' ,'created_at') }}</th>
                            <th>{{ adminTrans('curd' ,'edit') }}</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($data['lastRegisterUser'] as $last)
                            <tr>
                                <td>{{ $last->id }}</td>
                                <td>{{ $last->name }}</td>
                                <td>{{ $last->created_at}}</td>
                                <td>
                                    <a href="{{ url('admin/user/item/'.$last->id) }}">{{ adminTrans('home' ,'edit') }}</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>


        <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5">
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-user"></i>{{ adminTrans('home' ,'admin_panel_log') }}</div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body">
                    <ul class="list-unstyled">
                        @foreach($data['log'] as $Log)
                            <li>
                                <a href="{{ url('admin/log/'.$Log->id.'/view') }}" class="col-white">
                                    #{{ $Log->user->name }}
                                    <span class="pull-right align-left">
                                         <b>{{ $Log->model }}</b> : {{ $Log->action }}
                                    </span>
                                </a>
                            </li>
                            <br>
                        @endforeach
                    </ul>
                </div>
            </div>



        </div>
    </div>
@endsection
@section('script')
    {{ Html::script('metronic/plugins/counterup/jquery.waypoints.min.js') }}
    {{ Html::script('metronic/plugins/counterup/jquery.counterup.min.js') }}
    @endsection

