@extends('layout.master')
@push('cssjsexternal')
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
@endpush
@section('content')
    <section class="mt-5 p-10">
        @csrf
        <div class="max-w-screen-xl mx-auto">
            <div class=" flex justify-center flex-wrap items-center flex-container" id="exploredata">
               
            </div>
        </div>
    </section>

@endsection
@push('footerjsexternal')
    <script src="/javascript/explore.js"></script>
@endpush