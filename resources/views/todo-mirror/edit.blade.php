@extends('layout')

@section('content')
    <section class="content-header">
        <h1>
            Edit Todo Mirror Task
        </h1>
    </section>

    <div class="content">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="box box-primary">
            <form method="POST" action="{{route('todo_mirror.update', $todo->id)}}">
                @csrf
                <input type="hidden" name="_method" value="PUT">
                <div class="form-group" >
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" value="{{$todo->name}}">
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3">@if(isset($todo->description)){{$todo->description}}@endif</textarea>

                </div>
                <button type="submit" class="btn btn-primary">
                    Save</button>
                <button type="button" class="btn btn-default" onclick="window.location='{{ URL::previous() }}'">
                    Cancel</button>
            </form>
        </div>
    </div>
@endsection
