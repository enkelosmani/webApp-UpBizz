<!DOCTYPE html>
<html>
<head>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')
</head>
<body class="bg-gray-100">
<div class="flex w-screen h-screen overflow-hidden">
    <aside class="w-64 h-full bg-white shadow-lg overflow-y-auto">
        @include('posts.leftside')
    </aside>

    <div class="flex-1 h-full flex flex-col">
        <a href="{{ route('posts.create') }}" class="w-full bg-gray-100 px-6 py-4 shadow-md block">
            <main class="flex-1 p-8 max-w-3xl mx-auto md:mx-0 md:ml-[22%] lg:ml-[25%] lg:mr-[25%]">
                <div class="bg-gradient-to-r from-black-800 to-gray-900 p-4 rounded-2xl shadow-xl flex items-center cursor-pointer mb-8 transition-all duration-300">
                    <img class="w-12 h-12 rounded-full mr-4 border-2 border-indigo-500 object-cover shadow-md transition-transform duration-300 group-hover:scale-105" src="http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg" alt="User Avatar" />
                    <div class="flex-grow bg-gray-700 text-gray-400 px-5 py-3 rounded-xl text-lg font-medium transition-colors duration-300 group-hover:bg-indigo-800 group-hover:text-gray-200">
                        What's on your mind?
                    </div>
                </div>
            </main>
        </a>

        <main class="flex-1 w-full h-full bg-gray-100 overflow-y-auto flex justify-center items-start">
            <div class="w-full max-w-5xl bg-white rounded-3xl my-6 shadow-2xl transition-shadow duration-300">
                @forelse($posts as $post)
                    <div class="my-8 last:my-0 bg-gray-50 rounded-xl shadow-md p-4"> <!-- Card container with margin, background, and shadow -->
                        <div class="flex items-center justify-between p-8 border-b">
                            <div class="gap-6 flex items-center">
                                <img src="http://lilithaengineering.co.za/wp-content/uploads/2017/08/person-placeholder.jpg" class="object-cover rounded-full w-20 h-20 border-4 border-indigo-300 shadow-md" alt="User avatar" />
                                <div class="flex flex-col">
                                    <b class="mb-2 text-2xl capitalize text-gray-900 font-bold tracking-tight">{{ $post->user->name }}</b>
                                    <time datetime="{{ $post->created_at ? $post->created_at->format('d-m-y') : '' }}" class="text-gray-500 text-lg">
                                        {{ $post->created_at ? $post->created_at->toFormattedDateString() : 'No date available' }}
                                    </time>
                                </div>
                            </div>
                            <div x-data="{ open: false }" class="relative">
                                @if(auth()->id() == $post->user_id)
                                    <button @click="open = !open" class="bg-gray-200 rounded-full h-14 w-14 flex items-center justify-center cursor-pointer hover:bg-gray-300 transition-colors duration-200">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 0 24 24" width="32px" fill="#6b7280">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                        </svg>
                                    </button>
                                    <div x-show="open" @click.outside="open = false" class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-xl shadow-lg z-10 overflow-hidden">
                                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="p-2">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="delete-btn w-full text-left px-4 py-2 text-sm font-medium text-red-600 hover:bg-red-100 rounded-lg" onclick="return confirm('Are you sure you want to delete this post?')">
                                                Delete Post
                                            </button>
                                        </form>
                                    </div>
                                @else
                                    <div class="bg-gray-200 rounded-full h-14 w-14 flex items-center justify-center cursor-not-allowed opacity-50">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="32px" viewBox="0 0 24 24" width="32px" fill="#6b7280">
                                            <path d="M0 0h24v24H0V0z" fill="none" />
                                            <path d="M6 10c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm12 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2zm-6 0c-1.1 0-2 .9-2 2s.9 2 2 2 2-.9 2-2-.9-2-2-2z" />
                                        </svg>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <h3 class="font-bold text-4xl text-gray-900 p-8">{{ $post->title }}</h3>
                        @if($post->content && $post->content->data)
                            <div class="flex justify-center p-8 border-b">
                                <img src="{{ asset('storage/' . $post->content->data) }}" class="rounded-3xl w-full h-[calc(100vh-20rem)] object-cover transition-transform duration-300 hover:scale-[1.02] shadow-lg" alt="Post image">
                            </div>
                        @endif
                    </div>
                    @unless($loop->last)
                        <hr class="my-8 border-gray-200">
                    @endunless
                @empty
                    <div class="p-8 text-center text-gray-500 text-xl bg-gray-50 rounded-xl">
                        No posts available. <a href="{{ route('posts.create') }}" class="text-indigo-600 hover:underline">Create one now!</a>
                    </div>
                @endforelse

                <div class="p-6 flex justify-center">
                    {{ $posts->links() }}
                </div>
            </div>
        </main>
    </div>
</div>
</body>
</html>
