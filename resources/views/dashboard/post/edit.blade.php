@extends('dashboard.layouts.main')
@section('title', 'Post Create')
@section('content')

    <div class="row">
        <div class="col-md">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('post.update', $post->id) }}" enctype="multipart/form-data"
                        autocomplete="off">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title', $post->title) }}" required autocomplete="title"
                                autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea id="description" class="form-control summernote @error('description') is-invalid @enderror" name="description"
                                rows="8" required autocomplete="description">{{ old('description', $post->description) }}</textarea>

                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="cta_id">{{ __('CTA') }}</label>
                            <select id="cta_id" class="form-control @error('cta_id') is-invalid @enderror" name="cta_id"
                                required>
                                <option value="" selected disabled>{{ __('Select CTA') }}</option>
                                @foreach ($ctas as $cta)
                                    <option value="{{ $cta->id }}"
                                        {{ old('cta_id', $post->cta_id) == $cta->id ? 'selected' : '' }}>
                                        {{ $cta->cta_text }}</option>
                                @endforeach
                            </select>

                            @error('cta_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="category_id">{{ __('Category') }}</label>
                            <select id="category_id"
                                class="form-control select2bs4 @error('category_id') is-invalid @enderror"
                                name="category_id[]" required multiple="multiple" data-placeholder="Select Category">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ in_array($category->id, old('category_id', $post->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                                        {{ $category->name }}</option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">

                        </div>

                        <div class="form-group">
                            <label for="">Image</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image[]" id="customFile" multiple>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama File</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="image-table">
                                    @foreach ($post->postImage as $image)
                                        <tr>
                                            <td><img src="{{ asset($image->url) }}" width="100">
                                            </td>
                                            <td>{{ $image->name }}</td>
                                            <td>
                                                <button type="button" class="btn btn-danger btn-sm delete-image"
                                                    data-id="{{ $image->id }}">Delete</button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div id="image-preview"></div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn bg-gradient-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <link rel="stylesheet" href="{{ URL::asset('assets/dashboard/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet"
        href="{{ URL::asset('assets/dashboard/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/dashboard/plugins/summernote/summernote-bs4.min.css') }}">
    <style>
        #image-preview {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        #image-preview img {
            width: 160px;
            height: 160px;
            object-fit: cover;
            margin: 10px;
        }
    </style>
@endpush
@push('script')
    <script src="{{ URL::asset('assets/dashboard/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ URL::asset('assets/dashboard/plugins/select2/js/select2.full.min.js') }}"></script>
    <script src="{{ URL::asset('/assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                placeholder: 'Enter description here...'
            });
        });
    </script>
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        });
    </script>
    <script>
        $(function() {
            bsCustomFileInput.init();
        });
    </script>

    <script>
        $(document).on('click', '.delete-image', function() {
            var imageId = $(this).data('id');
            if (confirm('Are you sure you want to delete this image?')) {
                $.ajax({
                    url: '{{ route('post.image.delete', ':id') }}'.replace(':id', imageId),
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}"
                    },
                    success: function() {
                        $('#image-table').find('[data-id="' + imageId + '"]').closest('tr').remove();
                        alert('Image deleted successfully.');
                    },
                    error: function() {
                        alert('An error occurred while deleting the image.');
                    }
                });
            }
        });
    </script>

    <script>
        const form = document.querySelector('form');
        const imageTable = document.querySelector('#image-table tbody');
        const imagePreview = document.querySelector('#image-preview');

        /*
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();

            xhr.open('POST', form.getAttribute('action'));
            xhr.onload = () => {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);


                    for (const image of response.images) {
                        const row = document.createElement('tr');
                        const imageCell = document.createElement('td');
                        const fileCell = document.createElement('td');

                        const img = document.createElement('img');
                        img.src = image.url;
                        img.alt = image.name;
                        imageCell.appendChild(img);

                        const fileName = document.createTextNode(image.name);
                        fileCell.appendChild(fileName);

                        row.appendChild(imageCell);
                        row.appendChild(fileCell);

                        imageTable.appendChild(row);
                    }
                } else {
                    console.error(xhr.statusText);
                }
            };

            xhr.send(formData);
        });
        */

        const fileInput = document.querySelector('input[type="file"]');

        fileInput.addEventListener('change', () => {
            imagePreview.innerHTML = '';
            for (const file of fileInput.files) {
                const reader = new FileReader();

                reader.onload = (event) => {
                    const img = document.createElement('img');
                    img.src = event.target.result;
                    img.alt = file.name;

                    imagePreview.appendChild(img);
                };

                reader.readAsDataURL(file);
            }
        });
    </script>
@endpush
