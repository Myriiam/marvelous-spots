<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Marvelous Spots</title>
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">
    <!-- CDN -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <!-- Scripts -->
    <script src="{{ asset('js/app.min.js') }}"></script>
</head>
<body>
    @include('partials.admin-sidebar')
    <!-- list of request by users (who want to become a guide) -->
    <!-- component -->
                <div class="overflow-y-auto">
                    <h2 class="font-bold text-center text-first text-lg pb-5 uppercase pt-3">List of articles that still need to be reviewed</h2>
                    <table class="border-collapse w-full">
                        <thead>
                            <tr>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Article_id</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">User_id</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Author</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">City</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Title</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Date of submission</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($newArticles as $newArticle)
                                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Article_id</span>
                                        {{ $newArticle->id }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">User_id</span>
                                        {{ $newArticle->user_id }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Author</span>
                                        {{ $newArticle->firstname }} {{ $newArticle->lastname }} 
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">City</span>
                                        {{ $newArticle->city }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Title</span>
                                        {{ $newArticle->title }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Date of submission</span>
                                        {{ Carbon\Carbon::parse($newArticle->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                        <span class="py-1 px-3 text-xm font-bold text-last"> {{ $newArticle->status }}</span>
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                        <div class="flex justify-center space-x-2">
                                            <a href="{{ route('show_article', $newArticle->id) }}" class="rounded bg-blue-500 py-1 px-3 text-xs font-bold text-white">Show</a>
                                            <div>
                                                <form method="POST" action="{{ route('article_approved', $newArticle->id) }}">
                                                    @csrf
                                                    <button class="rounded bg-green-600 py-1 px-3 text-xs font-bold text-white">Accept</button>
                                                </form>
                                            </div>
                                            <div>
                                                <form method="POST" action="{{ route('article_rejected', $newArticle->id) }}">
                                                    @csrf
                                                    <button class="rounded bg-red-400 py-1 px-3 text-xs font-bold text-white">Refuse</button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-5 flex flex-wrap justify-center pt-3 pb-5">
                    {{ $newArticles->withQueryString()->links()}}
                    </div>
                    <h2 class="font-bold text-center text-first text-lg pb-5 uppercase pt-4">List of unpublished articles</h2>
                    <table class="border-collapse w-full">
                        <thead>
                            <tr>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Article_id</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">User_id</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Author</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">City</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Title</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Date of submission</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($unpublishedArticles as $unpublishedArticle)
                                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Article_id</span>
                                        {{ $unpublishedArticle->id }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">User_id</span>
                                        {{ $unpublishedArticle->user_id }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Author</span>
                                        {{ $unpublishedArticle->firstname }} {{ $unpublishedArticle->lastname }} 
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">City</span>
                                        {{ $unpublishedArticle->city }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Title</span>
                                        {{ $unpublishedArticle->title }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Date of submission</span>
                                        {{ Carbon\Carbon::parse($unpublishedArticle->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                        <span class="py-1 px-3 text-xm font-bold text-last"> {{ $unpublishedArticle->status }}</span>
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                        <div>
                                            <a href="{{ route('show_article', $unpublishedArticle->id) }}" class="rounded bg-blue-500 py-1 px-3 text-xs font-bold text-white">Show</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-5 flex flex-wrap justify-center py-3">
                    {{ $unpublishedArticles->withQueryString()->links()}}
                    </div>
                    <h2 class="font-bold text-center text-first text-lg pb-5 uppercase pt-4">List of published articles</h2>
                    <table class="border-collapse w-full">
                        <thead>
                            <tr>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Article_id</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">User_id</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Author</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">City</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Title</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Date of submission</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Status</th>
                                <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($publishedArticles as $publishedArticle)
                                <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Article_id</span>
                                        {{ $publishedArticle->id }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">User_id</span>
                                        {{ $publishedArticle->user_id }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Author</span>
                                        {{ $publishedArticle->firstname }} {{ $publishedArticle->lastname }} 
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">City</span>
                                        {{ $publishedArticle->city }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Title</span>
                                        {{ $publishedArticle->title }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Date of submission</span>
                                        {{ Carbon\Carbon::parse($publishedArticle->created_at)->format('d/m/Y') }}
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Status</span>
                                        <span class="py-1 px-3 text-xm font-bold text-last"> {{ $publishedArticle->status }}</span>
                                    </td>
                                    <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                                        <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Actions</span>
                                        <div>
                                            <a href="{{ route('show_article', $publishedArticle->id) }}" class="rounded bg-blue-500 py-1 px-3 text-xs font-bold text-white">Show</a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="px-5 flex flex-wrap justify-center py-3">
                    {{ $publishedArticles->withQueryString()->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>