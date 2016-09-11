<!DOCTYPE html>
<html>
<head>
	<title>/log</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='/global.css'>
	<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>
<section>
	<h1>Daily Logger</h1>
	<fieldset>
		<form method='post' action='upload.php'>
			<input type='text' id='title' name='title' placeholder='Title' required></br>
			<textarea name='text' placeholder='Text' required></textarea></br>
			<input type='submit' name='submit' value='Publish'>
			<input type="password" id='key' name="password" placeholder="key" required>
		</form>

	</fieldset>
</section>
</body>
</html>