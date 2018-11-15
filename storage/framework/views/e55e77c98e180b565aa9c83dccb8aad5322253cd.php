<?php $__env->startSection('contentheader_title','Master User'); ?>

<?php $__env->startSection('customcss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/datatables/dataTables.bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('/plugins/datatables/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
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
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td> <?php echo e($loop->index + 1); ?> </td>
                                <td> <?php echo e($user->name); ?> </td>
                                <td> <?php echo e($user->email); ?> </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
                <div class="pull-right">
                    <?php echo $users->links(); ?>

                </div>
           </div>
        </div>
        <!-- /.box-body -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>