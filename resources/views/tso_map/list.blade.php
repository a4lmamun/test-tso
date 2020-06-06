@extends('app')

@section('body')
    <div>
        @if(isset($success))
            <div class="alert alert-success" role="alert">
                {{$success}}
            </div>
        @endif

        <a type="button" href="{{url('/tso-mapping/create')}}" class="btn btn-outline-primary" style="margin-bottom: 20px;">Add New</a>

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Thana Name</th>
                <th>Active?</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($maps as $map)
                <tr>
                    <td>{{$map->tso->name}}</td>
                    <td>{{$map->thana->name}}</td>
                    <td>{{$map->is_active === 1 ? 'Active' : 'Inactive'}}</td>
                    <td><a href="{{ action('TSOMappingController@edit', $map->id) }}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div style="display: flex; justify-content: center; margin-top: 20px;">{{$maps->links()}}</div>
    </div>
@endsection
