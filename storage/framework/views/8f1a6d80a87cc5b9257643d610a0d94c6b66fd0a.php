<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Moltran - Responsive Admin Dashboard Template</title>
        <!-- Bootstrap 3.3.5 -->
        <?php echo Html::style(asset('css/bootstrap.min.css')); ?>

        <!-- Font Awesome -->
        <?php echo Html::style(asset('assets/font-awesome/css/font-awesome.min.css')); ?>

        <?php echo Html::style(asset('assets/ionicon/css/ionicons.min.css')); ?>

        <?php echo Html::style(asset('css/material-design-iconic-font.min.css')); ?>


        <?php echo Html::style(asset('css/animate.css')); ?>

        <?php echo Html::style(asset('css/waves-effect.css')); ?>

        <?php echo Html::style(asset('css/helper.css')); ?>

        <?php echo Html::style(asset('css/style.css')); ?>


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                <?php echo Html::style('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js'); ?>

                <?php echo Html::style('https://oss.maxcdn.com/respond/1.4.2/respond.min.js'); ?>

        <![endif]-->

        <?php echo HTML::script(asset('js/modernizr.min.js'));; ?>


    </head>
    <body>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">
                <div class="panel-heading bg-img">
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Sign In to <strong>Satellite Computer</strong> </h3>
                </div>
                <div class="panel-body">
                    <?php echo Form::open(['url' => '/login', 'method' => 'POST', 'class' => 'form-horizontal m-t-20']); ?>


                    <?php echo e(csrf_field()); ?>

                        <div class="col-xs-12">
                            <?php if(Session::has('error')): ?>
                                <div class="alert alert-danger alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <p><?php echo e(Session::get('error')); ?></p>
                                </div>
                            <?php endif; ?>
                        </div>
                        <div class="form-group <?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <div class="col-xs-12">
                                <?php echo Form::email('email', old('email'), ['class' => 'form-control input-lg', 'placeholder' => 'Email']); ?>

                                <?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>
                        </div>

                        <div class="form-group <?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <div class="col-xs-12">
                                <?php echo Form::password('password', ['class' => 'form-control input-lg', 'placeholder' => 'Password']); ?>

                            <?php if($errors->has('password')): ?>
                                <span class="help-block">
                                    <strong><?php echo e($errors->first('password')); ?></strong>
                                </span>
                            <?php endif; ?>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-success">
                                    <?php echo Form::checkbox('remember', null); ?>

                                    <label for="checkbox-signup">
                                        Remember me
                                    </label>
                                </div>
                            </div><!-- /.col -->
                        </div>

                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-success btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
                            </div>
                        </div>

                        <div class="form-group m-t-30">
                            <div class="col-sm-7">
                                <a href="<?php echo e(url('/password/reset')); ?>"><i class="fa fa-lock m-r-5"></i> Forgot your password?</a>
                            </div>
                            <div class="col-sm-5 text-right">
                                <a href="<?php echo e(url('/register')); ?>">Create an account</a>
                            </div>
                        </div>

                    <?php echo Form::close(); ?>

                </div>
            </div><!-- /.login-box-body -->
        </div><!-- /.login-box -->

        <script>
            var resizefunc = [];
        </script>
        <?php echo HTML::script(asset('js/jquery.min.js'));; ?>

        <?php echo HTML::script(asset('js/bootstrap.min.js'));; ?>

        <?php echo HTML::script(asset('js/waves.js'));; ?>

        <?php echo HTML::script(asset('js/wow.min.js'));; ?>

        <?php echo HTML::script(asset('js/jquery.nicescroll.js'));; ?>

        <?php echo HTML::script(asset('js/jquery.scrollTo.min.js'));; ?>

        <?php echo HTML::script(asset('assets/jquery-detectmobile/detect.js'));; ?>

        <?php echo HTML::script(asset('assets/fastclick/fastclick.js'));; ?>

        <?php echo HTML::script(asset('assets/jquery-slimscroll/jquery.slimscroll.js'));; ?>

        <?php echo HTML::script(asset('assets/jquery-blockui/jquery.blockUI.js'));; ?>

    </body>
</html>
