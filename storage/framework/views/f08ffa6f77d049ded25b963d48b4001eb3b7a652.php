<?php $__env->startSection('content'); ?>
  <!-- Form-validation -->
  <div class="row">
      <div class="col-sm-12">
          <div class="panel panel-default">
              <div class="panel-heading"><h3 class="panel-title">Company Detail</h3></div>
              <div class="panel-body">
                  <?php echo Form::model($company, [
                          'route' => $route,
                          'method' => $method,
                          'files' => true,
                          'id' => 'companyForm',
                          'novalidate' => 'novalidate'
                      ]); ?>

                      <?php echo e(csrf_field()); ?>

                      <div class="row">
                          <div class="col-lg-12">
                              <?php if(count($errors) > 0): ?>
                                  <div class="alert alert-danger alert-dismissable">
                                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                      <ul>
                                          <?php foreach($errors->all() as $error): ?>
                                              <li><?php echo e($error); ?></li>
                                          <?php endforeach; ?>
                                      </ul>
                                  </div>
                              <?php endif; ?>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label for="name">Name *</label>
                                  <?php echo e(Form::text('name', null, ['class' => 'form-control', 'id' => 'name'])); ?>

                              </div>
                              <div class="form-group">
                                  <label for="email">Email *</label>
                                  <?php echo e(Form::text('email', null, ['class' => 'form-control', 'id' =>'email'])); ?>

                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group ">
                                  <label for="address">Address *</label>
                                  <?php echo e(Form::textarea('address', null, ['class' => 'form-control', 'id' =>'address', 'rows'=>'5'])); ?>

                              </div>
                          </div>
                      </div>
                      <div class="row">
                          <div class="col-lg-6">
                              <div class="form-group">
                                  <label for="website">Website *</label>
                                  <?php echo e(Form::text('website', null, ['class' => 'form-control', 'id' =>'website'])); ?>

                              </div>
                              <div class="form-group">
                                  <label for="proffesion">Proffesion *</label>
                                  <?php echo e(Form::text('proffesion', null, ['class' => 'form-control', 'id' =>'proffesion'])); ?>

                              </div>
                          </div>
                          <div class="col-lg-6">
                              <div class="form-group ">
                                  <label for="phone">Phone *</label>
                                  <?php echo e(Form::text('phone', null, ['class' => 'form-control', 'id' =>'phone'])); ?>

                              </div>
                                  <label for="mobile">Mobile *</label>
                                  <div class="form-group ">
                                  <?php echo e(Form::text('mobile', null, ['class' => 'form-control', 'id' =>'mobile'])); ?>

                              </div>
                              <div class="form-group">
                                  <label for="logo">Logo *</label>
                                  <?php echo e(Form::file('logo', null, ['class' => 'form-control', 'id' =>'logo'])); ?>

                              </div>
                          </div>
                        </div>
                        <hr/>
                        <div class="form-group">
                            <div class="col-lg-10">
                                <button class="btn btn-success waves-effect waves-light" type="submit">Save</button>
                                <a href="<?php echo e(url('admin/company')); ?>" class="btn btn-default waves-effect" type="button">Cancel</a>
                            </div>
                        </div>
                  <?php echo Form::close(); ?>

              </div> <!-- panel-body -->
          </div> <!-- panel -->
      </div> <!-- col -->

  </div> <!-- End row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>