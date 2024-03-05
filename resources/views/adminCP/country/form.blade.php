@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Country Management') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    @if (!isset($country))
                        {!! Form::open(['route' => 'country.store', 'method' => 'POST']) !!}
                    @else
                        {!! Form::open(['route' => ['country.update', $country->id], 'method' => 'PUT']) !!}
                    @endif
                    
                        @csrf
                        <div class="form-group">
                            {!! Form::label('title', 'Title', []) !!}
                            {!! Form::text('title', isset($country) ? $country->title : '', ['class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...', 'id' => 'title']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('desc', 'Description', []) !!}
                            {!! Form::textarea('desc', isset($country) ? $country->description : '', ['style' => 'resize: none', 'class' => 'form-control', 'placeholder' => 'Nhập vào dữ liệu...', 'id' => 'desc']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('desc', 'Description', []) !!}
                            {!! Form::select('status', ['1' => 'Active', '2' => 'Inactive'], isset($country) ? $country->status : '', ['class' => 'form-control mb-4']) !!}
                        </div>
                        @if (!isset($country))
                            {!! Form::submit('Add', ['class' => 'btn btn-success']) !!}
                        @else
                            {!! Form::submit('Update', ['class' => 'btn btn-success']) !!}
                        @endif
                        
                    {!! Form::close() !!}
                </div>
            </div>
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
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
                                        <button type="submit" class="btn btn-danger" style="margin-right: 5px">DELETE</button>
                                    </form>
                                    <a href="{{ route('country.edit',$country->id) }}"><button class="btn btn-warning ">EDIT</button></a>
                                </div>
                            </td>
                        </tr>
                    @endforeach                
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection