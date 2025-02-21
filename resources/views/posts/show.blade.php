@extends('layouts.app')

@section('content')
   <div class="mb-6 flex justify-between items-center">
       <h1 class="text-3xl font-semibold">{{ $post->title }}</h1>
       <div class="flex space-x-4">
           <a href="{{ route('posts.edit', $post) }}"
              class="bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
               Edit Post
           </a>
           <form action="{{ route('posts.destroy', $post) }}" method="POST"
                 onsubmit="return confirm('Are you sure you want to delete this post?');"
                 class="inline">
               @csrf
               @method('DELETE')
               <button type="submit"
                       class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                   Delete Post
               </button>
           </form>
           <a href="{{ route('posts.index') }}"
              class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
               Back to Posts
           </a>
       </div>
   </div>

   @if(session('success'))
       <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
           {{ session('success') }}
       </div>
   @endif

   <div class="bg-white shadow rounded-lg p-6">
       <div class="prose max-w-none">
           {{ $post->content }}
       </div>

       <div class="mt-6 text-sm text-gray-500">
           Posted {{ $post->created_at->diffForHumans() }}
           @if($post->updated_at != $post->created_at)
               • Updated {{ $post->updated_at->diffForHumans() }}
           @endif
       </div>
   </div>
@endsection
