<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="images/favicon_1.ico">

        <title>Register</title>
        {!! Html::style(asset('css/bootstrap.min.css')) !!}
        {!! Html::style(asset('assets/font-awesome/css/font-awesome.min.css')) !!}
        {!! Html::style(asset('assets/ionicon/css/ionicons.min.css')) !!}
        {!! Html::style(asset('css/material-design-iconic-font.min.css')) !!}
        {!! Html::style(asset('css/animate.css')) !!}
        {!! Html::style(asset('css/waves-effect.css')) !!}
        {!! Html::style(asset('css/helper.css')) !!}
        {!! Html::style(asset('css/style.css')) !!}
        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
                {!! Html::script('https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js') !!}
                {!! Html::script('https://oss.maxcdn.com/respond/1.4.2/respond.min.js') !!}
        <![endif]-->
        {!! HTML::script(asset('js/modernizr.min.js')); !!}
    </head>
    <body>
        <div class="wrapper-page">
            <div class="panel panel-color panel-primary panel-pages">

                <div class="panel-heading bg-img"> 
                    <div class="bg-overlay"></div>
                    <h3 class="text-center m-t-10 text-white"> Reset Password </h3>
                </div> 

                <div class="panel-body">
                    <form class="text-center" role="form" method="POST" action="{{ url('/password/email') }}">
                        {{ csrf_field() }}
                        <div class="form-group m-b-0"> 
                            @if (session('status'))
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            @endif
                            @if ($errors->has('email'))
                                <div class="alert alert-info alert-dismissable">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    {{ $errors->first('email') }}
                                </div>
                            @endif
                            <div class="form-group m-b-0 {{ $errors->has('email') ? ' has-error' : '' }}">
                                <div class="input-group"> 
                                    <input id="email" type="email" placeholder="Enter Email" class="form-control input-lg" name="email" value="{{ old('email') }}">
                                    <span class="input-group-btn"> <button type="submit" class="btn btn-lg btn-primary waves-effect waves-light">Reset</button> </span> 
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            var resizefunc = [];
        </script>
        {!! HTML::script(asset('js/jquery.min.js')) !!}
        {!! HTML::script(asset('js/bootstrap.min.js')) !!}
        {!! HTML::script(asset('js/waves.js')) !!}
        {!! HTML::script(asset('js/wow.min.js')) !!}
        {!! HTML::script(asset('js/jquery.nicescroll.js" type="text/javascript')) !!}
        {!! HTML::script(asset('js/jquery.scrollTo.min.js')) !!}
        {!! HTML::script(asset('assets/jquery-detectmobile/detect.js')) !!}
        {!! HTML::script(asset('assets/fastclick/fastclick.js')) !!}
        {!! HTML::script(asset('assets/jquery-slimscroll/jquery.slimscroll.js')) !!}
        {!! HTML::script(asset('assets/jquery-blockui/jquery.blockUI.js')) !!}

    </body>
</html>