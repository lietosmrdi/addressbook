<!DOCTYPE html>
<html>
<head>
	<title>App</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/spectre.css/0.1.25/spectre.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/main.css">
	<meta name="_token" content="{{ csrf_token() }}">
</head>

<body>

	@yield ('content')

	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/list.js/1.2.0/list.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/2.7.2/jquery.serializejson.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/remodal/1.1.0/remodal.min.js"></script>
	<script src="/js/main.js"></script>
	
</body>
</html>
