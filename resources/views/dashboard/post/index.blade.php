@extends('dashboard.layouts.main')
@section('title', 'Post')
@section('content')
    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <a href="{{ route('post.create') }}" type="button"
                            class="btn btn-block bg-gradient-primary btn-sm">Primary</a>
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
                <div class="card-body">
                    <table class="table-bordered table-sm table-hover table">
                        <thead>
                            <tr class="text-center">
                                <th style="width: 1%">No</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Tanggal</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $pos => $post)
                                <tr class="text-center">
                                    <th>{{ $posts->firstItem() + $pos }}</th>
                                    <td>{{ $post->title }}</td>
                                    <td>{!! $post->description !!}</td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at }}</td>
                                    <td class="text-sm">
                                        <form action="{{ route('post.destroy', $post->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('post.edit', $post->id) }}"
                                                class="btn btn-xs bg-gradient-warning">Edit</a>
                                            <a href="{{ route('post.show', $post->id) }}"
                                                class="btn btn-xs bg-gradient-navy">Show</a>
                                            <button type="submit" class="btn bg-gradient-danger btn-xs">Delete</button>
                                        </form>
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
