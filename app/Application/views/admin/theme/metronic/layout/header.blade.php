<div class="header">
    <h2>
        {{ isset($action) ? ucfirst($action) : adminTrans('home' , 'control') }}  {{ ucfirst($title) }}
    </h2>
   @if($button == true)


                <a href="{{ url('admin/'.$model.'/item') }}" class="btn btn-primary">
                    <i class="material-icons">add</i> {{ adminTrans('home' , 'add') }} {{ ucfirst($title) }}
                </a>

    @endif
</div>
<br>