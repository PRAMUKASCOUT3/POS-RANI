@extends('layouts.master')

@push('styles')
    @livewireStyles
@endpush

@section('content')

@livewire('product.product-create',['category'=>$category])

@endsection

@push('scripts')
    @livewireScripts
@endpush