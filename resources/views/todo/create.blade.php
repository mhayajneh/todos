@extends('layout')

@section('content')
    <section class="content-header">
        <h1>
            Todo Task
        </h1>
    </section>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="content">
        <div class="box box-primary">
            <form method="POST" action="{{route('todo.store')}}">
                @csrf
                <div class="form-group" >
                    <label>Name</label>
                    <input type="text" class="form-control"  value="{{old('name')}}" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description" rows="3">{{old('description')}}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">
                    Save</button>
                <button type="button" class="btn btn-default" onclick="window.location='{{ URL::previous() }}'">
                 Return</button>

            </form>
        </div>
    </div>
@endsection
