<x-guest-layout>
    <x-authentication-card>
        <div
            class="grid md:grid-cols-2 items-center gap-4 max-w-6xl w-full p-4 m-4 shadow-[0_2px_10px_-3px_rgba(6,81,237,0.3)] rounded-md">
            <div class="md:max-w-md w-full sm:px-6 py-4">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-12">
                        <h3 class="text-3xl font-extrabold">Sign in to your account</h3>
                        <p class="text-md mt-4 font-semibold">Don't have an account yet? <a href="{{ route('register') }}"
                                class="text-blue-500 font-semibold hover:underline ml-1 whitespace-nowrap">Register
                                here</a></p>
                    </div>
                    <div>
                        <x-label class="text-sm font-semibold block mb-2" for="email" value="{{ __('Email') }}" />
                        <div class="relative flex items-center">
                            <x-input id="email"
                                class="w-full text-sm border-b border-gray-300 focus:border-[#333] px-2 py-3 outline-none"
                                placeholder="Enter email" type="email" name="email" :value="old('email')" required
                                autofocus autocomplete="username" />

                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-[18px] h-[18px] absolute right-2" viewBox="0 0 682.667 682.667">
                                <defs>
                                    <clipPath id="a" clipPathUnits="userSpaceOnUse">
                                        <path d="M0 512h512V0H0Z" data-original="#000000"></path>
                                    </clipPath>
                                </defs>
                                <g clip-path="url(#a)" transform="matrix(1.33 0 0 -1.33 0 682.667)">
                                    <path fill="none" stroke-miterlimit="10" stroke-width="40"
                                        d="M452 444H60c-22.091 0-40-17.909-40-40v-39.446l212.127-157.782c14.17-10.54 33.576-10.54 47.746 0L492 364.554V404c0 22.091-17.909 40-40 40Z"
                                        data-original="#000000"></path>
                                    <path
                                        d="M472 274.9V107.999c0-11.027-8.972-20-20-20H60c-11.028 0-20 8.973-20 20V274.9L0 304.652V107.999c0-33.084 26.916-60 60-60h392c33.084 0 60 26.916 60 60v196.653Z"
                                        data-original="#000000"></path>
                                </g>
                            </svg>
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-label class="text-sm font-semibold block mb-2" for="password" value="{{ __('Password') }}" />
                        <div class="relative flex items-center">
                            <x-input id="password"
                                class="w-full text-sm border-b border-gray-300 focus:border-[#333] px-2 py-3 outline-none"
                                type="password" name="password" required autocomplete="current-password"
                                placeholder="Enter password" />
                            <svg id="togglePassword" xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb"
                                class="w-[18px] h-[18px] absolute right-2 cursor-pointer" viewBox="0 0 128 128">
                                <path
                                    d="M64 104C22.127 104 1.367 67.496.504 65.943a4 4 0 0 1 0-3.887C1.367 60.504 22.127 24 64 24s62.633 36.504 63.496 38.057a4 4 0 0 1 0 3.887C126.633 67.496 105.873 104 64 104zM8.707 63.994C13.465 71.205 32.146 96 64 96c31.955 0 50.553-24.775 55.293-31.994C114.535 56.795 95.854 32 64 32 32.045 32 13.447 56.775 8.707 63.994zM64 88c-13.234 0-24-10.766-24-24s10.766-24 24-24 24 10.766 24 24-10.766 24-24 24zm0-40c-8.822 0-16 7.178-16 16s7.178 16 16 16 16-7.178 16-16-7.178-16-16-16z"
                                    data-original="#000000"></path>
                            </svg>
                        </div>

                    </div>
                    <div class="flex items-center justify-between mt-5">
                        <div class="flex items-center">
                            <label for="remember_me" class="flex items-center text-sm">
                                <x-checkbox id="remember_me" name="remember" />
                                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>
                        <div>
                            @if (Route::has('password.request'))
                                <a class="text-blue-500 font-semibold text-sm hover:underline"
                                    href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                        </div>
                    </div>
                    <div class="mt-8 flex justify-center">
                        <x-button
                            class="w-80 shadow-xl py-2.5 px-4 text-sm font-semibold rounded-full text-white bg-blue-500 hover:bg-blue-600 focus:outline-none">
                            {{ __('Log in') }}
                        </x-button>
                    </div>
                    <x-validation-errors class="text-sm mt-4 text-center" />

                    <p class="my-8 text-sm text-gray-400 text-center">or continue with</p>
                    <div class="space-x-8 flex justify-center">
                        <a href="{{ route('google.redirect') }}" type="button" class="border-none outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30px" class="inline" viewBox="0 0 512 512">
                                <path fill="#fbbd00"
                                    d="M120 256c0-25.367 6.989-49.13 19.131-69.477v-86.308H52.823C18.568 144.703 0 198.922 0 256s18.568 111.297 52.823 155.785h86.308v-86.308C126.989 305.13 120 281.367 120 256z"
                                    data-original="#fbbd00" />
                                <path fill="#0f9d58"
                                    d="m256 392-60 60 60 60c57.079 0 111.297-18.568 155.785-52.823v-86.216h-86.216C305.044 385.147 281.181 392 256 392z"
                                    data-original="#0f9d58" />
                                <path fill="#31aa52"
                                    d="m139.131 325.477-86.308 86.308a260.085 260.085 0 0 0 22.158 25.235C123.333 485.371 187.62 512 256 512V392c-49.624 0-93.117-26.72-116.869-66.523z"
                                    data-original="#31aa52" />
                                <path fill="#3c79e6"
                                    d="M512 256a258.24 258.24 0 0 0-4.192-46.377l-2.251-12.299H256v120h121.452a135.385 135.385 0 0 1-51.884 55.638l86.216 86.216a260.085 260.085 0 0 0 25.235-22.158C485.371 388.667 512 324.38 512 256z"
                                    data-original="#3c79e6" />
                                <path fill="#cf2d48"
                                    d="m352.167 159.833 10.606 10.606 84.853-84.852-10.606-10.606C388.668 26.629 324.381 0 256 0l-60 60 60 60c36.326 0 70.479 14.146 96.167 39.833z"
                                    data-original="#cf2d48" />
                                <path fill="#eb4132"
                                    d="M256 120V0C187.62 0 123.333 26.629 74.98 74.98a259.849 259.849 0 0 0-22.158 25.235l86.308 86.308C162.883 146.72 206.376 120 256 120z"
                                    data-original="#eb4132" />
                            </svg>
                        </a>
                        <a href="{{ route('github.redirect') }}" type="button" class="border-none outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg"  viewBox="3 3 24 24" width="30px">    <path d="M15,3C8.373,3,3,8.373,3,15c0,5.623,3.872,10.328,9.092,11.63C12.036,26.468,12,26.28,12,26.047v-2.051 c-0.487,0-1.303,0-1.508,0c-0.821,0-1.551-0.353-1.905-1.009c-0.393-0.729-0.461-1.844-1.435-2.526 c-0.289-0.227-0.069-0.486,0.264-0.451c0.615,0.174,1.125,0.596,1.605,1.222c0.478,0.627,0.703,0.769,1.596,0.769 c0.433,0,1.081-0.025,1.691-0.121c0.328-0.833,0.895-1.6,1.588-1.962c-3.996-0.411-5.903-2.399-5.903-5.098 c0-1.162,0.495-2.286,1.336-3.233C9.053,10.647,8.706,8.73,9.435,8c1.798,0,2.885,1.166,3.146,1.481C13.477,9.174,14.461,9,15.495,9 c1.036,0,2.024,0.174,2.922,0.483C18.675,9.17,19.763,8,21.565,8c0.732,0.731,0.381,2.656,0.102,3.594 c0.836,0.945,1.328,2.066,1.328,3.226c0,2.697-1.904,4.684-5.894,5.097C18.199,20.49,19,22.1,19,23.313v2.734 c0,0.104-0.023,0.179-0.035,0.268C23.641,24.676,27,20.236,27,15C27,8.373,21.627,3,15,3z"/></svg>
                        </a>
                        <button type="button" class="border-none outline-none">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30px" fill="#007bff"
                                viewBox="0 0 167.657 167.657">
                                <path
                                    d="M83.829.349C37.532.349 0 37.881 0 84.178c0 41.523 30.222 75.911 69.848 82.57v-65.081H49.626v-23.42h20.222V60.978c0-20.037 12.238-30.956 30.115-30.956 8.562 0 15.92.638 18.056.919v20.944l-12.399.006c-9.72 0-11.594 4.618-11.594 11.397v14.947h23.193l-3.025 23.42H94.026v65.653c41.476-5.048 73.631-40.312 73.631-83.154 0-46.273-37.532-83.805-83.828-83.805z"
                                    data-original="#010002"></path>
                            </svg>
                        </button>
                    </div>
                </form>
            </div>
            <div class="md:h-full max-md:mt-10 rounded-xl p-2 content-center">
                <img src="{{ Storage::url('assets/poster.png') }}" class="object-contain rounded-sm hidden md:block"
                    alt="login-image" />
                <div class="flex justify-between p-2">
                    <a href="" class="text-sm text-gray-400 text-center hover:underline">Term & Conditions</a>
                    <p class="text-sm text-gray-400 text-center">© 2024 Life Core</p>
                    <a href="" class="text-sm text-gray-400 text-center  hover:underline">Contact</a>
                </div>
            </div>
        </div>
    </x-authentication-card>
</x-guest-layout>
