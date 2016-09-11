<!DOCTYPE html>
<html>
<head>
	<title>/calculator</title>
	<link href='https://fonts.googleapis.com/css?family=Roboto' rel='stylesheet'>
	<link rel='stylesheet' type='text/css' href='/global.css'>
	<link rel='stylesheet' type='text/css' href='style.css'>
</head>
<body>

<script>

function compoundCalc(){
	// get the values from the inputs
	var principal = document.getElementById('startvalue').value;
	var interestrate = document.getElementById('interest').value;
	var compfreq = document.getElementById('compfreq').value;
	var duration = document.getElementById('years').value;
	// run the calculations
	var answer = principal * Math.pow(1+(interestrate/compfreq), compfreq * duration);
	// set the output to the result
	document.getElementById("comptotal").value = Math.round(answer * 100) / 100;
}

function savingsCalc(){
	// get the values from the inputs

	// run the calculations

	// set the output to the result

}

</script>


<section>
	<h1>Finance Calculator</h1>
	<fieldset>
		<h2>Compound Interest</h2>
		<img src="compeqn.svg">
		<p>Where P is the principal amount, i is the interest rate, f represents the compound frequency (per year) and d is the duration of the interest (in years).</p>
		<table>
		<tr>
			<td>
				<h3>Input</h3>
			</td>
			<td>
				<h3>Output</h3>
			</td>
		</tr>
			
		<tr>
			<td>
				<input type="number" id="startvalue" placeholder="Principal Amount"></br>
				<input type="number" id="interest" placeholder="Interest Rate"></br>
				<input type="number" id="compfreq" placeholder="Compound Frequency (/year)"></br>
				<input type="number" id="years" placeholder="Number of years">
				<button onclick="compoundCalc()"> Calculate Amount</button>
			</td>
			<td>
				<input type="number" id="comptotal" placeholder="Total Value (£)" readonly>
			</td>
		</tr>
		</table>
	</fieldset>

	<fieldset>
		<h2>Interval Savings</h2>
		<table>
		<tr>
			<td>
				<h3>Input</h3>
			</td>
			<td>
				<h3>Output</h3>
			</td>
		</tr>
		<tr>
			<td>
				<input type="number" name="saveamount" placeholder="Amount you save (£)"></br>
				<input type="number" name="saveinterval" placeholder="Days between deposits"></br>
				<input type="number" name="saveinterest" placeholder="Account interest rate"></br>
				<input type="number" name="savelength" placeholder="Days spent saving">
				<button>Calculate Savings</button>
			</td>
			<td>
				<input type="number" name="savetotal" placeholder="Total Saving (£)" readonly>
			</td>
		</tr>
		</table>
	</fieldset>
</section>
</body>
</html>