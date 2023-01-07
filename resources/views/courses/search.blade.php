@foreach ($courses as $course)
    <a href="{{ $course->link }}" target="_blank" rel="noopener" class="locations-route">
        <div class="location-left">
            <p class="location-type-icon">
                <img src="{{ mix('assets/images/defib-icon.png') }}" alt="">
            </p>
            <div class="location-details">
                <h3> {{ $course->title }} </h3>
                <p class="pb-0">{{ $course->date->format('d M Y') }}</p>
                <p class="pt-0">
                    {{ $course->info }}
                </p>
            </div>
        </div>
        <span class="location-directions">
            <i class="fa fa-arrow-circle-right"></i>
            <span> {{ __('txt.buttons.register') }} </span>
        </span>
    </a>
@endforeach
