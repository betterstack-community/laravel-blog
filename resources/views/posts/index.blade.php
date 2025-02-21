@extends('layouts.app')

@section('content')
   <div class="flex justify-between items-center mb-6">
       <h1 class="text-3xl font-semibold">Posts</h1>
       <a href="{{ route('posts.create') }}"
          class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
           Create Post
       </a>
   </div>

   @if(session('success'))
       <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
           {{ session('success') }}
       </div>
   @endif

   <div class="grid gap-6">
       @foreach($posts as $post)
           <div class="bg-white shadow rounded-lg p-6">
               <div class="flex justify-between items-start">
                   <h2 class="text-xl font-semibold mb-2">
                       <a href="{{ route('posts.show', $post) }}" class="hover:text-blue-500">
                           {{ $post->title }}
                       </a>
                   </h2>
                   <div class="flex space-x-2">
                       <a href="{{ route('posts.edit', $post) }}"
                          class="text-yellow-600 hover:text-yellow-800">
                           Edit
                       </a>
                       <form action="{{ route('posts.destroy', $post) }}" method="POST"
                             onsubmit="return confirm('Are you sure you want to delete this post?');"
                             class="inline">
                           @csrf
                           @method('DELETE')
                           <button type="submit"
                                   class="text-red-600 hover:text-red-800">
                               Delete
                           </button>
                       </form>
                   </div>
               </div>
               <p class="text-gray-600">
                   {{ Str::limit($post->content, 200) }}
               </p>
               <div class="mt-4 text-sm text-gray-500">
                   Posted {{ $post->created_at->diffForHumans() }}
                   @if($post->updated_at != $post->created_at)
                       • Updated {{ $post->updated_at->diffForHumans() }}
                   @endif
               </div>
           </div>
       @endforeach
   </div>
@endsection
