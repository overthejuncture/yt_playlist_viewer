@extends('layouts.app')
@section('content')
    <div id="app"></div>
@endsection

@push('scripts')
@vite('resources/js/vue/mpa/youtube/watch-later.js')
@endpush
