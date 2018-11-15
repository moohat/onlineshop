<?php $__env->startSection('contentheader_title','Master Produk'); ?>

<?php $__env->startSection('customcss'); ?>
<link rel="stylesheet" href="<?php echo e(asset('public/plugins/datatables/dataTables.bootstrap.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('public/plugins/datatables/jquery.dataTables.min.css')); ?>">
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.css" rel="stylesheet">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<!-- Default box -->
<div class="box box-primary">
    <div class="box-body">
        
       <div>
        <?php if($errors->any()): ?>
        <div class="alert alert-danger">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
        <?php endif; ?>
    </div>
    
    <div>
        <button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#modal-insert">
            <span class="fa fa-plus"></span> Tambah Data
        </button>
    </div>

    <br>

    <div class="table">
     <table class="table table-striped table-hover table-responsive" id="table">
        <thead>
            <tr>
                <th style="text-align: center;">No.</th>
                <th>Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Deskripsi</th>
                <th class="text-center nosort">Opsi</th>
            </tr>
        </thead>
        <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                <td> <?php echo e($loop->index +1); ?> </td>
                <td> <?php echo e(ucfirst($result->product)); ?> </td>
                <td>Rp. <?php echo e(number_format($result->price,0,'.','.')); ?> </td>
                <td> <?php echo e($result->stock); ?> </td>
                <td> <?php echo str_limit( $result->description,10,'...' ); ?> </td>     
                <td> 
                <a href="<?php echo e(route('product.show', $result->id)); ?>" class="btn btn-primary btn-xs">
                <span class="fa fa-external-link" title="Lihat">
                </span>
                </a>
            <a href="#modal-edit" class="btn btn-warning btn-xs edit" data-toggle="modal" data-id="<?php echo e($result->id); ?>" data-product="<?php echo e($result->product); ?>" data-price="<?php echo e($result->price); ?>"
                    data-stock="<?php echo e($result->stock); ?>" data-description="<?php echo e($result->description); ?>"  >
                    <span class="fa fa-edit" title="Edit"></span>
                </a>

                 </td>     
        
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
    <div class="pull-right">
            <?php echo $products->links(); ?>

        </div>
</div>


<!-- Modal insert-->
<div id="modal-insert" class="modal fade" role="dialog">

   
    <div class="modal-dialog"> 
           

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('products.store')); ?>" method="post" class="form" enctype="multipart/form-data">

                    <?php echo csrf_field(); ?>

                    <div class="form-group">
                        <label for="">Nama Produk <span class="label-required">*</span></label>
                        <input type="text" name="product" class="form-control input-sm" placeholder="Nama Produk..." required maxlength="60" value="<?php echo e(old('product')); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Harga <span class="label-required">*</span></label>
                        <input type="number" name="price" class="form-control input-sm" placeholder="Harga Produk..." required min="0" max="9999999999" value="<?php echo e(old('price')); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Stok <span class="label-required">*</span></label>
                        <input type="number" name="stock" class="form-control input-sm" placeholder="Stok Produk..." required min="0" max="9999999999" value="<?php echo e(old('stock')); ?>">
                    </div>

                    <div class="form-group">
                        <label for="">Gambar</label>
                        <input type="file" name="images[]" id="images" class="form-control input-sm" multiple accept="images/*">
                    </div>

                    <div class="form-group">
                        <label for="">Deskripsi</label>
                        <textarea id="summernote" class="summernote form-control" name="description"><?php echo e(old('description')); ?></textarea>
                    </div>

                    <hr>
                    <input type="submit" value="Simpan" class="btn btn-success btn-md">
                </form>
            </div>
        </div>

    </div>
</div>
 <!-- Modal edit-->
 <div id="modal-edit" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Data</h4>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" class="form" enctype="multipart/form-data">

                        <?php echo csrf_field(); ?>
                        <input type="hidden" name="id" id="id-product" value="">
                        <div class="form-group">
                            <label for="">Nama Produk <span class="label-required">*</span></label>
                            <input type="text" name="product" id="product" class="form-control input-sm" placeholder="Nama Produk..." required maxlength="60" value="<?php echo e(old('product')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Harga <span class="label-required">*</span></label>
                            <input type="number" name="price" id="price" class="form-control input-sm" placeholder="Harga Produk..." required min="0" max="9999999999" value="<?php echo e(old('price')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Stok <span class="label-required">*</span></label>
                            <input type="number" name="stock" id="stock" class="form-control input-sm" placeholder="Stok Produk..." required min="0" max="9999999999" value="<?php echo e(old('stock')); ?>">
                        </div>

                        <div class="form-group">
                            <label for="">Gambar</label>
                            <input type="file" name="images[]" id="images" class="form-control input-sm" multiple accept="images/*">
                        </div>

                        <div class="form-group">
                            <label for="">Deskripsi</label>
                            <textarea id="summernote-edit" class="summernote" name="description" id="description"><?php echo e(old('description')); ?></textarea>
                        </div>

                        <hr>
                        <input type="submit" value="Ubah" class="btn btn-primary btn-md ">
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('customscript'); ?>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables/jquery.dataTables.min.js')); ?>"></script>
<script type="text/javascript" src="<?php echo e(asset('public/plugins/datatables/dataTables.bootstrap.min.js')); ?>"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
      $('.summernote').summernote();
  
    $('#table').on('click', '.edit', function() {
          
          const id = $(this).data('id');
          const product = $(this).data('product');
          const price = $(this).data('price');
          const stock = $(this).data('stock');
          const description = $(this).data('description');
    
          $('#modal-edit').find('#id-product').val(id);
          $('#modal-edit').find('#product').val(product);
          $('#modal-edit').find('#stock').val(stock);
          $('#modal-edit').find('#price').val(price);
          $('#modal-edit').find('#id').val(id);
          $('#summernote-edit').summernote('code', description);
      });
  });


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('index', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>