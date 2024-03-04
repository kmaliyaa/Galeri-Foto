@extends('layout.master')
@section('content')
<section class="flex flex-col mb-4 mt-15 mx-auto max-w-screen-xl">
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
  <form action="/updatedeskripsi/{{ $foto->id }}" method="post">
    @csrf
    <div class="flex flex-col flex-justify-center">
        <div class="flex flex-row gap-7 mt-10">
        
        <div class="p-7 w-[700px] h-[600px] mt-3">
           <img src="" alt="" id="fotodetail">
        </div>
        <div class="w-full p-5">
            <div class="flex flex-col mb-7 mt-3 ">
                <p>Judul</p>
                <input class="border border-gray-500 rounded-2xl py-4 px-4" type="text" name="judul_foto" placeholder="" value="{{ $foto->judul_foto }}">
            </div>
            <div class="flex flex-col mb-7 mt-5">
                <p>Deskripsi</p>
                <input class="border border-gray-500 rounded-2xl py-16 px-9 mb-5" type="text" name="deskripsi" placeholder="" value="{{ $foto->deskripsi }}">
            </div>
            <div class="flex flex-row justify-between mb-10">
                <div class="flex flex-row py-2">
                    <button type="submit" class="bg-amber-500 text-white rounded-full px-3 py-4 w-56 font-fontbold mx-auto"><b>Simpan</b></button>
                </div>
            </div>             
        </div>
       </div>
    </div>
</form>
</section>
@endsection
@push('footerjsexternal')
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="/javascript/exploredetail.js"></script>
@endpush