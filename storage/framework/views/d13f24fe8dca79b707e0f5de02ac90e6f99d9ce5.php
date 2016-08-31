<?php $__env->startSection('css'); ?>
    <!-- Plugin Css-->
    <?php echo Html::style(asset('assets/datatables/jquery.dataTables.min.css')); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="panel">
        <div class="panel-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="m-b-30">
                        <a href="<?php echo e(route('admin.company.create')); ?>" class="btn btn-primary waves-effect waves-light">Add <i class="fa fa-plus"></i></a>
                    </div>
                </div>
            </div>
            <table id="company-table" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
            </table>
        </div>
        <!-- end: page -->

    </div> <!-- end Panel -->

<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>
    <!-- Examples -->
    <?php echo HTML::script(asset('assets/datatables/jquery.dataTables.min.js'));; ?>

    <?php echo HTML::script(asset('assets/datatables/dataTables.bootstrap.js'));; ?>


    <script>
        var _oTable = $('#company-table').DataTable({
            processing: true,
            serverSide: true,
            order: [[ 0, 'desc' ]],
            ajax: '<?php echo route('admin.company.getData'); ?>',
            columns: [
                // {data: '', name: '', orderable: false, searchable: false, sClass: "text-center"},
                {data: 'id', name: 'id'},
                {data: 'name', name: 'name'},
                {data: 'email', name: 'email'},
                {data: 'mobile', name: 'mobile'},
                {data: 'created_at', name: 'created_at'},
                {data: 'action', name: 'action', orderable: false, searchable: false}
            ]
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>