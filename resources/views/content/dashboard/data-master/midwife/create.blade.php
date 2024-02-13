@extends('layouts.app')

@section('title', 'Data Bidan')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Bidan</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Data Master</a></div>
                    <div class="breadcrumb-item">Bidan</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12 ">
                        <div class="card">
                            <form action="/midwife-data" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <input type="hidden" name="role" value="midwife">
                                        <div class="form-group col-6">
                                            <label for="username">Username</label>
                                            <input id="username" type="text" class="form-control" name="username"
                                                autofocus value="{{ old('username') }}">
                                            @error('username')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="name">Nama Bidan</label>
                                            <input id="name" type="text" class="form-control" name="name"
                                                value="{{ old('name') }}">
                                            @error('name')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Password</label>
                                            <input id="password" type="password" class="form-control" name="password">
                                            @error('password')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="password_confirmation" class="d-block">Password Confirmation</label>
                                            <input id="password_confirmation" type="password" class="form-control"
                                                name="password_confirmation">
                                            @error('password_confirmation')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="nik">Nomor Induk Bidan (NIK)</label>
                                            <input id="nik" type="number" class="form-control" name="nik"
                                                value="{{ old('nik') }}">
                                            @error('nik')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="nip">Nomor Induk Pokok (NIP)</label>
                                            <input id="nip" type="number" class="form-control" name="nip"
                                                value="{{ old('nip') }}">
                                            @error('nip')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="date_of_birth">Tanggal Lahir Bidan</label>
                                            <input id="date_of_birth" type="text" class="form-control datepicker"
                                                name="date_of_birth" value="{{ old('date_of_birth') }}">
                                            @error('date_of_birth')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="place_of_birth">Tempat Lahir Bidan</label>
                                            <input id="place_of_birth" type="text" class="form-control"
                                                name="place_of_birth" value="{{ old('place_of_birth') }}">
                                            @error('place_of_birth')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="gender">Jenis Kelamin</label>
                                            <select name="gender" id="gender" class="form-control selectric">
                                                <option value="" selected disabled>-- Pilih Jenis Kelamin --
                                                </option>
                                                <option value="Laki-laki"
                                                    {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>
                                                    Laki-laki
                                                </option>
                                                <option value="Perempuan"
                                                    {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                            @error('gender')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="address">Alamat</label>
                                            <input id="address" type="text" class="form-control" name="address"
                                                value="{{ old('address') }}">
                                            @error('address')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="last_educations">Pendidikan Terakhir</label>
                                            <input id="last_educations" type="text" class="form-control"
                                                name="last_educations" value="{{ old('last_educations') }}">
                                            @error('last_educations')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="form-group col-6">
                                            <label for="phone_number">Nomer Telefon (AKTIF)</label>
                                            <input id="phone_number" type="number" class="form-control"
                                                name="phone_number" value="{{ old('phone_number') }}">
                                            @error('phone_number')
                                                <span class="text-danger text-small">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>
                                </div>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Tambah Bidan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/page/modules-datatables.js') }}"></script>
    <script src="{{ asset('library/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/forms-advanced-forms.js') }}"></script>
@endpush
