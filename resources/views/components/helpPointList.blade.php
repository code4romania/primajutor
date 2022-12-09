@foreach($helpPoints as $helpPoint)
    <div class="locations-route">
        <div class="location-left">
            <p class="location-type-icon">
                @if($helpPoint->type == 'defibrilator')
                    <img src="{{mix('assets/images/defib-icon.png')}}" alt="">
                @else
                    <img src="{{mix('assets/images/vector.png')}}" alt="">
                @endif
            </p>
            <div class="location-details">
                <h3> {{$helpPoint->title}} </h3>
                <p class="pb-0">
                    {{$helpPoint->address}}, {{$helpPoint->city->name}}
                </p>
                <p class="pt-0">{{$helpPoint->time_schedule}}</p>
                <a href="javascript:navFunc({{$helpPoint->lat}}, {{$helpPoint->lng}})" class="ud-link">
                    {{__('txt.buttons.see_on_map')}}
                    <i class="fa fa-diamond-turn-right"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach
