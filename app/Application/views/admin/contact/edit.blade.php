@extends(layoutExtend())

@section('title')
    {{ adminTrans('contact' , 'contact') }} {{  isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('contact' , 'contact') , 'model' => 'contact' , 'action' => isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/contact/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group">
                <div class="form-line">
                    <label>{{adminTrans('contact','name')}}</label>
                    {{--            {!! extractFiled('name' , isset($item->name) ? $item->name : null) !!}--}}
                    <input type="text" name="name" value="{{isset($item->name) ? $item->name : null}}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label>{{adminTrans('contact','email')}}</label>
                    {{--            {!! extractFiled('name' , isset($item->name) ? $item->name : null) !!}--}}
                    <input type="text" name="email" value="{{isset($item->email) ? $item->email : null}}" class="form-control">
                </div>
            </div>
            <div class="form-group">
                <div class="form-line">
                    <label>{{adminTrans('contact','massage')}}</label>
                    {{--            {!! extractFiled('name' , isset($item->name) ? $item->name : null) !!}--}}
                    <textarea name="massage" class="form-control" rows="8">{{isset($item->massage) ? $item->massage : null}}</textarea>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ adminTrans('home' ,'save') }}  {{ adminTrans('contact' , 'contact') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
