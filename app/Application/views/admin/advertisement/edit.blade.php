@extends(layoutExtend())

@section('title')
    {{ adminTrans('advertisement' , 'advertisement') }} {{  isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  }}
@endsection
@section('style')
    {{ Html::style('/admin/plugins/bootstrap-material-datetimepicker/css/bootstrap-material-datetimepicker.css') }}
    {!!Html::style('/css/bootstrap-fileinput.css') !!}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('advertisement' , 'advertisement') , 'model' => 'advertisement' , 'action' => isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  ])
    @include(layoutMessage())
    <form action="{{ concatenateLangToUrl('admin/advertisement/item') }}{{ isset($item) ? '/'.$item->id : '' }} "
          method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {!! extractFiled('name' , isset($item->name) ? $item->name : null,'text','advertisement') !!}
        <div class="form-group">
            <div class="form-line">
                <label>{{adminTrans('advertisement','category_id')}}</label>
                {!! Form::select('category_id',[],null,['class'=>'form-control','id'=>'category_id'])!!}
            </div>
        </div>
        <div class="fileinput fileinput-new" data-provides="fileinput">
            <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                @if(isset($item) && $item->image != '')
                    <img src="{{ url('/'.env('UPLOAD_PATH').'/'.$item->image) }}"  alt="">
                    <br>
                @endif
            </div>
            <div>
                <span class="btn btn-default btn-file"><span class="fileinput-new">{{adminTrans('home','Select_image')}}</span>
                    <span class="fileinput-exists">{{adminTrans('home','edit')}}</span><input type="file" name="image"></span>
                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">{{adminTrans('home','delete')}}</a>
            </div>
        </div>

        <div class="form-group">
            <div class="form-line">
                <label>{{adminTrans('advertisement','link')}}</label>
                <input type="text" name="link" class="form-control" value="{{ isset($item) ? $item->link : old('link') }}">
                 </div>
        </div>

        <div class="form-group">
            <div class="form-line">

            <label >{{adminTrans('advertisement','start_adv')}}</label>
            <input type="text" name="start_adv" class="datepicker form-control" value="{{isset($item->start_adv) ? $item->start_adv : null}}" >
            </div>
        </div>
        <div class="form-group">
            <div class="form-line">

            <label>{{adminTrans('advertisement','start_adv')}}</label>
            <input type="text" name="end_adv" value="{{isset($item->end_adv) ? $item->end_adv : null}}" class="datepicker form-control">
            </div>
         </div>
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-default" >
                <i class="material-icons">check_circle</i>
                {{ adminTrans('home' , 'save') }} {{ adminTrans('advertisement' , 'advertisement') }}
            </button>
        </div>
    </form>
    @endcomponent
@endsection
@section('script')
    {{ Html::script('/admin/plugins/momentjs/moment.js') }}
    {{ Html::script('/js/bootstrap-fileinput.js') }}

    {{ Html::script('/admin/plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js') }}
    <script>
        $('.datepicker').bootstrapMaterialDatePicker({
            time:false,
          
            setDate:"{{ date('dd/mm/YYYY')  }}",
            nowButton:true
        });
    </script>
@endsection