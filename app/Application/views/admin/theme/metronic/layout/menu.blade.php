@foreach(getMenu('Admin') as $admin)
    @if(checkMenuSelect( $admin['item']['link']))
        <li class="nav-item start active open">
    @else
        <li class="nav-item">
    @endif

            @if(array_key_exists('item' , $admin))
                <a href="{{ array_key_exists('sub' , $admin) ? 'javascript:void(0);' : url($admin['item']['link']) }}"
                   class="{{ array_key_exists('sub' , $admin) ? 'nav-link nav-toggle' : '' }}">
                    {!! $admin['item']['icon'] != null ? $admin['item']['icon']:  '' !!}
                    <span class="title">
                  {{checkMenuSelect( $admin['item']['link'])}}/ {{ getDefaultValueKey($admin['item']['name']) }}
                </span>
                    <span class="selected"></span>

                </a>
            @endif
            @if(array_key_exists('sub' , $admin))
                <ul class="sub-menu">
                    @foreach($admin['sub']  as $sub)
                        @if(checkMenuSelect( $admin['item']['link']))
                        <li class="nav-item start active open">
                         @else
                            <li class="nav-item">
                          @endif
                            <a href="{{ url($sub['link']) }}" target="{{ $sub['type'] }}" class="nav-link ">
                                {!! $sub['icon'] != null ? $sub['icon']:  '' !!}
                                <span class="title">
                                 {{checkMenuSelect( $admin['item']['link'])}}/{{ getDefaultValueKey($sub['name']) }}
                            </span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            @endif
        </li>
        @endforeach

