@extends('layout.master')
@section('content')
<section class="max-w-screen-xl mx-auto mt-5 flex flex-col gap-3 justify-center">
    <div class="flex flex-col items-center pb-10 overflow-hidden">
        <img class="w-[200px] h-[200px] mt-5 mb-3 rounded-full" src="/assets/team-2.jpg" alt="">
        <h5 class="mb-1 text-3xl"><b>Kennyjenner_</b></h5>
    </div>

    <div class="p-10 flex flex-row justify-between">
        <table class="w-1/2">
               <tr class="text-left">
                <td>Nama Lengkap</td>
                <td>: Kenny Jenner</td>
               </tr>
               <tr class="w-1/2">
                <td>Tanggal Lahir</td>
                <td>: 18 Maret 1985</td>
               </tr>
            <tr class="w-1/2">
                <td>Email</td>
                <td>: kennyjenner@gmail.com</td>
            </tr>
        </table>
    <hr class="border border-black">
    <div class="flex flex-col h-80 p-3 gap-5 mb-5">
        <div class="flex p-3 gap-3">
            <div>
               <a href="/album"> <b>Album</b></a>
            </div>
            <div class="text-amber-500">
               <b>Foto</b>
            </div>
        </div>
        <div class="flex gap-7">
            <div class="flex-width p-2">
                <div class="w-[320px] h-[200px] overflow-hidden rounded-2xl">
                   <img src="/assets/burger.jpg" alt="">
                </div>
                <div class="w-1/3 flex width mt-10">
                    <div class="flex flex-col">
                        <div class="w-[320px] h-[200px] overflow-hidden rounded-2xl">
                            <img src="/assets/4-nature.jpg" alt="">
                        </div>
                        </div>
                        </div>
            </div>
            <div class="flex-width p-2">
                <div class="w-[320px] h-[200px] overflow-hidden rounded-2xl">
                   <img src="/assets/8-nature.jpg" alt="">
                </div>
            </div>
            <div class="flex width p-2">
                <div class="flex flex-col">
                    <div class="w-[320px] h-[200px] overflow-hidden rounded-2xl">
                        <img src="/assets/28-food.jpg" alt="">
                    </div>
                </div>
            </div>
           </div>
    </div>
</section>
@endsection