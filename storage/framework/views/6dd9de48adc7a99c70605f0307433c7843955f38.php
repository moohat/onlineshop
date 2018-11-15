<?php $__env->startSection('contentheader_title', 'Master User'); ?>



<?php $__env->startSection('customcss'); ?>


<?php $__env->stopSection(); ?>


<?php $__env->startSection('customscript'); ?>


<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>
<!-- Default box -->
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Title</h3>

		<div class="box-tools pull-right">
			<button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
				<i class="fa fa-minus"></i></button>
				<button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
					<i class="fa fa-times"></i></button>
				</div>
			</div>
			<div class="box-body">
				Start creating your amazing application!
			</div>
			<!-- /.box-body -->
			<div class="box-footer">
				Footer
			</div>
			<!-- /.box-footer-->
		</div>
		<!-- /.box -->

		<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>