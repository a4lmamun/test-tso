@extends('app')
@php($is_edit = isset($tso))

@section('title', $is_edit ? "Edit" : "Create")

@section('body')
    <div class="py-2">
        <div class="py-2 bg-light">
            <form class="m-5" method="POST" action="{{$is_edit ? action('TSOController@update', $tso->id) : action('TSOController@store')}}">
                @csrf
                @if($is_edit)
                    @method('PUT')
                @endif

                <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name" required placeholder="Name" value="{{$is_edit ? $tso->name : old('name')}}">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="phone" class="col-sm-2 col-form-label">Phone</label>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="mobile_no" required id="phone" placeholder="Phone" value="{{$is_edit ? $tso->mobile_no : old('mobile_no')}}">
                        @if($errors->has('mobile_no'))
                            <small class="form-text text-muted">{{$errors->first('mobile_no')}}</small>
                        @endif
                    </div>
                </div>
                <div class="form-group row">
                    <label for="is_active" class="col-sm-2 col-form-label">Is Active?</label>
                    <div class="col-sm-1">
                        <input type="checkbox" class="form-control" id="is_active" name="is_active" {{$is_edit ? $tso->is_active == 1 ? 'checked' : '' : 'checked' }}>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="hrid" class="col-sm-2 col-form-label">HR ID</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="hr_id" id="hrid" placeholder="HR ID" value="{{$is_edit ? $tso->hr_id : old('hr_id')}}">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>
@endsection
