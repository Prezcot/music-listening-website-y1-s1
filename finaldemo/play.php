<html>

<head><title>Player</title></head>
<body>
	<link rel="stylesheet" type="text/css" href="library.css">
	<div id="audio_div">
		<audio controls id="audio_controls">
			
			<source src="<?php echo "./song_storage/" . $_GET['name'];?>" type="audio/mpeg">
			</source>

		</audio>

		<img src="icons/go_back.png" width="200px" height="200px" onclick="window.location.href='library.php'">
		<h1>Go Back</h1>

	</div>

</body>

</html>