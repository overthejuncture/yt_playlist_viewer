@extends('layouts.app')
@section('content')
    <div id="app"></div>
@endsection

@push('scripts')
@vite('resources/js/vue/mpa/youtube/export-playlists.js')
@endpush
