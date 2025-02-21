<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Laravel Blog</title>
   @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
   <nav class="bg-white shadow mb-8">
       <div class="container mx-auto px-4">
           <div class="flex justify-between h-16">
               <div class="flex items-center">
                   <a href="{{ route('posts.index') }}" class="text-lg font-semibold">
                       Laravel Blog
                   </a>
               </div>
           </div>
       </div>
   </nav>

   <main class="container mx-auto px-4">
       @yield('content')
   </main>
</body>
</html>
