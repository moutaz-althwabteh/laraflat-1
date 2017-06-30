@extends(layoutExtend())

@section('title')
    {{ adminTrans('state' , 'state') }} {{  isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('state' , 'state') , 'model' => 'state' , 'action' => isset($item) ? adminTrans('home' , 'edit')  : adminTrans('home' , 'add')  ])
         @include(layoutMessage())
        <form action="{{ concatenateLangToUrl('admin/state/item') }}{{ isset($item) ? '/'.$item->id : '' }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <label>{{adminTrans('state','country')}}</label>
            @php $countryName=isset($item)?$item->country_id:null @endphp
            {!! Form::select('country_id',$data['country'],$countryName)!!}
            {!! extractFiled('name' , isset($item->name) ? $item->name : null,'text','state') !!}

            <div class="form-group">
                <button type="submit" name="submit" class="btn btn-default" >
                    <i class="material-icons">check_circle</i>
                    {{ adminTrans('home' ,'save') }}  {{ adminTrans('state' , 'state') }}
                </button>
            </div>
        </form>
    @endcomponent
@endsection
