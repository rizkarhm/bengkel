@extends('layouts.app')

@section('title', 'Data Feedback Mekanik')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('feedback.index') }}">All Data Feedback</a></li>
        <li class="breadcrumb-item active">Mekanik Feedback</li>
    </ol>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <!-- Topbar Search -->
            <form class="d-none d-sm-inline-block form-inline mr-auto md-3 my-2 my-md-0 mw-100 navbar-search">
                <div class="input-group">
                    <input type="text" class="form-control border-2 small" placeholder="Cari" aria-label="Search"
                        aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-primary" type="button">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p class="mb-0">{{ $message }}</p>
                    </div>
                @endif
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="text-bold text-center" style="color:blue">
                        <tr>
                            {{-- <th style="width: 40px;">No</th> --}}
                            <th style="width: 90px;">ID Booking</th>
                            <th>Nama Customer</th>
                            <th style="width: 60px;">Rating</th>
                            <th>Feedback</th>
                            <th style="width: 150px;">Created At</th>
                            <th style="width: 200px; color:blue">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php($no = 1)
                        @foreach ($feedbacks as $key => $row)
                            @if ($row->booking->pic_id == auth()->user()->id)
                                <tr>
                                    {{-- <td class="text-center">{{ $no++ }}</td> --}}
                                    <td class="text-center">{{ $row->booking_id }}</td>
                                    <td>{{ $row->booking->user->nama }}</td>
                                    <td class="text-center">{{ $row->rating }}</td>
                                    <td>{{ $row->feedback }}</td>
                                    <td>{{ $row->created_at }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('feedback.show', $row->id) }}" class="btn btn-success">Detail</a>
                                        <button class="btn btn-danger ml-2" data-toggle="modal"
                                            data-target="#deleteModal-{{ $row->id }}" class="delete-item">
                                            Hapus
                                        </button>

                                        <div class="modal fade text-left" id="deleteModal-{{ $row->id }}"
                                            tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
                                            aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel">Konfirmasi Hapus Data
                                                        </h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Anda yakin ingin menghapus data feedback dari customer
                                                            {{ $row->booking->user->nama }}?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">Batal</button>
                                                        <form action="{{ route('feedback.destroy', $row->id) }}"
                                                            method="POST" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
