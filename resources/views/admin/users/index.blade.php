@extends('index')

@section('contentheader_title','Master User')

@section('customcss')
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/datatables/jquery.dataTables.min.css') }}">
@endsection

@section('content')
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-body">
           <div class="table">
               <table class="table table-striped table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td> {{$loop->index + 1 }} </td>
                                <td> {{$user->name }} </td>
                                <td> {{$user->email }} </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="pull-right">
                    {!! $users->links() !!}
                </div>
           </div>
        </div>
        <!-- /.box-body -->
@endsection