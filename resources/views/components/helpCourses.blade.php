@foreach($helpCourses as $helpCourse)
    <div class="locations-route">
        <div class="location-left">
            <p class="location-type-icon">
                <img src="{{asset('images/defib-icon.png')}}" alt="">
            </p>
            <div class="location-details">
                <h3> {{$helpCourse->title}} </h3>
                <p class="pb-0">{{\Carbon\Carbon::parse($helpCourse->date)->format('d M Y')}}</p>
                <p class="pt-0">
                    {{$helpCourse->info}}
                </p>
            </div>
        </div>
        <a href="{{$helpCourse->link}}" class="location-directions" target="_blank">
            <i class="fa-solid fa-location-dot"></i>
            <span> {{__('txt.buttons.register')}} </span>
        </a>
    </div>
@endforeach
