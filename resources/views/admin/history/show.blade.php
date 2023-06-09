@extends('layouts.app')

@section('title', 'Detail Riwayat Service')

@section('contents')
    <ol class="breadcrumb px-3 py-2 rounded mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('history.index') }}">Riwayat Service</a></li>
        <li class="breadcrumb-item active">Detail</li>
    </ol>

    <div class="row">
        <div class="col-12">
            <div class="card shadow mb-4">
                <div class="card-header">Detail Riwayat Service</div>
                <div class="card-body">
                    @if (auth()->user()->role != 'Customer')
                        <div class="form-group">
                            <label for="user_id">Nama Customer</label>
                            <select name="user_id" id="user_id" class="custom-select" disabled>
                                <option value="" selected disabled hidden>Pilih Customer</option>
                                @foreach ($cust as $customer)
                                    <option value="{{ $bookings->user_id }}" @selected(isset($bookings) ? $customer->id == $bookings->user_id : '')>
                                        {{ $customer->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="kendaraan_id">Merek Kendaraan</label>
                        <select name="kendaraan_id" id="kendaraan_id" class="custom-select" disabled>
                            <option value="" selected disabled hidden>Pilih Merek Kendaraan</option>
                            @foreach ($kendaraans as $merek)
                                <option value="{{ $bookings->kendaraan_id }}" @selected(isset($bookings) ? $merek->id == $bookings->kendaraan_id : '')>
                                    {{ $merek->merek }}</option>
                            @endforeach
                        </select>
                        @error('kendaraan_id')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="model">Model Kendaraan</label>
                        <input type="text" class="form-control" id="model" name="model" disabled
                            placeholder="cth: HR-V 2017" value="{{ isset($bookings) ? $bookings->model : old('model') }}">
                        @error('model')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nopol">Nomor Polisi</label>
                        <input type="text" class="form-control" id="nopol" name="nopol" disabled
                            value="{{ isset($bookings) ? $bookings->nopol : old('nopol') }}">
                        @error('nopol')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="no_mesin">Nomor Mesin</label>
                        <input type="text" class="form-control" id="no_mesin" name="no_mesin" disabled
                            value="{{ isset($bookings) ? $bookings->no_mesin : old('no_mesin') }}">
                        @error('no_mesin')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_masuk">Tanggal Masuk</label>
                        <input type="text" class="form-control" id="tgl_masuk" name="tgl_masuk" disabled
                            value="{{ isset($bookings) ? $bookings->tgl_masuk : old('tgl_masuk') }}">
                        @error('tgl_masuk')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tgl_selesai">Tanggal Selesai</label>
                        <input type="text" class="form-control" id="tgl_selesai" name="tgl_selesai" disabled
                            value="{{ isset($bookings) ? $bookings->tgl_selesai : old('tgl_selesai') }}">
                        @error('tgl_selesai')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @if (auth()->user()->role != 'Customer')
                        <div class="form-group" id="pic_id">
                            <label for="pic_id">PIC</label>
                            <select name="pic_id" id="pic_id" class="custom-select" disabled>
                                <option value="" selected disabled hidden>Pilih PIC</option>
                                @foreach ($pic as $pic_id)
                                    <option value="{{ $bookings->pic_id }}" @selected(isset($bookings) ? $pic_id->id == $bookings->pic_id : '')>
                                        {{ $pic_id->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('pic_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    @endif

                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" id="status" class="custom-select" disabled>
                            <option value="" selected disabled hidden>Pilih Status</option>
                            <option value="Booked" @selected(isset($bookings) ? $bookings->status == 'Booked' : old('status') == 'Booked')>Booked
                            </option>
                            <option value="In Queue" @selected(isset($bookings) ? $bookings->status == 'In Queue' : old('status') == 'In Queue')>In Queue
                            </option>
                            <option value="Proccessed" @selected(isset($bookings) ? $bookings->status == 'Proccessed' : old('status') == 'Proccessed')>Proccessed
                            </option>
                            <option value="Done" @selected(isset($bookings) ? $bookings->status == 'Done' : old('status') == 'Done')>Done
                            </option>
                            <option value="Canceled" @selected(isset($bookings) ? $bookings->status == 'Canceled' : old('status') == 'Canceled')>Canceled
                            </option>
                        </select>
                        @error('status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    @if (auth()->user()->role != 'Customer')
                        @if ($bookings->status == 'Done')
                            <div class="form-group" id="penanganan">
                                <label for="penanganan">Penanganan</label>
                                <textarea disabled type="text" class="form-control" id="penanganan" name="penanganan" value="">{{ isset($bookings) ? $bookings->penanganan : '' }}</textarea>
                                @error('penanganan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @elseif ($bookings->status == 'Canceled')
                            <div class="form-group" id="pesan">
                                <label for="pesan">Keterangan Pembatalan</label>
                                <input type="text" class="form-control" id="pesan" name="pesan" disabled
                                    value="{{ isset($bookings) ? $bookings->ket_pembatalan : old('pesan') }}">
                                @error('pesan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        @endif
                    @endif
                </div>
                @if (auth()->user()->role == 'Customer')
                    <div class="card-footer">
                        @if ($bookings->status == 'Done')
                            <a href="{{ route('booking.edit', $bookings) }}" class="btn btn-warning disabled">Edit Data
                                Booking</a>
                            @if ($isExist != 1)
                                <a href="{{ route('feedback.edit', $bookings) }}" class="btn btn-info">Isi
                                    Feedback</a>
                            @else
                                <a href="{{ route('feedback.edit', $bookings) }}" class="btn btn-info disabled">Isi
                                    Feedback</a>
                            @endif
                        @elseif ($bookings->status == 'Canceled')
                            <a href="{{ route('booking.edit', $bookings) }}" class="btn btn-warning disabled">Edit
                                Data
                                Booking</a>
                        @else
                            <a href="{{ route('booking.edit', $bookings) }}" class="btn btn-warning">Edit Data
                                Booking</a>
                        @endif
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
