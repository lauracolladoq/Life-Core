<div class="trending">
    <div class="flex items-center justify-center pb-3 gap-2 menu-item">
        <span><img src="https://cdn.hugeicons.com/icons/fire-stroke-rounded.svg" alt="fire" width="48"
                height="48" class="m-0" /></span>
        <h3 class="font-extrabold">Trending</h4>
    </div>
    <div>
        <div class="flex flex-col gap-2 text-center items-center">
            @foreach ($tags as $tag)
                <a href="{{ route('trending-tag', $tag->id) }}" class="bg-[{{ $tag->color }}] text-black rounded-full px-1 py-0.5">{{ $tag->name }}</a>
            @endforeach
        </div>
    </div>
</div>
