<x-app-layout>
    <x-slot name="header">
            <div class="relative h-32">
                <div class="absolute inset-x-0 top-0 h-32">
                    <img class="w-full h-full object-cover" src="{{ asset('images/header-article.jpg') }}" alt="header for article pages">
                   <!-- <div class="backdrop-filter backdrop-blur-xs absolute inset-0 bg-gray-400 bg-opacity-50 mix-blend-multiply" aria-hidden="true"></div>-->
                </div>
                <div class="text-center relative max-w-7xl ml-2 lg:ml-40 xl:ml-72">
                    <h2 class="text-yellow-700 max-w-3xl text-center transform translate-y-10 text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                        {{ __('Article') }}
                    </h2>
                </div>
            </div>
    </x-slot>
    <main>
        <div class="grid grid-cols-1 md:grid-cols-12">
            <div class="col-span-4 sm:col-span-3 md:col-span-4 lg:col-span-3">
                <div class="mt-4 mx-auto bg-white border-4 border-gray-dark rounded-full w-1/5">
                    <img class="rounded-full object-cover min-w-full min-h-full h-ful" src="{{ asset($author->picture) }}" alt="picture of the user"/>
                </div>
                <div class="text-center grid grid-cols-1">
                    <a href="{{ route('profile', $author->id) }}" class="text-2xl text-gray-darker font-extrabold">{{ $author->firstname }}</a>
                    <p class="text-lg text-first font-bold">{{ $author->role }}</p>
                    @auth
                        @if(auth()->user()->id === $author->id)
                            <div class="grid grid-cols-1 place-items-center">
                                <a href="{{ route('edit_article', $article->id) }}" class="flex-shrink-0 w-36 mx-28 mt-6 mb-3 md:mx-8 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider bg-last border-2 text-white border-last rounded-lg focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                    Edit article
                                </a>
                            </div>
                        @endif
                        @if(auth()->user()->id !== $author->id)
                            @if(is_null($liked))
                                <form action="{{ route('like_article', $article->id) }}" method="POST">
                                @csrf
                                @method('POST')  
                                    <div class="flex justify-center space-x-3">
                                        <button type="submit">
                                            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z">
                                                </path>
                                            </svg>
                                        </button>
                                        <p class="mt-2">{{ $nbLikes }} like(s) for this article</p>
                                    </div>
                                </form>
                            @else
                                <form action="{{ route('dislike_article', $liked->id) }}" method="POST">
                                @csrf
                                @method('POST')
                                    <button type="submit">
                                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd">
                                            </path>
                                        </svg>
                                        <p>{{ $nbLikes }}</p>
                                    </button>
                                </form>
                            @endif
                        @endif
                    @endauth
                </div>
            </div>
            <div class="col-span-8 sm:col-span-9 md:col-span-8 lg:col-span-9">
                <div class="mt-6 grid grid-cols-1 place-items-center text-gray-darker font-extrabold">
                    <p class="text-3xl">{{ $article->title }}</p>
                    <p class="text-2xl mt-6">{{ $article->subtitle }}</p>
                    <div class="grid grid-cols-3">
                        @foreach ($categories as $categorie)
                            <div class="text-first font-bold">{{ $categorie->name }}</div>
                        @endforeach
                    </div>
                </div>
                <div class="mt-6 grid grid-cols-1 place-items-center">
                    <p class="text-gray-darker font-extrabold text-center mb-5">{{ __('Why do the locals love this place? What do you like about it?') }}</p>
                    <p class="text-gray-dark font-semibold w-2/3 leading-relaxed">{{ $article->description }}</p>
                </div>
                <div class="mt-6">
                 <p class="mt-5 text-gray-darker ml-28 lg:ml-52">Posted on {{ Carbon\Carbon::parse($article->created_at)->format('d/m/Y') }}</p>
                </div>
                <div class="flex flex-row justify-evenly pt-10">
                    @foreach ($pictures as $picture)
                       <img class="w-44 h-44" src="{{ asset($picture->path) }}" alt="pictures of the article"/>
                    @endforeach
                </div>
                <div class="mx-20 mt-10">
                    <p class="text-xl font-bold text-last">Additional informations</p>
                    <div class="flex space-x-5 mt-5">
                        <img class="w-6 h-6" src="{{ asset('images/location.png') }}" alt="address icon"/>
                        <span>{{ $article->address }}</span>
                    </div>
                    @if (!is_null($article->phone_place))
                        <div class="flex space-x-5 mt-5">
                            <img class="w-6 h-6" src="{{ asset('images/call.png') }}" alt="phone icon"/>
                            <span>{{ $article->phone_place }}</span>
                        </div>
                    @endif
                    @if (!is_null($article->website_place))
                        <div class="flex space-x-5 mt-5">
                            <img class="w-6 h-6" src="{{ asset('images/website.png') }}" alt="website icon"/>
                            <span>{{ $article->website_place }}</span>
                        </div>
                    @endif
                </div>
                    <!-- Leave a comment : view + input (textarea + btn sendComment) mettre un btn voir plus ou un scroll sur la div-->
                    @auth
                        @if(auth()->user()->id !== $author->id)
                            <div class="overflow-x-hidden">
                                <p class="text-gray-dark font-bold text-2xl mt-14 ml-7 md:ml-0">Leave a comment</p>
                                <form class="grid grid-cols-1 justify-items-center" action="{{ route('comment_article', $article->id) }}" method="POST">
                                    @csrf
                                    @method('POST') 
                                    <div class="grid mx-3 md:mx-0">
                                        <textarea name="comment" id="comment" cols="70" rows="6" class="lg:text-base text-gray-dark rounded-lg mt-3">
                                            Here your comment...
                                        </textarea>
                                    </div>
                                    <button type="submit" value="submit" class="grid grid-cols-1 mt-6 px-7 py-2 text-xl lg:text-base align-middle font-semibold tracking-wider border-2 text-white border-last bg-last rounded-full focus:ring-2 focus:ring-sun cursor-pointer hover:shadow-lg hover:text-sun">
                                        Send
                                    </button>
                                </form>
                            </div>
                            <hr class="border border-gray-dark mt-7">
                        @endif
                    @endauth
                    <p class="text-gray-dark font-bold text-2xl my-7 ml-7 md:ml-0"> {{ $nbComments }} Comments</p>
                    @foreach($comments as $comment)
                        <div class="mb-5 border border-gray-dark rounded-md bg-gray-200 md:w-4/5 md:mx-24 py-6 px-6 grid grid-cols-1 mx-3">
                            <div>
                                <div class="grid">
                                    <img class="w-10 h-10 object-cover" src="{{ asset($comment->picture) }}" alt="the photo of the comment's author">
                                </div>
                                <a href="{{ route('profile', $comment->id) }}" class="text-last font-bold text-lg">{{ $comment->firstname }}</a> 
                                <p>{{ $comment->comment }}</p>
                                <p class="text-first font-bold text-right">{{ Carbon\Carbon::parse($comment->created_at)->format('d/m/Y h:i:s') }}</p>
                            </div>
                        </div>
                    @endforeach
            </div>
        </div>
    </main>
</x-app-layout>