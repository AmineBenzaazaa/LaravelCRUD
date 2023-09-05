@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-4 flex justify-center">
        <div class="w-6/12 bg-white p-6 rounded-lg">
            <h2 class="text-2xl font-bold leading-7 text-gray-900 sm:truncate sm:text-3xl sm:tracking-tight">Posts</h2>
            <p class="text-xl mt-4 text-gray-400">
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
                        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded font-medium">Post</button>
                    </div>
                </form>
            @endauth
        </div>
    </div>
@endsection