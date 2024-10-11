@extends('layouts.master')

@push('styles')
    @livewireStyles
@endpush
@section('content')
@livewire('user.user-edit',['user' => $user])
@endsection

@push('scripts')
    @livewireScripts
@endpush

