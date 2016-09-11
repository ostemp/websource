<!DOCTYPE html>
<html>
<head>
	<title>/code</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='/global.css'>
	<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>

<script>
function toggleElement(selectid){
	// set all of the pre tags to hidden	
	var allpres = document.getElementsByTagName('pre');
    for (var i = 0; i < allpres.length; i++){
    	allpres[i].style.display = 'none';
    }
    // get the select element and get its current value
	var e = document.getElementById(selectid);
	var classname = e.options[e.selectedIndex].value;
	var code = document.getElementsByClassName(classname);
	// set all of the pre's with the classname to !current visibility
    for (var i = 0; i < code.length; i++){
    	code[i].style.display = code[i].style.display === 'block' ? 'none' : 'block';
    }
}

</script>


<section>
	<h1>Code Bank</h1>
	<fieldset>
	<legend>PHP</legend>
	<select onchange="toggleElement('phpselect')" id="phpselect">
		<option value="none" selected>None</option>
		<option value="phpconn">Connection to a database</option>
		<option value="phprcok">Regular Cookie</option>
		<option value="phphcok">HTTP Only Cookie</option>
		<option value="phpprep">Prepared SQL Statement</option>
		<option value="phppswd">Password hashing and checking</option>
	</select>

<pre class="phpconn" class="code">// define connection variables
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "databasename"

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}// otherwise continue</pre>
<pre class="phpconn" class="code">// at the end of any database connection code
$conn = null;</pre>

<pre class="phppswd" class="code">// password hashing and checking
function hashValue($value){
	// use the php password hash, the cost is the computation required to hash the value
	return password_hash($value, PASSWORD_DEFAULT, ['cost' => 10]);
}
function hashValueCheck($enteredValue, $dbValue){
	// compare the two values using php's built in verifier
	return password_verify($submittedpassword, $actualpassword);
}</pre>

<pre class="phprcok" class="code">// basic level cookies
function setWeekCookie($key, $value){
	$date = new DateTime('+1 week');
	setcookie($key, $value, $date->getTimestamp());
}

function setDayCookie($key, $value){
	$date = new DateTime('+1 day');
	setcookie($key, $value, $date->getTimestamp());
}</pre>

<pre class="phphcok" class="code">// http only cookies (the client cannot access cookies using javascript)
// first declare the lifespan of the cookie
$week = new DateTime('+1 week');
// heres how you set a basic cookie (accessed using document.cookie in javascript)
setcookie('cookiename', 'cookievalue', $week->getTimestamp());
// using the overloaded version we can set several other parameters...
setcookie('bettername', 'bettervalue', $week->getTimestamp(), '/', null, null, true);
//         name,         value,         expires,             path,domain,secure,httponly

// echo $_COOKIE['cookiename'] <- gets a value in a cookie</pre>

<pre class="phpprep" class="code">// get information from the request and escape special characters
$title = htmlspecialchars($_POST['title']);
$text = htmlspecialchars($_POST['text']);
// define a prepared statement with variables for each field
$sql = $conn->prepare("INSERT INTO logs (title, text) VALUES(?, ?)");
if($sql){
	// bind the parameters in the statement with the variables
	$sql->bind_param("ss", $title, $text);
	// finally execute the prepared statement
	$sql->execute();
}
else{
	// an error occured in the preparation
}</pre>

	</fieldset>

	<fieldset>
	<legend>JavaScript</legend>
	<select onchange="toggleElement('jsselect')" id="jsselect">
		<option value="none" selected>None</option>
		<option value="jsxhr">XML HTTP Request (asynchronous)</option>
	</select>
	
<pre class="jsxhr" class="code">
// first define a new XMLHttpRequest
var xhr = new XMLHttpRequest();
// open it with method 'post', url 'upload.php' and async 'true'
xhr.open("POST", "addimage.php", true);
// set the request headers 
xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
// finally send the request, setting the post variables as the parameter
xhr.send("requestType=770&data=" + imageData);
// define a function called when the response succeeds
xhr.onload = function() {
    //document.getElementById("outputtext").innerHTML = xhr.responseText;        
}
</pre>

	</fieldset>

	<fieldset>
	<legend>C++</legend>
	<select onchange="toggleElement('cppselect')" id="cppselect">
		<option value="none" selected>None</option>
		<option value="cppconn">Connection to an SQL database</option>
	</select>

<pre class="cppconn" class="code">// just kidding, good luck though :P</pre>

	
	</fieldset>

	<fieldset>
	<legend>C#</legend>
	<select onchange="toggleElement('csselect')" id="csselect">
		<option value="none" selected>None</option>
	</select>
	
	</fieldset>
</section>
</body>
</html>