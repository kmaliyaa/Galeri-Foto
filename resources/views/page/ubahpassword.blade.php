@extends('layout.master')
@section('content')
<section class="max-w-[500px] mx-auto ">
    <div class="max-[480px]:w-full">
        <form action="/ubahpassword" method="POST">
            @csrf
        <div class="bg-white rounded-md shadow-md ">
            <div class="flex flex-col px-4 py-4 mt-10">
                <h5 class="text-3xl text-center font-fontketiga">Ubah Password</h5>    
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
                <div class="flex flex-col mb-7 mt-5">
                    <p>Password lama</p>
                    <input class="border border-gray-500 rounded-md py-3 px-3" type="password" name="password_lama" placeholder="">
                </div>
                <div class="flex flex-col mb-7">
                    <p>Password baru</p>
                    <input class="border border-gray-500 rounded-md py-3 px-3" type="password" name="password_baru" placeholder="minimal 6 karakter">
                </div>
                <div class="flex flex-col mb-7">
                    <p>Konfirmasi Password</p>
                    <input class="border border-gray-500 rounded-md py-3 px-3" type="password" name="confirm_password" placeholder="">
                </div>
                <button type="submit" class="py-4 mt-4 text-white rounded-md bg-amber-500">Perbaharui</button>
            </div>
        </div>
        </form>
    </div>
</section>
@endsection