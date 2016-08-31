<a href="<?php echo e(isset($editUrl) ? $editUrl : 'javascript:void(0)'); ?>" class="btn btn-primary btn-flat"><i class="fa fa-edit"></i></a>

<?php if(isset($deleteUrl)): ?>
    <?php echo Form::open([
            'url' => $deleteUrl,
            'method' => 'DELETE',
            'class' => 'inline',
            'style' => 'display:inline;'
        ]); ?>

        <button type="submit" id="sa-params" class="btn btn-danger btn-flat"><i class="fa fa-trash"></i></button>
    <?php echo Form::close(); ?>

<?php endif; ?>
