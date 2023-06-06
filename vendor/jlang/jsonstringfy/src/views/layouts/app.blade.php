<!DOCTYPE html />
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html class="no-js" lang="en" />
<!--<![endif]-->
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1' />
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords" content="HTML5 Template created by Elias" />
    <title>Project Installer</title>

    <link rel="icon" type="image/png" href="{{ asset('https://cdn.jsdelivr.net/gh/uncannyMBM/installer/images/title-icon.png') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.jsdelivr.net/gh/uncannyMBM/installer/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.jsdelivr.net/gh/uncannyMBM/installer/css/font-awesome.min.css') }}" />
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:400,400i,700,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('https://cdn.jsdelivr.net/gh/uncannyMBM/installer/css/styles.css') }}" />
<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script type="application/javascript" src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script type="application/javascript" src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

<section id="main">
    <div class="wrapper">
        <div class="content">
            @section('content')
            @show
        </div>
    </div>
</section>
<script type="application/javascript" src="{{ asset('https://cdn.jsdelivr.net/gh/uncannyMBM/installer/js/jquery-3.5.1.min.js') }}"></script>
<script type="application/javascript" src="{{ asset('https://cdn.jsdelivr.net/gh/uncannyMBM/installer/js/bootstrap.min.js') }}"></script>
</body>
</html>
