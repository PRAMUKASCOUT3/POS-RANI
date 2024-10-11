@extends('layouts.master')

@push('styles')
    @livewireStyles
@endpush

@section('content')

@livewire('expenditures.expenditures-edit',['expenditure'=>$expenditure])

@endsection

@push('scripts')
    @livewireScripts
@endpush