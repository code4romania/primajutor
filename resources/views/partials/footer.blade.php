<footer class="mx-auto flex w-full flex-col">
    <hr class="w-full">
    <div class="mx-auto my-2 flex w-full items-center justify-end">
        <div class="mx-auto flex flex-col items-start justify-end md:w-4/5 md:flex-row md:px-5 lg:items-center">
            <div class="flex w-full md:w-auto">
                <span class="mx-4 w-1/2 self-end text-sm md:w-auto md:text-base">{{ __('txt.footer.project_by') }}</span>
                {{-- <div class="flex flex-row justify-between"> --}}
                <a class="ml-3" href="https://code4.ro/ro/code-for-romania-war-task-force">
                    <img class="h-7 lg:h-14" src="{{ mix('assets/images/code4ro_head.png') }}" alt="Code4Romania logo">
                </a>
                <a class="ml-3" href="https://code4.ro/ro/code-for-romania-war-task-force">
                    <img class="h-7 lg:h-14" src="{{ mix('assets/images/logo-smurd2.png') }}" alt="SMURD logo">
                </a>
                {{-- </div> --}}
            </div>
            <div class="mt-2 flex w-full md:mt-0 md:w-1/3 md:justify-end lg:w-1/5">

                <span
                    class="mx-4 w-1/2 self-end text-sm md:w-auto md:text-base">{{ __('txt.footer.supported_by') }}</span>
                <a class="ml-3" href="https://code4.ro/ro/code-for-romania-war-task-force">
                    <img class="h-7 lg:h-14" src="{{ mix('assets/images/lidl-logo.png') }}" alt="Lidl logo">
                </a>
            </div>
        </div>
    </div>
    <div class="w-full bg-black text-sm text-white">
        <div class="container mx-auto flex min-h-full flex-col p-5 lg:w-4/5 lg:flex-row lg:p-10">
            <div class="flex w-full pb-3 lg:w-2/5">
                <div class="flex w-1/2 flex-col items-center justify-start lg:items-start">
                    <h4 class="mb-4 text-base font-bold text-yellow md:text-[15]">{{ __('txt.footer.util_links') }}</h4>
                    <ul class="lg:text-base">
                        <li>
                            <a href="https://code4.ro/en/donate/">
                                {{ __('txt.footer.donate') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}">
                                {{ __('txt.footer.about_project') }} </a>
                        </li>
                        <li>
                            <a href="{{ route('home') }}">
                                {{ __('txt.footer.source_code') }} </a>
                        </li>
                    </ul>
                </div>
                <div class="flex w-1/2 flex-col items-center justify-start lg:items-start">
                    <h4 class="mb-4 text-base font-bold text-yellow"> {{ __('txt.footer.legal_info') }}</h4>
                    <ul class="lg:text-base">
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
            <div class="flex w-full flex-col items-end justify-center lg:w-3/5">
                <div class="w-20 lg:my-4 lg:w-32">
                    <a href="/">
                        <img src="{{ mix('assets/images/commitglobal_white.png') }}" alt="Logo">
                    </a>
                </div>
                <h4 class="lg:text-base">&#169; 2022 Commit Global</h4>
                <h4 class="lg:text-base"> {{ __('txt.footer.commit_txt') }}</h4>
            </div>
        </div>
    </div>
</footer>
