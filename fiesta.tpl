<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Disgaea Fiesta!</title>
		<link rel="shortcut icon" href="sprites/prinny.png" />
		<style>
			body {background: lightgray; text-align: center;}
			div   {text-align: center; min-height: 320px; width: 320px; background: white; display: inline-block; border: 1pt black solid; padding: 2pt;}
		</style>
	</head>
	<body>
		{%for job in jobs%}

			<div><img alt="{{job}}" src="sprites/{{job|lower}}.png"><br>{{job}}</div>{%endfor%}
	</body>
</html>
