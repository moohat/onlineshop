<?php $__env->startSection("contentheader_title"); ?>
    Detail Produk <?php echo e(ucfirst($product->product)); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('customcss'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/datatables/dataTables.bootstrap.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('public/plugins/datatables/jquery.dataTables.min.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-body">
            <div>
                <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary btn-sm"> <span class="fa fa-angle-left"></span> Kembali</a>
            </div>
            <br>
           <div class="table">
               <table class="table table-striped table-hover table-responsive" id="table">
                    <thead>
                        <tr>
                            <th style="text-align: center;">No.</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__empty_1 = true; $__currentLoopData = $product->imageRelation; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr>
                            <td style="text-align: center;"><?php echo e($loop->index + 1); ?></td>
                            <td>
                                <img src="<?php echo e(asset('public/uploads/'.$data->image)); ?>" alt="<?php echo e($data->image); ?>" height="250px">
                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr> <td colspan="2" style="text-align:center"> Gambar tidak ada </td></tr>
                        <?php endif; ?>
                    </tbody>
                </table>
           </div>
        </div>
        <!-- /.box-body -->
    </div>
<!-- /.box -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customscript'); ?>
    <script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>