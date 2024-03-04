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
    <!--Link icon bootstrap-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

  </head>

<body class="bg-gray-100">
    <nav>
        <div class="flex justify-center mt-20 ">
            <div class="bg-white shadow-md max-w-screen-xl w-1/3 mx-auto mt-10 p-10 rounded-xl border border-black">
                <div class="font-fontjudul text-5xl text-bold text-center">MG</div>
                @if ($message = Session::get('success') )
                  <div id="alert-1" class="flex items-center p-4 mb-4 text-amber-500 rounded-lg bg-amber-50 dark:bg-gray-800 dark:text-amber-400" role="alert">
                    <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
                    </svg>
                    <span class="sr-only">Info</span>
                    <div class="text-sm font-medium ms-3">
                      {{ $message }}
                    </div>
                      <button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-amber-50 text-amber-500 rounded-lg focus:ring-2 focus:ring-amber-400 p-1.5 hover:bg-amber-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-amber-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-1" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                        </svg>
                    </button>
                  </div>
                @endif
                <form action="/registered" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="flex flex-col mb-4 mt-5 font-fontregular">
                      <div>Nama Lengkap</div>
                      <input class="border border-gray-500 py-3 rounded-2xl px-4" type="text" name="nama_lengkap" value="{{ old('nama_lengkap') }}">
                      @error('nama_lengkap')
                      <div class="italic text-red-800">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="flex flex-col mb-4 mt-5 font-fontregular">
                      <div>Username</div>
                      <input class="border border-gray-500 py-3 rounded-2xl px-4" type="text" name="username" value="{{ old('username') }}">
                      @error('username')
                      <div class="italic text-red-800">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="flex flex-col mb-2 mt-5 font-fontregular">
                      <div>Password</div>
                      <input class="border border-gray-500 py-3 rounded-2xl px-4 " type="password" name="password" value="{{ old('password') }}">
                      @error('password')
                      <div class="italic text-red-800">{{ $message }}</div>
                      @enderror
                  </div>    
                  <div class="flex flex-col mb-4 mt-5 font-fontregular">
                      <div>Email</div>
                      <input class="border border-gray-500 py-3 rounded-2xl px-4" type="email" name="email" placeholder="email@gmail.com" value="{{ old('email') }}">  
                      @error('email')
                      <div class="italic text-red-800">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="flex flex-col mb-4 mt-5 font-fontregular">
                      <div>Alamat</div>
                      <input class="border border-gray-500 py-3 rounded-2xl px-4" type="text" name="alamat" value="{{ old('alamat') }}">
                      @error('alamat')
                      <div class="italic text-red-800">{{ $message }}</div>
                      @enderror
                  </div>
                  <div class="flex flex-col mb-4 mt-5 font-fontregular">
                      <div>Gambar Profil</div>
                      <input class="py-3 px-4 block w-full text-sm  border-gray-500 text-gray-900 border rounded-2xl cursor-pointer"  aria-describedby="user_avatar_help" id="user_avatar" type="file" name="avatar">
                  </div>            
                  <div class="flex flex-col mb-4 mt-5 font-fontregular">
                      <div>Tanggal Lahir</div>
                      <input class="border border-gray-500 py-3 rounded-2xl px-4" type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}">
                  </div>
                
                    <div class="flex flex-col py-2 mb-5 justify-center">
                        <button type="submit" class="bg-amber-500 text-white rounded-full mt-4 px-3 py-4 w-56 font-fontbold mx-auto text-2xl"><b>Daftar Akun</b></button>
                 </form>
                 <div class="flex justify-center">
                  <h5 class="mx-aouto mt-3">Sudah punya akun?<a href="/login" class="text-amber-500"> Login</a></h5>
                 </div>
                    </div>
            </div>
        </div>    
    </nav>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>

</html>