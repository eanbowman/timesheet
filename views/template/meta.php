
	<!-- BEGIN INCLUDED META TAGS -->
	<meta charset="utf-8">
	<meta name="description" content="A front-end template that helps you build fast, modern mobile web apps.">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui">

	<!-- Add to homescreen for Chrome on Android -->
	<meta name="mobile-web-app-capable" content="yes">

	<!-- iOS icons -->
	<link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/touch/apple-touch-icon-144x144-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/touch/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/touch/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon-precomposed" href="images/touch/apple-touch-icon-57x57-precomposed.png">
		
	<link rel="stylesheet" href="css/docket.css" type="text/css" />
	<link href="//fonts.googleapis.com/css?family=Roboto" rel="stylesheet" type="text/css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/docket.js"></script>
	<script type="text/javascript" src="js/tinymce/tinymce.min.js"></script>
	<script type="text/javascript">
	tinymce.init({
		selector: "textarea",
		theme: "modern",
		plugins: [
			"advlist autolink lists link image charmap print preview hr anchor pagebreak",
			"searchreplace wordcount visualblocks visualchars code fullscreen",
			"insertdatetime media nonbreaking save table directionality",
			"emoticons template paste textcolor colorpicker textpattern"
		],
		toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
		toolbar2: "print preview media | forecolor backcolor emoticons",
		image_advtab: true
	});
	</script>
	<!-- Keepalive -->
	<script type="text/javascript">
		var keepaliveRef = setInterval(function() {
			// Ping the server to keep the connection alive
			$.ajax({ url: window.location.pathname + "?ping=pong" });
		}, 10000);
	</script>
	<!-- END INCLUDED META TAGS -->

