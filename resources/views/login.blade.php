<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/tailwind.css" rel="stylesheet">
    <!--Memasukkan link font-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aclonica&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> 

  </head>

<body class="bg-gray-100">
    <nav>
        <div class="flex justify-center mt-20 ">
            <div class="bg-white shadow-md max-w-screen-md w-1/4 mx-auto mt-10 p-8 rounded-xl border border-gray-700">
                <div class="font-fontjudul text-6xl text-bold text-center ">MG</div>
                
                <form action="/auth" method="POST">
                    @csrf
                    <div class="flex flex-col mb-5 mt-8 font-fontregular">
                        <input class="border border-gray-500 py-3 rounded-2xl px-4" type="text" name="username" placeholder="Username">
                    </div>
                    <div class="flex flex-col mb-4 mt-7 font-fontregular">
                        <input class="border border-gray-500 py-3 rounded-2xl px-4" type="password" name="password" placeholder="Password">
                        <div class="flex flex-col py-2 mb-5 items-center">
                            <button type="submit" class="bg-amber-500 text-white rounded-full px-3 py-4 w-56 mt-7 font-fontkedua mx-auto text-2xl">Login</button>
                        </div>
                    </div>
                </form>                
                    </div>
            </div>
        </div>
    </nav>
</body>
</html>