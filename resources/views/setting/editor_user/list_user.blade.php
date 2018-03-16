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
                                <th scope="col1">Edit User</th>
                                <th scope="col1">Delete User</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user_editors as $user_editor)
                                <tr>
                                    <th>{{ $user_editor->name }}</th>
                                    <td></td>
                                    <td>
                                        <button type="button" class="btn btn-info">
                                            <a href="{{ url('setting/report/users//edit') }}">
                                                Edit User
                                            </a>
                                        </button>
                                    </td>
                                    <td>
                                        <button type="submit" class="btn btn-danger">
                                            <a href="{{ url('setting/report/delete_report_users/') }}"
                                               onclick="return confirm('Confrim Delete ?')">
                                                Delete User
                                            </a>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    <?php // {!! $users->render() !!} ?>
                    <!--{{ csrf_field() }}
                    {!! Form::close() !!} -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection