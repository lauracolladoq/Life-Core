<div>

    <div class="main-middle">
        <!-- ------------------------------------------- Inicio Feed ------------------------------------------- -->
        <!-- Si los usuarios a los que sigues han subido posts, se muestran -->
        @if ($posts->count())
            <div class="feeds">
                @foreach ($posts as $post)
                    <div class="feed">
                        <div class="feed-top">
                            <div class="user">
                                <div class="profile-picture">
                                    <img src="{{ Storage::url('users-avatar/' . $post->user->avatar) }}" alt="" />
                                </div>
                                <div class="info">
                                    <h4 class="font-extrabold text-[16px]"><span>@</span>{{ $post->user->username }}</h4>
                                    <div class="time text-gray">
                                        <small>{{ $post->created_at->format('d/m/Y h:i:s') }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="feed-img">
                            <img src="{{ Storage::url($post->image) }}" alt="" />
                        </div>
                        <div class="action-button">
                            <button wire:click="like({{ $post->id }})">
                                <i @class([
                                    'fa-regular fa-heart',
                                    'fa-solid fa-heart liked' => in_array(
                                        $post->id,
                                        $myLikes->pluck('id')->toArray()),
                                ])></i>
                            </button>
                            <button id="toggleComments-{{ $post->id }}">
                                <i class="fa-regular fa-comment-dots"></i>
                            </button>
                            <span><i class="fa-solid fa-link"></i></span>
                        </div>

                        <!-- Si no tiene likes, aparece 0 Likes -->
                        @if ($post->usersLikes->count() == 0)
                            <p>0 Likes</p>
                            <!-- Si solo tiene un like, aparece que es likeado por esa persona y solo aparece su foto -->
                        @elseif ($post->usersLikes->count() == 1)
                            <div class="liked-by">
                                <span><img
                                        src="{{ Storage::url('users-avatar/' . $post->usersLikes()->inRandomOrder()->value('avatar')) }}"
                                        alt="" /></span>
                                <p>Liked By <b>{{ $post->usersLikes()->inRandomOrder()->value('name') }}</b></p>
                            </div>
                        @else
                            <!-- Si tiene más de un like, aparece que es likeado por dos personas aleatorias y cuantas personas más le han dado like -->
                            <div class="liked-by">
                                <span><img
                                        src="{{ Storage::url('users-avatar/' . $post->usersLikes()->inRandomOrder()->value('avatar')) }}"
                                        alt="" /></span>
                                <span><img
                                        src="{{ Storage::url('users-avatar/' . $post->usersLikes()->inRandomOrder()->value('avatar')) }}"
                                        alt="" /></span>
                                <p>Liked By <b>{{ $post->usersLikes()->inRandomOrder()->value('name') }}</b> and
                                    <b>{{ $post->usersLikes->count() - 1 }}</b> others
                                </p>
                            </div>
                        @endif

                        <div class="caption">
                            <p>
                                <span class="pr-1 font-bold">{{ $post->user->name }}</span>{{ $post->content }}
                            </p>
                            <div class="tags pt-2 flex flex-wrap gap-2">
                                @foreach ($post->tags as $tag)
                                    <span
                                        class="px-1 py-0.5 bg-[{{ $tag->color }}] rounded-full mr-1">{{ $tag->name }}</span>
                                @endforeach
                            </div>
                        </div>
                        <div id="comments-{{ $post->id }}" class="comments" style="display: none;">
                            <!-- Si tiene comentarios, se muestran -->
                            @if (count($post->comments))
                                @foreach ($post->comments as $comment)
                                    <div class="comment">
                                        <div class="profile-picture">
                                            <img src="{{ Storage::url('users-avatar/' . $comment->user->avatar) }}"
                                                alt="" />
                                        </div>
                                        <div class="comment-body">
                                            <p class="font-extrabold">{{ $comment->user->username }}</p>
                                            <p>
                                                {{ $comment->content }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                                <!-- Si no tiene comentarios, aparece un mensaje -->
                            @else
                                <p>No comments yet</p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- ------------------------------------------- Fin Feed  ------------------------------------------- -->
        <!-- Si no hay posts, aparece un mensaje -->
        @else
            <div class="no-posts text-center">
                <h2 class="text-2xl font-extrabold">No posts yet</h2>
                <p class="text-gray">When someone posts something, you'll see it here.</p>
            </div>
        @endif
    </div>

</div>
