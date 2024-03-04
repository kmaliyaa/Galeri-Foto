@extends('layout.master')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
@endpush
@section('content')
<section class="mt-10">
    @csrf
    <div class="max-w-screen-md mx-auto">
        <div class="flex flex-wrap px-2 flex-container">
            <div class="w-3/5 max-[480px]:w-full">
                
                <div class="flex flex-col px-2">
                    <div class="font-fontbold text-3xl">
                        <b id="judulfoto">BURGER</b>
                    </div>
                </div>
                <div class="flex justify-center overflow-hidden px-2 mt-2">
                    <img id="fotodetail" src="" alt="Foto Detail">

                </div>
                {{-- <div class="mt-2 p-2">
                    <span class="bi bi-heart"></span>                       
                    <small id="like_count"></small>
                    <span class="bi bi-chat-dots " ></span>
                    <small id="komentar_count"></small>
                </div> --}}
                <div class="px-2 mt-2">
                    <p id="deskripsi">Burger adalah makanan yang berupa roti dan berbentuk bundar, diiris menjadi dua, dan ditengahnya berisi patty yang biasanya diambil dari daging, kemudian ditambahkan dengan sayur-sayuran seperti selada, tomat dan bawang bombay.</p>
                </div>
            </div>

            <div class="w-2/5  max-[480px]:w-full">
                <div class="flex flex-wrap items-center justify-between ">
                    <div class="flex flex-row justify-between gap-2">
                        <div>
                            <img src="/fotoprofile/{{ $foto->user->avatar }}" class=" border rounded-full h-10 w-15" alt="">
                        </div>
                        <div class="mt-2">
                            <b id="username"> Kennyjenner_</b>
                        </div>
                    </div>
                    <div class="flex flex-wrap ms-[30px] relative">
                            @if($foto->user_id == Auth::user()->id)
                            <button id="dropdownMenuIconHorizontalButton" data-dropdown-toggle="dropdownDotsHorizontal" class="inline-flex items-center p-2 text-sm font-semibold text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button"> 
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 16 3">
                                  <path d="M2 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm6.041 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM14 0a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Z"/>
                                </svg>
                              </button>
                              
                              <!-- Dropdown menu -->
                             
                              <div id="dropdownDotsHorizontal" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                                <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownInformationButton">
                                    <li>
                                        <a href="/editfoto/{{ $foto->id }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><span class="bi bi-pencil-square ">  Edit</span></a>
                                    </li>
                                    <li>
                                        <a href="/hapusfoto/{{ $foto->id }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><span class="bi bi-trash-fill">  Hapus</span></a>
                                    </li>
                                </ul>  
                             </div>
                             @endif
                            </div>
                        </div>
                
                <div class="mt-5 text-2xl">
                    <h5 class=""><b>Komentar</b></h5> 
                </div>
                <div class="relative flex flex-col h-[200px] overflow-y-scroll" id="listkomentar">
                    
                 </div>
            <div class="flex gap-3">
                <div class="flex flex-col mb-4 mt-5 font-fontregular">
                    <input type="text" name="textkomentar" id="" class="border border-gray-500 py-3 rounded-full px-5" type="text" name="komentar" placeholder="Tambahkan Komentar">  
                </div>
                <div class="flex flex-row mb-4 mt-5">
                    <button class="bg-amber-500 text-white rounded-full px-7 py-2 font-fontbold mx-auto" onclick="kirimkomentar()"><span class="text-2xl bi bi-send-fill"></span></button>
                </div>
                </div>
                </div>
            </div>
</section>  
@endsection
@push('footerjsexternal')
    <script src="/javascript/exploredetail.js"></script>
@endpush