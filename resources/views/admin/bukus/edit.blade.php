@extends('layouts.admin')

@push('style-alt')
    <link rel="stylesheet" href="{{ asset('backend/vendor/select2/css/select2.min.css') }}">
@endpush

@section('content')
    <div class="container">
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('Edit Buku')}}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.bukus.index') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-home"></i>
                        </span>
                        <span class="text">{{ __('Kembali ke buku') }}</span>
                    </a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.bukus.update', $buku) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input class="form-control" id="name" type="text" name="name" value="{{ old('name', $buku->name) }}">
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="price">Price</label>
                                    <input class="form-control" id="price" type="number" name="price" value="{{ old('price', $buku->price) }}">
                                    @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="quantity">Quantity</label>
                                    <input class="form-control" id="quantity" type="number" name="quantity" value="{{ old('quantity', $buku->quantity) }}">
                                    @error('quantity')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="category_id">Category</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">- Select category -</option>
                                        @forelse($categories as $category)
                                            <option value="{{ $category->id }}" {{ old('category_id') || $buku->category_id == $category->id ? 'selected' : null }}>
                                                {{ $category->name }}
                                            </option>
                                        @empty
                                        @endforelse
                                    </select>
                                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                    <div class="row">
                        <div class="col-12">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">- Select Status-</option>
                                        <option value="1" {{ old('status', $buku->status) == "Active" ? 'selected' : null }}>Active</option>
                                        <option value="0" {{ old('status', $buku->status) == "Inactive" ? 'selected' : null }}>Inactive</option>
                                    </select>
                                    @error('status')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                    </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                <label for="description" class="text-small text-uppercase">{{ __('Description') }}</label>
                                <textarea name="description" rows="3" class="form-control summernote">{!! old('description', $buku->description) !!}</textarea>
                                @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                <label for="details" class="text-small text-uppercase">{{ __('details') }}</label>
                                <textarea name="details" rows="3" class="form-control summernote">{!! old('details', $buku->details) !!}</textarea>
                                @error('details')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <label for="images">{{ __('images') }}</label>
                                <br>
                                <div class="file-loading">
                                    <input type="file" name="images[]" id="buku-images" class="file-input-overview" multiple="multiple">
                                </div>
                                @error('images')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="form-group pt-4">
                            <button class="btn btn-primary" type="submit" name="submit">{{ __('Save') }}</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
@endsection

@push('script-alt')
<script src="{{ asset('backend/vendor/select2/js/select2.full.min.js') }}"></script>
    <script>
        $(function () {
            // summernote
            $('.summernote').summernote({
                tabSize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });

            // select2
            function matchStart(params, data) {
                // If there are no search terms, return all of the data
                if ($.trim(params.term) === '') {
                    return data;
                }

                // Skip if there is no 'children' property
                if (typeof data.children === 'undefined') {
                    return null;
                }

                // `data.children` contains the actual options that we are matching against
                var filteredChildren = [];
                $.each(data.children, function (idx, child) {
                    if (child.text.toUpperCase().indexOf(params.term.toUpperCase()) == 0) {
                        filteredChildren.push(child);
                    }
                });

                // If we matched any of the timezone group's children, then set the matched children on the group
                // and return the group object
                if (filteredChildren.length) {
                    var modifiedData = $.extend({}, data, true);
                    modifiedData.children = filteredChildren;

                    // You can return modified objects from here
                    // This includes matching the `children` how you want in nested data sets
                    return modifiedData;
                }

                // Return `null` if the term should not be displayed
                return null;
            }

            $(".select2").select2({
                tags: true,
                closeOnSelect: false,
                minimumResultsForSearch: Infinity,
                matcher: matchStart
            });

            // upload images
            $("#buku-images").fileinput({
                theme: "fas",
                maxFileCount: 5,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    @if($buku->media()->count() > 0)
                        @foreach($buku->media as $media)
                            "{{ asset('storage/images/bukus/' . $media->file_name) }}",
                        @endforeach
                    @endif
                ],
                initialPreviewAsData: true,
                initialPreviewFileType: 'image',
                initialPreviewConfig: [
                        @if($buku->media()->count() > 0)
                            @foreach($buku->media as $media)
                                {
                                    caption: "{{ $media->file_name }}",
                                    size: "{{ $media->file_size }}",
                                    width: "120px",
                                    url: "{{ route('admin.bukus.removeImage', [
                                                            'image_id' => $media->id,
                                                            'buku_id' => $buku->id,
                                                            '_token' => csrf_token()
                                                        ]) }}",
                                    key: {{ $media->id }}
                                },
                            @endforeach
                        @endif
                ]
            }).on('filesorted', function (event, params) {
               console.log(params.previewId, params.oldIndex, params.newIndex, params.stack)
            });
        })
    </script>
@endpush