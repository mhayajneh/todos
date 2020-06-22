@extends('layout')

@section('content')

    <section class="content-header">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <h1 class="pull-left">
                Todo Task
        </h1>
        <a class="btn btn-primary pull-right" style="margin-top: -10px;margin-bottom: 5px" href="{{ route('todo.create') }}">
            <i class="glyphicon glyphicon-plus">Create
            </i>
        </a>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="table-responsive">

                <table class="table able-hover col-lg-12">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Created At</th>
                        <th>Updated At</th>
                        <th colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($todos as $todo)
                        <tr>
                            <td>{!! $todo->name !!}</td>
                            <td>{!! $todo->description !!}</td>
                            <td>{!! $todo->created_at !!}</td>
                            <td>{!! $todo->updated_at !!}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Button group">
                                    <a class="btn btn-default btn-xs" href="{{ route('todo.edit', $todo->id) }}">Edit</a>
                                    <div class="col-xs-2">
                                        <form action="{{ route('todo.destroy', $todo->id) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-danger btn-xs" onClick="return confirm('Are you sure you want to delete?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $todos->links() }}
        <div class="text-center">

        </div>
    </div>
@endsection
