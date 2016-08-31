<?php $__env->startSection('content'); ?>
    <!-- Start Widget -->
    <div class="row">
        <?php foreach($reports as $key => $value): ?>
          <div class="col-md-2 col-sm-2 col-lg-3">
              <a href="<?php echo e(url('admin/report/'.$key)); ?>">
                  <div class="mini-stat clearfix bx-shadow">
                      <span class="mini-stat-icon bg-info"><i class="fa fa-file-text"></i></span>
                      <div class="tiles-progress">
                          <div class="m-t-20">
                              <h5 class="text-uppercase"><?php echo e($value); ?></h5>
                          </div>
                      </div>
                  </div>
              </a>
          </div>
        <?php endforeach; ?>
    </div>
    <!-- End row-->

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>