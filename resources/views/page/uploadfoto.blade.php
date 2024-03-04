@extends('layout.master')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('content')
<section class="mt-32">
    <div class="items-center max-w-screen-md mx-auto ">
        <h3 class="text-5xl text-center font-ketiga">Upload Foto</h3>
    </div>
</section>
<section class="mt-10">
    <div class="max-w-screen-md mx-auto">
        <form action="/savefoto" method="POST" enctype="multipart/form-data" >
            @csrf
        <div class="flex flex-wrap px-2 flex-container justify-center">
            <div class="flex gap-7">
                <div class="flex flex-row gap-7">
                    <div class=" w-[616px] h-[496px] ">
                        <div class="flex flex-col mb-2 mt-0  ">
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
                            <p>Judul</p>
                                <input class="border border-gray-500 py-3 px-4 mb-5 rounded-2xl" type="text" name="judul_foto"
                                    placeholder="Judul">
                            </div>
                        <div class="flex flex-col mb-2">
                        <p>Deskripsi</p>
                            <textarea class="border border-gray-500 py-16 px-4 mb-5 rounded-2xl" type="text"
                                name="deskripsi" placeholder="Deskripsi"></textarea>
                        </div>
                        <div class="flex flex-col mb-2">
                        <p>Foto</p>
                        <input class="py-3 px-4 block w-full text-sm  border-gray-500 text-gray-900 border rounded-2xl cursor-pointer"  
                                id="" type="file" name="lokasi_file">
                        </div>
                        <div class="flex flex-col mt-5 mb-2">
                            <p>Pilih Album</p>
                            <select class=" block p-3 w-full text-sm text-gray-900 rounded-2xl border border-gray-500 focus:ring-amber-500 dark:focus:border-amber-500" name="nama_album" id="" >
                                @foreach ($tampilalbum as $upload)
                                <option value="{{ $upload->id }}">{{ $upload->nama_album }}</option>
                                @endforeach
                            </select>
                        </div>                
                        <div class="flex flex-row justify-center mt-10">
                            <div class="flex flex-row py-2">
                                <button type="submit"
                                    class="bg-amber-500 text-white rounded-full px-3 py-4 w-56 font-fontbold mx-auto">Upload</button>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>     
        </div>
        </form>
    </div>
</section>

@endsection
@push('footerjsexternal')
    <script src="/javascript/explore.js"></script>
@endpush
