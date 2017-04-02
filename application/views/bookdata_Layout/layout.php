<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link href="public/css/bootstrap.min.css" rel="stylesheet">
		<script src="public/jQuery/jquery-3.1.1.min.js"></script>
		<script src="public/js/bootstrap.min.js"></script>
	</head>

	<body>
		<?
			$this->load->view('bookdata_Layout/header');
			$this->load->view($content);
			$this->load->view('bookdata_Layout/footer');
		?>
	</body>
</html>