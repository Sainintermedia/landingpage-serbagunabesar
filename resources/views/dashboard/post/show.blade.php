@extends('dashboard.layouts.main')
@section('title', 'Show')
@section('content')

    <div class="card card-solid">
        <div class="card-body">
            <div class="row">
                <div class="col-12 col-sm-6">
                    <h3 class="d-inline-block d-sm-none">{{ $post->title }}</h3>
                    <div class="col-12">
                        <img src="{{ $post->postImage->first()->url }}" class="product-image" alt="Product Image">
                    </div>
                    <div class="col-12 product-image-thumbs">
                        @foreach ($post->postImage as $image)
                            <div class="product-image-thumb"><img src="{{ asset($image->url) }}" alt="Product Image">
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-12 col-sm-6">
                    <h3 class="my-3">{{ $post->title }}</h3>
                    <p>Description.</p>
                    <p>{!! $post->description !!}.</p>
                    <hr>
                    <h4>Categories</h4>
                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        @foreach ($post->categories as $category)
                            <label class="btn btn-default active text-center">
                                <input type="radio" name="color_option" id="color_option_a1" autocomplete="off">
                                {{ $category->name }}
                                <br>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="text-right">
                <a href="{{ route('post.index') }}" class="btn btn-sm bg-gradient-navy">Kembali</a>
                <a href="{{ route('post.edit', $post->id) }}" class="btn btn-sm bg-gradient-warning">Edit</a>
            </div>
        </div>
    </div>

@endsection
@push('styles')
@endpush
@push('script')
    <script>
        $(document).ready(function() {
            $('.product-image-thumb').on('click', function() {
                var $image_element = $(this).find('img')
                $('.product-image').prop('src', $image_element.attr('src'))
                $('.product-image-thumb.active').removeClass('active')
                $(this).addClass('active')
            })
        })
    </script>
@endpush
