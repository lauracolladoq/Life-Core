<button {{ $attributes->merge(['type' => 'submit', 'class' => 'shadow-xl py-2.5 px-4 text-sm font-semibold rounded-full text-white bg-blue-500 hover:bg-blue-600 focus:outline-none']) }}>
    {{ $slot }}
</button>
