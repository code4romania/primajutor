@foreach ($points as $point)
    <div class="locations-route @if ($loop->first) selected @endif">
        <div class="location-left">
            <p class="location-type-icon">
                @if ($point['point']->type == 'defibrilator')
                    <img src="{{ mix('assets/images/defib-icon.png') }}" alt="">
                @else
                    <img src="{{ mix('assets/images/vector.png') }}" alt="">
                @endif
            </p>
            <div class="location-details">
                <h3> {{ $point['point']->title }} </h3>
                <p class="pb-0">
                    {{ $point['point']->address }}, {{ $point['point']->city->name }}
                </p>
                <p class="pt-0">{{ $point['point']->time_schedule }}</p>
                <span> {{ number_format($point['d'], 2, '.') }} km </span>
            </div>
        </div>
        <a href="javascript:navFunc({{ $point['point']->lat }}, {{ $point['point']->lng }})"
            class="location-directions">
            <i class="fa fa-location-arrow"></i>
            <span> {{ __('txt.buttons.indications') }} </span>
        </a>
    </div>
@endforeach
