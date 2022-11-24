<footer class="main-footer">
    <div class="container-fluid">
        <div class="container">
            <div class="footer-container">
                <div class="footer-top">
                    <div class="footer-left">
                        <a href="/" class="footer-logo">
                            <img src="{{asset('images/logo_footer.png')}}" alt="Logo">
                        </a>
                    </div>
                    <ul class="footer-list">
                        <li>
                            <a href="{{route('courses')}}"> {{__('txt.Cursuri Prim Ajutor')}} </a>
                        </li>
                        @foreach($pages as $page)
                            @if($page->show_in_footer)
                            <li>
                                <a href="{{route('page', $page->alias)}}"> {{ $page->title }} </a>
                            </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <a href="https://code4.ro/en/donate/" class="footer-donate-btn">
                    {{__('txt.Doneaza')}}
                </a>
                <div class="footer-bottom">
                    @if($settings->contact_email)
                        <p> {{__('txt.Dacă vrei să iei legătura cu noi o poți face pe e-mail la adresa')}}: <a href="mailto:{{$settings->contact_email}}" class="mail-link"> {{$settings->contact_email}} </a> </p>
                    @endif
                    <div class="footer-socials-list">
                        @if($settings->facebook)
                            <a href="{{$settings->facebook}}" target="_blank">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        @endif
                        @if($settings->instagram)
                            <a href="{{$settings->instagram}}" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        @endif
                        @if($settings->youtube)
                            <a href="{{$settings->youtube}}" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
