@foreach($points as $key => $helpPoint)
    <div class="locations-route @if($key == 0) selected @endif">
        <div class="location-left">
            <p class="location-type-icon">
                @if($helpPoint['point']->type == 'defibrilator')
                    <img src="{{mix('assets/images/defib-icon.png')}}" alt="">
                @else
                    <img src="{{mix('assets/images/vector.png')}}" alt="">
                @endif
            </p>
            <div class="location-details">
                <h3> {{$helpPoint['point']->title}} </h3>
                <p class="pb-0">
                    {{$helpPoint['point']->address}}, {{$helpPoint['point']->city->name}}
                </p>
                <p class="pt-0">{{$helpPoint['point']->time_schedule}}</p>
                <span> {{number_format($helpPoint['d'], 2, '.')}} km </span>
            </div>
        </div>
        <a href="javascript:navFunc({{$helpPoint['point']->lat}}, {{$helpPoint['point']->lng}})" class="location-directions">
            <i class="fa fa-location-arrow"></i>
            <span> {{__('txt.buttons.indications')}} </span>
        </a>
    </div>
@endforeach
