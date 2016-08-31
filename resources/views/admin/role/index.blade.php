@extends('admin.layouts.app')

@section('css')
    <!-- Plugin Css-->
    {!! Html::style(asset('assets/datatables/jquery.dataTables.min.css')) !!}
@endsection

@section('content')
    <div class="panel">

        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="m-b-30">
                        <a href="{!! route('admin.role.create') !!}" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <table id="role-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Title</th>
                        <th>Created By</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- end: page -->

    </div> <!-- end Panel -->

@endsection

@section('js')
    <!-- Examples -->
    {!! HTML::script(asset('assets/datatables/jquery.dataTables.min.js')); !!}
    {!! HTML::script(asset('assets/datatables/dataTables.bootstrap.js')); !!}

    <script>
        var _oTable = $('#role-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[ 0, 'desc' ]],
            ajax: '{!! route('admin.role.getData') !!}',
            columns: [
                // {data: '', name: '', orderable: false, searchable: false, sClass: "text-center"},
                {data: 'id', name: 'id'},
                {data: 'title', name: 'title'},
                {data: 'created_by', name: 'created_by'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
@endsection
