@extends('layouts.master')

@push('styles')
    @livewireStyles
@endpush

@section('content')

@livewire('product.product-edit',['product'=>$product,'category'=>$category])

@endsection

@push('scripts')
    @livewireScripts
@endpush