
@extends('layouts.app')

@section('content')

<div class="mt-5">
    <div class="col-md-5 offset-md-4">
        <div class="card mb-3 bg-dark">
            <div class="card-header text-white">
                <h3 class="card-title font-weight-light"><i class="fa fa-user"></i> User Info</h3>
            </div>
            <div class="card-body text-white">
                <table class="table table-dark table-borderless">
                    <tr>
                        <td>Name : </td>
                        <td>{{$user->name}}</td>
                    </tr>
                    <tr>
                        <td>Username : </td>
                        <td>{{$user->username}}</td>
                    </tr>
                    <tr>
                        <td>Registered Date : </td>
                        <td>{{date("Y-m-d g:i A", strtotime($user->created_at))}}</td>
                    </tr>
                    <tr>
                        <td>Created Notes : </td>
                        <td>{{$notes = $user->notes()->count()}}   &nbsp; 
                            @if ($notes > 0)
                                <a href="" class="badge badge-primary">View Notes <i class="fa fa-angle-double-right"></i></a>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>Role : </td>
                        @if ($user->role == 1)
                            <td><span class="badge badge-info">Admin</span> </td>
                        @else
                            <td><span class="badge badge-light">Normal</span></td>
                        @endif
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>


@stop