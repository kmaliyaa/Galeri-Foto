@extends('layout.master')
@section('content')
<section class="max-w-screen-xl mx-auto mt-5 flex flex-col gap-3 justify-center">
    <div class="flex flex-col items-center pb-10 overflow-hidden">
        <img class="w-[200px] h-[200px] mt-5 mb-3 rounded-full" src="{{ asset('fotoprofile/'.$data->avatar)}}"  alt="">
        <h5 class="mb-1 text-3xl"><b>{{ $data->username }}</b></h5>
    </div>

    <div class="p-10 flex flex-row justify-between">
        <table class="w-1/2">
               <tr class="text-left">
                <td>Nama Lengkap</td>
                <td id="x">: {{ $data->nama_lengkap }} </td>
               </tr>
               <tr class="w-1/2">
                <td>Tanggal Lahir</td>
                <td id="tgl_lahir">: {{ $data->tgl_lahir }}</td>
               </tr>
            <tr class="w-3">
                <td>Email</td>
                <td id="email">: {{ $data->email }}</td>
            </tr>
        </table>
        <div>
            <a href="/editprofil"><button class="bg-amber-500 text-white rounded-full py-2 h-10 w-32 font-fontregular mx-auto mt-5">Edit Profil</button></a>
         </div>
       </div>      
    </div>
    <hr class="border border-black ">
    <div class="flex flex-col h-80 p-7 gap-5 mb-5">
        <div class="flex justify-center p-3 gap-3">
            <div>
                <b class="text-2xl">Album</b>
            </div>
        </div>
            <div class="flex justify-center p-2 max-w-screen-xl">
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal">
                    <div class="px-20">
                        <i class="bi bi-folder-plus text-6xl"></i>
                    </div>
                </button>
            </div>
            @foreach ($tampilalbum as $albumuser)
                <div class="flex gap-7">    
                    <div class="flex width p-2">
                        <div class="flex flex-col ">
                            <a href="/isialbum/{{ $albumuser->id }}">
                            <div class="w-[320px] h-[200px] overflow-hidden rounded-2xl gap-5">
                                <img src="{{asset('/sampulalbum/'.$albumuser->foto_album)}}" alt="">
                            </div>
                            </a>
                            <div class="flex justify-between items-center">
                                <div class="fles flex-col mx-auto">
                                    <div class="font-semibold text-2xl">
                                        <span>{{ $albumuser->nama_album }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                 </div>
            @endforeach
             </div>
     </section>

<section>
<!-- Main modal -->
<div id="crud-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
  <div class="relative p-4 w-full max-w-md max-h-full">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
              <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                  Tambah Album
              </h3>
              <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="crud-modal">
                  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                      <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                  </svg>
                  <span class="sr-only">Close modal</span>
              </button>
          </div>
          <!-- Modal body -->
          <form action="/tambah_album" method="post" enctype="multipart/form-data" class="p-4 md:p-5">
            @csrf
              <div class="grid gap-4 mb-4 grid-cols-2">
                  <div class="col-span-2">
                      <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama Album</label>
                      <input type="text" name="nama_album" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                  </div>
                  <div class="col-span-2">                                      
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Sampul Album</label>
                      <input type="file" name="foto_album" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="" required="">
                  </div>
              </div>
              <button type="submit" class="text-white inline-flex items-center bg-amber-500 hover:bg-amber-500 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                  <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd"></path></svg>
                  Buat Album
              </button>
          </form>
      </div>
  </div>
</div> 
</section>
@endsection