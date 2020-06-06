@extends('app')

@section('body')
    <a type="button" href="{{url('/tsos')}}" class="btn btn-outline-primary">TSOs List</a>
    <a type="button" href="{{url('/tso-mapping')}}" class="btn btn-outline-info">TSO Thana Mapping</a>
@endsection
