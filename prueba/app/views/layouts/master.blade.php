<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>
@section('titulo')
	titulo desde el templeit
@show
</title>
 	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	{{ HTML::style('assets/css/bootstrap.min.css', array('media' => 'screen')) }}
</head>

    <body>
        <div id="contenido">
         @yield('content')
        </div>
        
    <script src="//code.jquery.com/jquery.js"></script>
    {{HTML::script('assets/js/bootstrap.min.js')}}
    </body>

</html>
