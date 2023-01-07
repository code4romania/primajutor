@foreach ($points as $point)
    <div class="locations-route">
        <div class="location-left">
            <p class="location-type-icon">
                @if ($point->type == 'defibrilator')
                    <img src="{{ mix('assets/images/defib-icon.png') }}" alt="">
                @else
                    <img src="{{ mix('assets/images/vector.png') }}" alt="">
                @endif
            </p>
            <div class="location-details">
                <h3> {{ $point->title }} </h3>
                <p class="pb-0">
                    {{ $point->address }}, {{ $point->city->name }}
                </p>
                <p class="pt-0">{{ $point->time_schedule }}</p>
                <a href="javascript:navFunc({{ $point->lat }}, {{ $point->lng }})" class="ud-link">
                    {{ __('txt.buttons.see_on_map') }}
                    <i class="fa fa-diamond-turn-right"></i>
                </a>
            </div>
        </div>
    </div>
@endforeach
