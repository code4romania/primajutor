<footer class="main-footer">
    <div class="container-fluid d-flex items-center justify-content-end py-3 layout footer-strip-container">
        <div class="container d-flex items-center justify-content-end">
            <span class="mx-4">A project by</span>
            <a href="https://code4.ro/ro/code-for-romania-war-task-force">
                <img src="{{ mix('assets/images/lidl-logo.png') }}" alt="Lidl logo" class="h-6">
            </a>
        </div>
    </div>
    <div class="container-fluid pt-3">
        <div class="container">
            <div class="footer-container">
                <div class="footer-top">
                    <div class="footer-left">
                        <a href="/" class="footer-logo">
                            <img src="{{ mix('assets/images/logo_footer.png') }}" alt="Logo">
                        </a>
                    </div>
                    <ul class="footer-list">
                        <li>
                            <a href="{{ route('courses.index') }}"> {{ __('txt.buttons.help_courses') }} </a>
                        </li>
                        @foreach ($pages as $page)
                            @if ($page->show_in_footer)
                                <li>
                                    <a href="{{ route('page', $page) }}"> {{ $page->title }} </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <a href="https://code4.ro/en/donate/" class="footer-donate-btn">
                    {{ __('txt.buttons.donate') }}
                </a>
                <div class="footer-bottom">
                    @if ($settings->contact_email)
                        <p> {{ __('txt.footer.contact_txt') }}: <a href="mailto:{{ $settings->contact_email }}"
                                class="mail-link"> {{ $settings->contact_email }} </a> </p>
                    @endif
                    <div class="footer-socials-list">
                        @if ($settings->facebook)
                            <a href="{{ $settings->facebook }}" target="_blank">
                                <i class="fa-brands fa-facebook-f"></i>
                            </a>
                        @endif
                        @if ($settings->instagram)
                            <a href="{{ $settings->instagram }}" target="_blank">
                                <i class="fa-brands fa-instagram"></i>
                            </a>
                        @endif
                        @if ($settings->youtube)
                            <a href="{{ $settings->youtube }}" target="_blank">
                                <i class="fa-brands fa-youtube"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
