@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">Search Option</div>
                    <div class="panel-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-default">
                    <div class="panel-heading">List User Editor</div>

                    <div class="panel-body">
                    <!--{!! Form::open(['url' => '#', 'files' => false]) !!} -->
                        <table class="table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Restaurant</th>
                                <th scope="col">Add Restaurant</th>
                                <th scope="col1">Delete Restaurant</th>
                                <th scope="col1">Delete User</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($user_editors as $indexKey => $user_editor)
                                <tr>
                                    <td>{{ $user_editor->name }}</td>
                                    <td>{{ $restaurants[$indexKey] }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info">
                                            <a href="{{ url('setting/editor/users_editor/'.$user_editor->id.'/add') }}">
                                                Add  Restaurant
                                            </a>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-warning">
                                            <a href="{{ url('setting/editor/users/'.$user_editor->id.'/edit') }}">
                                                Delete  Restaurant
                                            </a>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger">
                                            <a href="{{ url('setting/editor/delete_editor_users/'.$user_editor->id) }}"
                                               onclick="return confirm('Confrim Delete ?')">
                                                Delete User
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                    {!! $user_editors->render() !!}
                    <!--{{ csrf_field() }}
                    {!! Form::close() !!} -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection