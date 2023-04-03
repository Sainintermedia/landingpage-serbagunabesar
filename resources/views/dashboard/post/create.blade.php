@extends('dashboard.layouts.main')
@section('title', 'Post Create')
@section('content')

    <div class="row">
        <div class="col-md">
            <div class="card">
                <div class="card-body">
                    <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data" autocomplete="off">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ __('Title') }}</label>
                            <input id="title" type="text" class="form-control @error('title') is-invalid @enderror"
                                name="title" value="{{ old('title') }}" required autocomplete="title" autofocus>

                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">{{ __('Description') }}</label>
                            <textarea id="description" class="form-control summernote @error('description') is-invalid @enderror" name="description"
                                rows="8" required autocomplete="description">{{ old('description') }}</textarea>

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
                                    <option value="{{ $cta->id }}" {{ old('cta_id') == $cta->id ? 'selected' : '' }}>
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
                                        {{ in_array($category->id, old('category_id', [])) ? 'selected' : '' }}>
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
                            <label for="">{{ __('Upload Image') }}</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image[]" id="customFile" multiple>
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Gambar</th>
                                        <th>Nama File</th>
                                    </tr>
                                </thead>
                                <tbody id="image-table">
                                    <!-- Tabel akan diisi melalui JavaScript -->
                                </tbody>
                            </table>

                            <div id="image-preview"></div>
                        </div>

                        <div>
                            <div class="form-group">
                                <a href="{{ route('post.index') }}" class="btn bg-gradient-navy">Kembali</a>
                                <button class="btn btn-success" id="submit" type="submit">Simpan</button>
                            </div>
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
    <script src="{{ URL::asset('assets/dashboard/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 300,
                placeholder: 'Enter description here...'
            });
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            bsCustomFileInput.init();
        });
    </script>
    {{--  <script>
        const fileInput = document.querySelector('input[type="file"]');
        const imagePreview = document.querySelector('#image-preview');
        const submitButton = document.querySelector('button[type="submit"]');

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

        submitButton.addEventListener('click', (event) => {
            if (fileInput.files.length === 0) {
                event.preventDefault();
                alert('Mohon pilih setidaknya satu gambar untuk diunggah.');
            }
        });
    </script>  --}}


    {{--  <script>
        const form = document.querySelector('form');
        const imageTable = document.querySelector('#image-table tbody');
        const imagePreview = document.querySelector('#image-preview');

        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();

            xhr.open('POST', form.getAttribute('action'));
            xhr.onload = () => {
                if (xhr.status === 200) {
                    try {
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
                    } catch (error) {
                        console.error('Failed to parse response:', error);
                    }
                } else {
                    console.error('Request failed with status:', xhr.status);
                }
            };
            xhr.onerror = (error) => {
                console.error('Request failed:', error);
            };
            xhr.send(formData);
        });

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
    </script>  --}}
    <script>
        const form = document.querySelector('form');
        const imageTable = document.querySelector('#image-table tbody');
        const imagePreview = document.querySelector('#image-preview');

        /*
        form.addEventListener('submit', (event) => {
            event.preventDefault();
            const formData = new FormData(form);
            const xhr = new XMLHttpRequest();
            console.log(xhr);


            xhr.open('POST', form.getAttribute('action'));
            xhr.onload = () => {
                if (xhr.status === 200) {
                    try {
                        const response = JSON.parse(xhr.responseText);
                        console.log(response);

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

                        // redirect to index page
                        window.location.replace("{{ route('post.index') }}");

                    } catch (error) {
                        console.error('Failed to parse response:', error);
                    }
                } else {
                    console.error('Request failed with status:', xhr.status);
                }
            };
            xhr.onerror = (error) => {
                console.error('Request failed:', error);
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
