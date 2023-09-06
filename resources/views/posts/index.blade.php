@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Posts</h2>
            <p class="text-xl mt-4 text-gray-600">
                enjoy new posts
            </p>
            @auth
                <form action="{{ route('posts') }}" method="post" class="py-4">
                    @csrf
                    <div class="mb-4">
                        <label for="body" class="sr-only">Body</label>
                        <textarea name="body" id="body" cols="30" rows="4" class="bg-gray-100 border-2 w-full p-4 rounded-lg @error('body') border-red-500 @enderror" placeholder="Post something!"></textarea>

                        @error('body')
                            <div class="text-red-500 mt-2 text-sm">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <button type="submit" class="bg-gray-900 text-white px-4 py-2 rounded font-medium">Post</button>
                    </div>
                </form>
            @endauth
            
            @if ($posts->count())
                @foreach ($posts as $post)
                    <div class="border border-gray-300 p-4 mb-4 rounded-lg">
                        <p class="text-gray-500">
                            <span class="font-semibold text-gray-900"> 
                                Posted 
                            </span> by 
                            <span class="font-semibold text-gray-900"> 
                                {{ ucfirst($post->user->name) }} 
                            </span> on 
                            <span class="font-semibold text-gray-900"> 
                                {{ $post->created_at->format('Y-m-d') }}
                            </span>
                        </p>
                        <p class="mt-2">{{ $post->body }}</p>
                        @if ($posts->count())
                        <form action="{{ route('posts.likes',$post->id) }}"method="post" class="py-2">
                            @csrf
                            <button class="text-red-500" wire:click="unlike">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                </svg>
                            </button>
                        </form>
                        <!-- @else -->
                        <form action="" method="post" class="py-2">
                            @csrf
                            <button class="text-gray-500" wire:click="like">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                                    <path d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z" />
                                </svg>
                            </button>
                        </form>
                        <span>{{ $post}}</span>
                        <!-- @endif -->
                    </div>
                @endforeach
            @else
                <p class="text-center">There are no posts</p>
            @endif
        </div>
        
    </div>
@endsection