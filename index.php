<!DOCTYPE html>
<html>
<head>
	<title>/root</title>
	<link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="global.css">
	<style type="text/css">
		button{
			width: 150px;
			height: 150px;
		}
		button:hover{
			background-color: #6495ED;
			cursor: pointer;
		}

	</style>
</head>
<body>
<section>
	<h1>Projects</h1>
	<fieldset>
		<table>
			<tr>
				<td><button onclick="window.location='/log'">Log Prototype</button></td>
				<td><button onclick="window.location='/calculator'">Finance Calculator</button></td>
				<td><button onclick="window.location='/finance'">Finance Notes</button></td>
			</tr>
			<tr>
				<td><button onclick="window.location='/mvc'">PHP MVC</button></td>	
				<td><button onclick="window.location='/code'">Code Bank</button></td>		
				<td><button onclick="window.location='/guide'" disabled>Guide</button></td>		
			</tr>
			<tr>	
				<td><button onclick="window.location='/comedy'" disabled>Vault</button></td>	
				<td><button onclick="window.location='/internship'">Internship</button></td>		
				<td><button onclick="window.location='/testarea'">Test Area</button></td>			
			</tr>
		</table>
		<button onclick="window.location='/phpmyadmin'">phpMyAdmin</button>

	</fieldset>
</section>
</body>
</html>