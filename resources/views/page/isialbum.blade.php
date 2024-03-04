@extends('layout.master')
@section('content')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
<section class="max-w-screen-xl mx-auto mt-5 flex flex-col gap-3 justify-center">
    <div class="flex flex-col items-center pb-10 overflow-hidden">
        <img class="w-[200px] h-[200px] mt-5 mb-3 rounded-full" src="{{ asset('fotoprofile/'.$data->avatar)}}" id="imageUser" alt="" >
        <h5 class="mb-1 text-3xl " id=""><b>{{ $data->username }}</b></h5>
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
        
    <hr class="border border-black">
    <div class="flex flex-col h-80 p-3 gap-5 mb-5">
        <div class="flex justify-center p-3 gap-3">
           <div>
               <b class="text-2xl">Album</b>
            </div>
        </div>
        <div class="flex gap-7">
            @foreach ($foto as $foto)
            <div class="flex-width p-2">
                <a href="/detail/{{ $foto->id }}">
                <div class="w-[320px] h-[200px] overflow-hidden rounded-2xl">
                   <img src="{{asset('/assets/'.$foto->lokasi_file)}}" alt="">
                </div>
                </a>
            </div>
            @endforeach           
        </div>
    </div>
</section>
@endsection
@push('footerjsexternal')
    <script src="/javascript/profil.js"></script>
@endpush