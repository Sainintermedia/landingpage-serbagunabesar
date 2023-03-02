@extends('layouts.backend.main')
@section('title', 'Dashboard')
@section('content')
    {{--  <div class="clearfix"></div>  --}}
    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-6">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Selamat datang !!</h2>

                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <br />
                    <p>Hallo {{ auth()->user()->name }}</p>
                    <p>Aplikasi ini diperuntukan membuat posting gambar</p>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
@endpush
@push('script')
@endpush
