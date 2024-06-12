@php
    $user = filament()->auth()->user();
@endphp

<x-filament-widgets::widget class="fi-account-widget">
    <x-filament::section>
        <div class="flex items-center gap-x-3">
            <x-filament-panels::avatar.user size="lg" :user="$user" />

            <div class="flex-1">
                <h2
                    class="grid flex-1 text-base font-semibold leading-6 text-gray-950 dark:text-white"
                >
                    {{ __('filament-panels::widgets/account-widget.welcome', ['app' => config('app.name')]) }}
                </h2>

                <p class="text-sm text-gray-500 dark:text-gray-400">
                    {{ filament()->getUserName($user) }}
                </p>
            </div>

            <form
            id="logout-form"
            action="{{ route('logout') }}"
            method="post"
            class="my-auto"
        >
            @csrf
        
            <x-filament::button
                color="gray"
                icon="heroicon-m-arrow-left-on-rectangle"
                icon-alias="panels::widgets.account.logout-button"
                labeled-from="sm"
                tag="button"
                type="button"
                onclick="logoutAndRedirect()"
            >
            </x-filament::button>
        </form>        
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
<script>
    function logoutAndRedirect() {
        const form = document.getElementById('logout-form');
        const logoutForm = document.createElement('form');
        logoutForm.method = 'POST';
        logoutForm.action = form.action;
        
        const csrfToken = document.querySelector('input[name="_token"]').value;
        
        const csrfInput = document.createElement('input');
        csrfInput.type = 'hidden';
        csrfInput.name = '_token';
        csrfInput.value = csrfToken;
        
        logoutForm.appendChild(csrfInput);
        document.body.appendChild(logoutForm);
        
        logoutForm.submit();
        
        window.location.href = '{{ route('home') }}';
    }
</script>