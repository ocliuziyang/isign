<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('backend.title') }} | Login </title>

    <!-- Bootstrap -->
    <link href="/assets/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="/assets/gentelella/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="/assets/gentelella/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="/assets/gentelella/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="/assets/gentelella/build/css/custom.min.css" rel="stylesheet">
</head>

<body class="login">
<div>
    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                <form method="post" action="{{ route('admin.login') }}">
                    {{ csrf_field() }}
                    <h1>{{ config('backend.title') }} Login Form</h1>
                    <div>
                        <input type="text" name="phoneNumber" class="form-control" placeholder="phoneNumber" required="true" />
                    </div>
                    <div>
                        <input type="password" name="password" class="form-control" placeholder="Password" required="true" />
                    </div>
                    <div>
                        <button class="btn btn-primary btn-block">Log in</button>
                    </div>

                    <div class="clearfix"></div>
                </form>
                @include('admin._partial.errors')
                @include('admin._partial.success')
            </section>
        </div>

    </div>
</div>

<script src="//cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
    $(document).ready(function () {
        $('.alert').delay(2000).hide('slow');
    });

</script>
</body>
</html>
