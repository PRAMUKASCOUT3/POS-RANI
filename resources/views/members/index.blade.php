@extends('layouts.master')

@section('content')
    <div class="container mt-2">
        <div class="card">
            <div class="card-header">
                <h4>Member <i class="bx bx-user-pin"></i></h4>
            </div>
            <div class="card-body">
                @include('members.create')
                <table id="example" class="table">
                    <thead>
                        <th>No</th>
                        <th>Kode Member <i class="fas fa-id-badge"></i></th>
                        <th>Nama Member <i class="fas fa-id-card"></i></th>
                        <th>Nomor HP Member <i class="fas fa-id-card"></i></th>
                        <th>Point Member</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody>
                        @foreach ($members as $no => $member)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $member->code }}</td>
                                <td>{{ $member->name }}</td>
                                <td>{{ $member->phone }}</td>
                                <td>
                                    @if ($member->points == 0)
                                        <span class="badge bg-secondary">Belum Ada Point</span>
                                    @else
                                        {{ $member->points }}
                                    @endif
                                </td>                                
                                <td>
                                    <div class="d-flex justify-content-center">
                                        <a href="{{ route('members.edit', $member->id) }}"
                                            class="btn btn-info btn-sm me-2">Edit</a>
                                        <form id="deleteForm{{ $member->id }}" class="d-inline"
                                            action="{{ route('members.delete', $member->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-danger btn-sm"
                                                onclick="confirmDelete({{ $member->id }})">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
