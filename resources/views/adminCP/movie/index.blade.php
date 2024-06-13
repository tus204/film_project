@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-12 mt-3">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('movie.create') }}" class="badge bg-primary mb-1 fs-4"><i class="bi bi-plus-circle-fill"></i></a>
                <table class="table " id="movieTable">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Eng Name</th>
                        <th scope="col">Movie Time</th>
                        <th scope="col">Image</th>
                        <th scope="col">Category</th>
                        <th scope="col">Genre</th>
                        <th scope="col">Country</th>
                        <th scope="col">Hot</th>
                        <th scope="col">Resolution</th>
                        <th scope="col">Subtitle</th>
                        <th scope="col">Status</th>
                        <th scope="col">Year</th>
                        <th scope="col">Handle</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($list as $movie )
                            <tr>
                                <th scope="row">{{ $movie->id }}</th>
                                <td>{{ $movie->title }}</td>
                                <td>{{ $movie->slug }}</td>
                                <td>{{ $movie->name_eng }}</td>
                                <td>{{ $movie->movie_time }}</td>
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
                                    @if ($movie->resolution == 0)
                                        HD
                                    @elseif ($movie->resolution == 1)
                                        SD
                                    @elseif ($movie->resolution == 2)
                                        HDCam
                                    @elseif ($movie->resolution == 3)
                                        Cam
                                    @else
                                        FullHD
                                    @endif
                                </td>
                                <td>
                                    @if ($movie->subtitle == 0)
                                        Phụ đề
                                    @else
                                        Thuyết minh
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
                                    {!! Form::selectYear('year', 1975, 2024, isset($movie->year) ? $movie->year : '', ['class' => 'select-year', 'id' => $movie->id, 'placeholder' => '--Năm phim--']) !!}
                                </td>
                                
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <form method="POST" action="{{ route('movie.destroy',$movie->id) }}" onsubmit="return confirm('Are u sure wanna delete?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-link text-danger p-0 m-1">
                                                <i class="bi bi-trash-fill fs-3"></i>
                                            </button>
                                        </form>
                                        <a href="{{ route('movie.edit',$movie->id) }}">
                                            <button type="button" class="btn btn-link text-primary p-0 m-1">
                                                <i class="bi bi-pencil-square fs-3"></i>
                                            </button>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach                
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection