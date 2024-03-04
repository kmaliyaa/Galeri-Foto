@extends('layout.master')
@section('content')
<section class="max-w-screen-xl mx-auto mt-5 flex flex-col gap-3 justify-center">
    <div class="flex flex-row justify-between p-7 gap-5">
        <div class="flex mx-auto font-semibold text-4xl">
            Edit Profil
        </div>
    </div>  
</section>
{{-- <section class="max-w-screen-md mx-auto ">
    <form action="/updateprofil/{{ $data->id }}" method="POST" enctype="multipart/form-data">
    <div class="flex flex-wrap justify-between flex-container">
        <div class="flex flex-col items-center w-2/6 bg-white rounded-md shadow-md max-[480px]:w-full">
            <img src="/assets/team-2.jpg" alt="" class="rounded-full w-36 h-36">
            <input type="file" class="items-center w-48 h-10 mt-4 border rounded-md">
            <button class="w-48 py-1 mt-4 text-white rounded-md bg-amber-500">Ubah Photo</button>
        </div>
       <div class=" shadow-md max-w-screen-xl w-1/2 mx-auto rounded-xl ">
        <div class="flex flex-col mb-4 mt-3 justify-center">
            <span>Nama Lengkap</span>
            <input class="border border-gray-500 py-3 rounded-2xl px-4" type="text" name="nama_lengkap" >
        </div>
        <div class="flex flex-col mb-4 mt-3 justify-center">
            <span>Username</span>
            <input class="border border-gray-500 py-3 rounded-2xl px-4" type="text" name="username" >
        </div>
        <div class="flex flex-col mb-4 mt-5 ">
            <p>Email</p>
            <input class="border border-gray-500 py-3 rounded-2xl px-4" type="email" name="email">
        </div>
        <div class="flex flex-col mb-2 mt-5">
            <p>Alamat</p>
            <input class="border border-gray-500 py-7 rounded-2xl px-4 " type="text" name="password">
        </div> 
    </div>
</form>
</section> --}}
    <section class="max-w-screen-md mx-auto ">
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
        <form action="/updateprofil" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="flex flex-wrap justify-between flex-container">
            <div class="flex flex-col items-center w-2/6 bg-white rounded-md shadow-md max-[480px]:w-full">
                <img src="{{ asset('fotoprofile/'. auth()->user()->avatar) }}"  alt="" class="rounded-full w-36 h-36" >
                <input type="file"
                name="avatar" id="avatar" class="items-center w-48 h-10 mt-4 border rounded-md">
            </div>
           <div class=" shadow-md max-w-screen-xl w-1/2 mx-auto rounded-xl ">
            <div class="flex flex-col mb-4 mt-3 justify-center">
                <span>Nama Lengkap</span>
                <input class="border border-gray-500 py-3 rounded-2xl px-4" type="text" name="nama_lengkap" value="{{ $data->nama_lengkap }}" >
            </div>
            <div class="flex flex-col mb-4 mt-3 justify-center">
                <span>Username</span>
                <input class="border border-gray-500 py-3 rounded-2xl px-4" type="text" name="username" value="{{ $data->username }}">
            </div>
            <div class="flex flex-col mb-4 mt-5 ">
                <p>Email</p>
                <input class="border border-gray-500 py-3 rounded-2xl px-4" type="email" name="email" value="{{ $data->email }}">
            </div>
            <div class="flex flex-col mb-2 mt-5">
                <p>Alamat</p>
                <input class="border border-gray-500 py-7 rounded-2xl px-4 " type="text" name="alamat" value="{{ $data->alamat }}">
            </div> 
            <div class="flex py-4">
                <button type="submit" class="bg-amber-500 rounded-2xl text-white py-4 w-52 font-fontbold mx-auto">Perbaharui</button>
            </div>
           </div>  
        </div>
    </form>
    </section>
@endsection