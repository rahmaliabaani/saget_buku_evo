@extends('layouts.admin')

@section('content')
   <div class="container">
    <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary">
                    {{ __('bukus') }}
                </h6>
                <div class="ml-auto">
                    <a href="{{ route('admin.bukus.create') }}" class="btn btn-primary">
                        <span class="icon text-white-50">
                            <i class="fa fa-plus"></i>
                        </span>
                        <span class="text">{{ __('Buku Baru') }}</span>
                    </a>
                    
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Image</th>
                        <th>Buku</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th class="text-center" style="width: 30px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($bukus as $buku)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($buku->firstMedia)
                                <img src="{{ asset('storage/images/bukus/' . $buku->firstMedia->file_name) }}"
                                    width="60" height="60" alt="{{ $buku->name }}">
                                @else
                                    <span class="badge badge-danger">no image</span>
                                @endif
                            </td>
                            <td>{{ $buku->name }}</td>
                            <td>{{ $buku->category ? $buku->category->name : NULL }}</td>
                            <td>{{ $buku->status }}</td>
                            <td>
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('admin.bukus.edit', $buku) }}" class="btn btn-sm btn-primary">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <form onclick="return confirm('are you sure !')" action="{{ route('admin.bukus.destroy', $buku) }}"
                                    method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="12">No bukus found.</td>
                        </tr>
                    @endforelse
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="12">
                                <div class="float-right">
                                    {!! $bukus->appends(request()->all())->links() !!}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
   </div>
@endsection
