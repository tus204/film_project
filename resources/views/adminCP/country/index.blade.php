@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <a href="{{ route('country.create') }}" class="btn btn-primary col-2 mb-1">Add</a>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Title</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Description</th>
                            <th scope="col">Status</th>
                            <th scope="col">Handle</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach ($list as $country )
                                <tr>
                                    <th scope="row">{{ $country->id }}</th>
                                    <td>{{ $country->title }}</td>
                                    <td>{{ $country->slug }}</td>
                                    <td>{{ $country->description }}</td>
                                    <td>
                                        @if ($country->status == 1)
                                            Active
                                        @else
                                            Inactive
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group" aria-label="Basic example">
                                            <form method="POST" action="{{ route('country.destroy',$country->id) }}" onsubmit="return confirm('Are u sure wanna delete?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger p-0 m-0">
                                                    <i class="bi bi-trash-fill fs-3"></i>
                                                </button>
                                            </form>
                                            <a href="{{ route('country.edit',$country->id) }}">
                                                <button type="button" class="btn btn-link text-primary p-0 m-0">
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