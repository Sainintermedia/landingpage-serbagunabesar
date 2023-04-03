@extends('dashboard.layouts.main')
@section('title', 'Post')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="{{ route('post.index') }}" type="button"
                            class="btn btn-block bg-gradient-primary btn-sm">Kembali</a>
                    </div>
                    <div class="card-tools">
                        <div class="input-group input-group-sm" style="width: 150px;">
                            <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-default">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table-bordered table-sm table-hover table">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 1%">No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr class="text-center">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->description }}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>
                                        <form action="{{ route('post.restore', $post->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success btn-sm"
                                                onclick="return confirm('Are you sure you want to restore this post?')">{{ __('Restore') }}</button>
                                        </form>
                                        <form method="POST" action="{{ route('posts.delete-permanently', $post->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        {{--  <a href="{{ route('post.show', $post->id) }}" class="btn">show</a>  --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
@endpush
@push('script')
@endpush
