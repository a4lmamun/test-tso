@extends('app')

@section('body')
    <div>
        @if(isset($success))
            <div class="alert alert-success" role="alert">
                {{$success}}
            </div>
        @endif

        <a type="button" href="{{url('/tsos/create')}}" class="btn btn-outline-primary" style="margin-bottom: 20px;">Add New</a>

        <table class="table">
            <thead>
            <tr>
                <th>Name</th>
                <th>Mobile</th>
                <th>Active?</th>
                <th>HR ID</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tsos as $tso)
                <tr>
                    <td>{{$tso->name}}</td>
                    <td>{{$tso->mobile_no}}</td>
                    <td>{{$tso->is_active === 1 ? 'Active' : 'Inactive'}}</td>
                    <td>{{$tso->hr_id}}</td>
                    <td><a href="{{ action('TSOController@edit', $tso->id) }}">Edit</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div style="display: flex; justify-content: center; margin-top: 20px;">{{$tsos->links()}}</div>
    </div>
@endsection
