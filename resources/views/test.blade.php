<!DOCTYPE html>
<html>
<head>
  <title>Test</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto:300" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="/css/test.css">
</head>
<body>

    <!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#sidebar-btn').click(function() {
				if ($('#sidebar-wrapper').css('left') == '0px') {
					$('#sidebar-wrapper').css('left', '-200px');
					$('.navbar').removeClass('undoResize').addClass('resize');
				}
				else {
					$('#sidebar-wrapper').css('left', '0px');
					$('.navbar').removeClass('resize').addClass('undoResize');
				}
			});

			$('[data-toggle="tooltip"]').tooltip();
		});

	</script>

</body>
</html>