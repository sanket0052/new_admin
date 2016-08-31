<?php $__env->startSection('content'); ?>
  <!-- Form-validation -->
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading"><h3 class="panel-title"><?php echo e(isset($data) ? $type.' File Listing' : config('report.report_title.'.$type).' - '.$file); ?></h3></div>
        <div class="panel-body">
          <?php if($listing == true): ?>
            <?php if(isset($data) && !empty($data)): ?>
              <div class="list-group">
                  <?php foreach($data as $key => $value): ?>
                    <a href="<?php echo e(url('admin/report/view/'.$type.'/'.$key)); ?>" class="list-group-item"><?php echo e($key); ?></a>
                  <?php endforeach; ?>
              </div>
            <?php else: ?>
              <p>No Directory Exist.</p>
            <?php endif; ?>
          <?php endif; ?>
          <?php if(isset($dataExcel)): ?>
            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                  <table class="table">
                    <?php if($type == 'ledger'): ?>
                      <?php foreach($dataExcel as $key => $value): ?>
                        <tbody> 
                          <?php foreach($value as $ke => $va): ?>
                            <?php if($ke==0): ?>
                              <tr>
                                <?php foreach($va as $k => $val): ?>
                                  <th><?php echo e(ucwords(str_replace('_', ' ', $k))); ?></th>
                                <?php endforeach; ?>
                              </tr>
                            <?php else: ?>
                              <tr>
                                <?php foreach($va as $k => $val): ?>
                                  <td><?php echo e($val); ?></td>
                                <?php endforeach; ?>
                              </tr>
                            <?php endif; ?>
                          <?php endforeach; ?>
                        <tbody>
                      <?php endforeach; ?>
                    <?php elseif($type == 'stock'): ?>
                      <tbody>
                        <?php foreach($dataExcel as $key => $value): ?>
                          <?php if($key==0): ?>
                            <tr>
                              <?php foreach($value as $ke => $va): ?>
                                <?php if($ke != 'parent'): ?>
                                  <th><?php echo e(ucwords(str_replace('_', ' ', $ke))); ?></th>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </tr>
                          <?php endif; ?>
                          <tr>
                            <?php if($value->parent != 'Yes'): ?>
                              <?php foreach($value as $ke => $va): ?>
                                <?php if($ke != 'parent'): ?>
                                  <td><?php echo e($va); ?></td>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            <?php else: ?>
                              <?php foreach($value as $ke => $va): ?>
                                <?php if($ke != 'parent'): ?> 
                                  <th><?php echo e(ucwords($va)); ?></th>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </tr>
                        <?php endforeach; ?>
                      <tbody>
                    <?php elseif($type == 'extra'): ?>
                      <tbody>
                        <?php foreach($dataExcel as $key => $value): ?>
                          <?php if($key==0): ?>
                            <tr>
                              <?php foreach($value as $ke => $va): ?>
                                <?php if($ke != 'parent'): ?>
                                  <th><?php echo e(ucwords(str_replace('_', ' ', $ke))); ?></th>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            </tr>
                          <?php endif; ?>
                          <tr>
                            <?php if($value->parent != 'Yes'): ?>
                              <?php foreach($value as $ke => $va): ?>
                                <?php if($ke != 'parent'): ?>
                                  <td><?php echo e($va); ?></td>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            <?php else: ?>
                              <?php foreach($value as $ke => $va): ?>
                                <?php if($ke != 'parent'): ?> 
                                  <th><?php echo e(ucwords($va)); ?></th>
                                <?php endif; ?>
                              <?php endforeach; ?>
                            <?php endif; ?>
                          </tr>
                        <?php endforeach; ?>
                      <tbody>
                    <?php elseif($type == 'sales'): ?>
                      <tbody>
                        <?php foreach($dataExcel as $key => $value): ?>
                          <?php if($key==0): ?>
                            <tr>
                              <?php foreach($value as $ke => $va): ?>
                                <th><?php echo e(ucwords(str_replace('_', ' ', $ke))); ?></th>
                              <?php endforeach; ?>
                            </tr>
                          <?php endif; ?>
                          <tr>
                            <?php foreach($value as $ke => $va): ?>
                              <td><?php echo e($va); ?></td>
                            <?php endforeach; ?>
                          </tr>
                        <?php endforeach; ?>
                      <tbody>
                    <?php elseif($type == 'reorder'): ?>
                      <tbody>
                        <?php foreach($dataExcel as $key => $value): ?>
                          <?php if($key==0): ?>
                            <tr>
                              <?php foreach($value as $ke => $va): ?>
                                <th><?php echo e(ucwords(str_replace('_', ' ', $ke))); ?></th>
                              <?php endforeach; ?>
                            </tr>
                          <?php endif; ?>
                          <tr>
                            <?php foreach($value as $ke => $va): ?>
                              <td><?php echo e($va); ?></td>
                            <?php endforeach; ?>
                          </tr>
                        <?php endforeach; ?>
                      <tbody>
                    <?php elseif($type == 'price'): ?>
                      <tbody>
                        <?php foreach($dataExcel as $key => $value): ?>
                          <?php if($key==0): ?>
                            <tr>
                              <?php foreach($value as $ke => $va): ?>
                                <th><?php echo e(ucwords(str_replace('_', ' ', $ke))); ?></th>
                              <?php endforeach; ?>
                            </tr>
                          <?php endif; ?>
                          <tr>
                            <?php foreach($value as $ke => $va): ?>
                              <td><?php echo e($va); ?></td>
                            <?php endforeach; ?>
                          </tr>
                        <?php endforeach; ?>
                      <tbody>
                    <?php endif; ?>
                  </table>
                </div>
              </div>
            </div>
          <?php endif; ?>
        </div> <!-- panel-body -->
      </div> <!-- panel -->
    </div> <!-- col -->
  </div> <!-- End row -->
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>