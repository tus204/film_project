@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-header">{{ __('Movie Management') }}</div>
                <a href="{{ route('movie.index') }}" class="btn btn-primary col-2 m-3">Detail</a>

                <div class="card-body">
                    @if (session('status'))
                        <h5 class="alert alert-success">
                            {{ session('status') }}
                        </h5>
                    @endif
                    
                    @if (!isset($movie))
                        {!! Form::open(['route' => 'movie.store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    @else
                        {!! Form::open(['route' => ['movie.update', $movie->id], 'method' => 'PUT', 'enctype' => 'multipart/form-data']) !!}
                    @endif
                    
                        @csrf
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($movie) ? $movie->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...', 'id' => 'slug', 'onkeyup' => 'ChangeToSlug()']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('slug', 'Slug', []) !!}
                            {!! Form::text('slug', isset($movie) ? $movie->slug : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...', 'id' => 'convert_slug']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('eng name', 'Eng Name', []) !!}
                            {!! Form::text('name_eng', isset($movie) ? $movie->name_eng : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Description', 'Description', []) !!}
                            {!! Form::textarea('description', isset($movie) ? $movie->description : '', ['style' => 'resize: none', 'class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...', 'id' => 'desc']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('active', 'Status', []) !!}
                            {!! Form::select('status', ['0' => '', '1' => 'Active', '2' => 'Inactive'], isset($movie) ? $movie->status : '', ['class' => 'form-control mb-4']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('resolution', 'Resolution', []) !!}
                            {!! Form::select('resolution', ['0' => 'HD', '1' => 'SD', '2' => 'HDCam', '3' => 'Cam', '4' => 'FullHD'], isset($movie) ? $movie->resolution : '', ['class' => 'form-control mb-4']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('subtitle', 'Subtitle', []) !!}
                            {!! Form::select('subtitle', ['0' => 'Phụ đề', '1' => 'Thuyết minh'], isset($movie) ? $movie->subtitle : '', ['class' => 'form-control mb-4']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Category', 'Category', []) !!}
                            {!! Form::select('category_id', $category, isset($movie) ? $movie->category_id : '', ['class' => 'form-control mb-4']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Country', 'Country', []) !!}
                            {!! Form::select('country_id', $country, isset($movie) ? $movie->country_id : '', ['class' => 'form-control mb-4']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Genre', 'Genre', []) !!}
                            {!! Form::select('genre_id', $genre, isset($movie) ? $movie->genre_id : '', ['class' => 'form-control mb-4']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Hot', 'Hot', []) !!}
                            {!! Form::select('phim_hot', ['1' => 'Có', '0' => 'Không'], isset($movie) ? $movie->phim_hot : '', ['class' => 'form-control mb-4']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('Image', 'Image', []) !!}
                            {{-- {!! Form::file('image', ['class' => 'form-control mb-4 mt-2']) !!} --}}
                            <input type="file" name="image" id="" class="form-control mb-4 mt-2">
                            @if (isset($movie))
                                <img src="{{ asset('uploads/movies/' . $movie->image ) }}" alt="" width="30%">
                            @endif
                        </div>
                        @if (!isset($movie))
                            {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Update', ['class' => 'btn btn-success mt-3']) !!}
                        @endif
                        
                    {!! Form::close() !!}
                </div>
            </div>
            {{-- <table class="table" id="movieTable">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Image</th>
                    <th scope="col">Category</th>
                    <th scope="col">Genre</th>
                    <th scope="col">Country</th>
                    <th scope="col">Hot</th>
                    <th scope="col">Status</th>
                    <th scope="col">Handle</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($list as $movie )
                        <tr>
                            <th scope="row">{{ $movie->id }}</th>
                            <td>{{ $movie->title }}</td>
                            <td>{{ $movie->slug }}</td>
                            <td>{{ $movie->description }}</td>
                            <td><img src="{{ asset('uploads/movies/' . $movie->image ) }}" alt="" width="69px"></td>
                            <td>{{ $movie->category->title }}</td>
                            <td>{{ $movie->genre->title }}</td>
                            <td>{{ $movie->country->title }}</td>
                            <td>
                                @if ($movie->phim_hot == 1)
                                    Yes
                                @else
                                    No
                                @endif
                            </td>
                            <td>
                                @if ($movie->status == 1)
                                    Active
                                @else
                                    Inactive
                                @endif
                            </td>
                            
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form method="POST" action="{{ route('movie.destroy',$movie->id) }}" onsubmit="return confirm('Are u sure wanna delete?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" style="margin-right: 5px">DELETE</button>
                                    </form>
                                    <a href="{{ route('movie.edit',$movie->id) }}"><button class="btn btn-warning ">EDIT</button></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach                
                </tbody>
            </table> --}}
        </div>
    </div>
</div>
@endsection