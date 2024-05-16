@if ($errors->any())
    <div {{ $attributes }}>
        @foreach ($errors->all() as $error)
            <p class=" text-red-600">{{ $error }}</p>
        @endforeach
    </div>
@endif