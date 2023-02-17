<footer class="absolute bottom-0 left-0 flex w-full flex-col">
    <div class="container mx-auto my-2 flex items-center justify-end">
        <div class="container mx-auto flex items-center justify-end">
            <span class="mx-4 self-end">{{ __('txt.footer.project_by') }}</span>
            <a class="ml-3" href="https://code4.ro/ro/code-for-romania-war-task-force">
                <img class="h-14" src="{{ mix('assets/images/code4ro_head.png') }}" alt="Code4Romania logo">
            </a>
            <a class="ml-3" href="https://code4.ro/ro/code-for-romania-war-task-force">
                <img class="h-14" src="{{ mix('assets/images/logo-smurd2.png') }}" alt="SMURD logo">
            </a>
            <span class="ml-24 self-end">{{ __('txt.footer.supported_by') }}</span>
            <a class="ml-3" href="https://code4.ro/ro/code-for-romania-war-task-force">
                <img class="h-14" src="{{ mix('assets/images/lidl-logo.png') }}" alt="Lidl logo">
            </a>
        </div>
    </div>
    <div class="w-full bg-black text-white text-[15]">
        <div class="container mx-auto flex h-80 w-4/5">
            <div class="flex w-1/2 pb-3">
                <div class="mt-6 flex w-1/3 flex-col justify-center pl-4">
                    <h4 class="mb-4 text-base font-bold text-yellow">{{ __('txt.footer.util_links') }}</h4>
                    <ul>
                        <li>
                            <a href="https://code4.ro/en/donate/">
                                {{ __('txt.buttons.donate') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}">
                                {{ __('txt.buttons.about_project') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}">
                                {{ __('txt.footer.source_code') }} </a>
                        </li>
                    </ul>
                </div>
                <div class="flex w-2/3 flex-col justify-center">
                    <h4 class="mb-4 text-base font-bold text-yellow"> {{ __('txt.footer.legal_info') }}</h4>
                    <ul>
                        <li>
                            <a href="https://code4.ro/en/donate/">
                                {{ __('txt.footer.policy') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}">
                                {{ __('txt.footer.terms') }} </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="flex w-1/2 flex-col items-end justify-center pr-5">
                <div class="mb-5 mt-4 w-32">
                    <a href="/">
                        <img src="{{ mix('assets/images/commitglobal_white.png') }}" alt="Logo">
                    </a>
                </div>
                <h4>&#169; 2022 Commit Global</h4>
                <h4> {{ __('txt.footer.commit_txt') }}</h4>
            </div>
        </div>
    </div>
</footer>
