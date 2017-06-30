@extends(layoutExtend())

@section('title')
    {{ adminTrans('advertisement' , 'advertisement') }} {{ adminTrans('home' , 'view') }}
@endsection

@section('content')
    @component(layoutForm() , ['title' => adminTrans('advertisement' , 'advertisement') , 'model' => 'advertisement' , 'action' => adminTrans('home' , 'view')  ])

        <table class="table table-bordered table-responsive table-striped">
            @php

                $fields = rename_keys(
                     removeFromArray($data['fields'] , ['id','created_at','updated_at']) ,
                     [

                     adminTrans('advertisement','name'),
                     adminTrans('advertisement','category_id'),
                     adminTrans('advertisement','link'),
                     adminTrans('advertisement','start_adv'),
                     adminTrans('advertisement','end_adv'),
                     adminTrans('advertisement','image'),
                     adminTrans('advertisement','active'),

                     ]
                );
            @endphp
                 @foreach($fields as $key =>  $field)
                        <tr>
                            <th>{{ $key }}</th>
                            @php $type =  getFileType($field , $item[$field]) @endphp
                            @if($type == 'File')
                                <td> <a href="{{ url(env('UPLOAD_PATH').'/'.$item[$field]) }}">{{ $item[$field] }}</a></td>
                            @elseif($type == 'Image')
                                <td> <img src="{{ url(env('UPLOAD_PATH').'/'.$item[$field]) }}" width="100" height="100" /></td>
                            @else
                                @if($field == 'name' || $field == 'body')
                                    <td>{!!  getDefaultValueKey(nl2br($item[$field]))  !!}</td>
                                @else
                                    <td>{!!  nl2br($item[$field])  !!}</td>
                                @endif
                            @endif
                        </tr>
                    @endforeach
        </table>

        @include('admin.advertisement.buttons.delete' , ['id' => $item->id])
        @include('admin.advertisement.buttons.edit' , ['id' => $item->id])

    @endcomponent
@endsection
