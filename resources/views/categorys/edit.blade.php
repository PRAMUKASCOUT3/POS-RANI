@extends('layouts.master')

@push('styles')
    @livewireStyles
@endpush
@section('content')

@livewire('category.category-edit',['category' => $category])

@endsection

@push('scripts')
    @livewireScripts
@endpush

