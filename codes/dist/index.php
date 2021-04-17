<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="description" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Codes</title>
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/bcg.css">
</head>
<body>
	<!--[if lt IE 9]>
		<p class="browserupgrade">
			You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.
		</p>
	<![endif]-->
	<div class="wrapper">
		<?php include('includes/bcg.php') ?>
	</div>
	<script src="assets/js/bcg.js"></script>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<script type="text/javascript">
		var columnLimit = 5;
		var values = ['zero', 'one', 'two', 'three', 'four', 'five', 'six'];
		var rows = values.length / columnLimit;
		var overflow = values.length - rows;

		var groups = [];

		for (var i = 0; i < columnLimit; i++) {
			groups.push([]);
		}

		var columnPosition = 0;

		var rowLimit = values.length / columnLimit;
		rowLimit = (rowLimit == 0) ? 1 : rowLimit;

		for (var i = 0; i < values.length; i++) {
			var currentValue = values[i];
			var rowMod = i / rows;
			var columnMod = i / columnLimit;
			console.log(currentValue, i % 2)
			// var currentGroup = groups[columnPosition];
			//
			// if (currentGroup && currentGroup.length < rowLimit) {
			// 	console.log(overflow, rowLimit)
			// 	currentGroup.push(currentValue);
			//
			// 	if (currentGroup.length == rowLimit) {
			// 		columnPosition++;
			// 	}
			// }

			//console.log(i, currentRow)
			//groups[currentRow].push(currentValue);
		}

		console.log(groups)




	</script>
</body>
</html>
