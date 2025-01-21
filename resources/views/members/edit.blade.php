@extends('layouts.master')

@section('content')
<div class="container mt-4">
    <div class="card border">
        <div class="row">
            <div class="col-sm-6">
                <div class="card-body">
                    <h5 class="card-header bg-primary text-white">Data Lama</h5>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <label for="">Nama Member <i class="fas fa-file-signature"></i></label>
                        <input type="text" class="form-control" value="{{ $member->name }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="">Nomo Hp Member <i class="fas fa-file-signature"></i></label>
                        <input type="text" class="form-control" value="{{ $member->phone }}" readonly>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card-body">
                    <h5 class="card-header bg-primary text-white">Data Baru</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('members.update',$member->id) }}" method="POST">
                        @csrf
                        @method('put')
                        <div class="mb-3">
                            <label>Nama Member <i class="fas fa-file-signature"></i></label>
                            <input type="text" class="form-control" name="name" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label>Nomor HP Member <i class="fas fa-file-signature"></i></label>
                            <input type="text" class="form-control" name="phone" required>
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary mt-2">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
