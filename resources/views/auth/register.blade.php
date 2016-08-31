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
                   <h3 class="text-center m-t-10 text-white"> Create a new Account </h3>
                </div>
                <div class="panel-body">
                    <form role="form" method="POST" class="form-horizontal m-t-20" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <input id="name" type="text" placeholder="Name" class="form-control input-lg" name="name" value="{{ old('name') }}">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <input id="email" type="email" placeholder="Email" class="form-control input-lg" name="email" value="{{ old('email') }}">
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <input id="password" type="password" placeholder="Password" class="form-control input-lg" name="password">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="col-xs-12">
                                <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control input-lg" name="password_confirmation">
                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group ">
                            <div class="col-xs-12">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox-signup" type="checkbox">
                                    <label for="checkbox-signup">
                                        I accept <a href="#">Terms and Conditions</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-40">
                            <div class="col-xs-12">
                                <button class="btn btn-primary waves-effect waves-light btn-lg w-lg" type="submit">Register</button>
                            </div>
                        </div>
                        <div class="form-group m-t-30">
                            <div class="col-sm-12 text-center">
                                <a href="{{ url('/login') }}">Already have account?</a>
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