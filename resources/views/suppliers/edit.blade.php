@extends('layouts.master')

@push('styles')
    @livewireStyles
@endpush
@section('content')
@livewire('supplier.supplier-edit',['suppliers' => $suppliers])
@endsection

@push('scripts')
    @livewireScripts
@endpush

