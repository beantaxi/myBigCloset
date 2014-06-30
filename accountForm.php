<!DOCTYPE HTML>

<!--FILE NAME: accountForm.php
WRITTEN BY: Chesley
WHEN: June 20 2014
PURPOSE: Form and listeners to create an account
-->

<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title> Create an Account</title>
  <link type="text/css" href="style.css" rel="stylesheet"/>
  <link rel="shortcut icon" href="greenHanger.jpg">
</head>
<body>

	<div id='header'>
		Join The Family!
	</div>

	<div class='content'>
		<form class='standardForm' method="post" action="accountFormAction.php">
			<table>
				<tr> <td>First Name</td> <td><input required= "" type="text" name="first"></td> </tr>
				<tr> <td>Last Name</td> <td><input required="" type="text" name="last"></td> </tr>
				<tr> <td>Birthdate</td> <td><input required="" type="text" name="birthdate" value='04/13/1994'></td> </tr>
				<tr> <td>Email Address</td> <td><input required="" type="text" name="email"></td> </tr>
				<tr> <td>Phone Number (1234567890)</td> <td><input required="" type="text" name="phone"></td> </tr>
				<tr> <td>Street Address</td> <td><input required="" type="text" name="street"></td> </tr>
				<tr> <td>City</td> <td><input required="" type="text" name="city"></td> </tr>
				<tr>
					<td>State</td>
					<td>
						<select name="state">
							<option value="AL">Alabama</option>
							<option value="AK">Alaska</option>
							<option value="AZ">Arizona</option>
							<option value="AR">Arkansas</option>
							<option value="CA">California</option>
							<option value="CO">Colorado</option>
							<option value="CT">Connecticut</option>
							<option value="DE">Delaware</option>
							<option value="DC">District Of Columbia</option>
							<option value="FL">Florida</option>
							<option value="GA">Georgia</option>
							<option value="HI">Hawaii</option>
							<option value="ID">Idaho</option>
							<option value="IL">Illinois</option>
							<option value="IN">Indiana</option>
							<option value="IA">Iowa</option>
							<option value="KS">Kansas</option>
							<option value="KY">Kentucky</option>
							<option value="LA">Louisiana</option>
							<option value="ME">Maine</option>
							<option value="MD">Maryland</option>
							<option value="MA">Massachusetts</option>
							<option value="MI">Michigan</option>
							<option value="MN">Minnesota</option>
							<option value="MS">Mississippi</option>
							<option value="MO">Missouri</option>
							<option value="MT">Montana</option>
							<option value="NE">Nebraska</option>
							<option value="NV">Nevada</option>
							<option value="NH">New Hampshire</option>
							<option value="NJ">New Jersey</option>
							<option value="NM">New Mexico</option>
							<option value="NY">New York</option>
							<option value="NC">North Carolina</option>
							<option value="ND">North Dakota</option>
							<option value="OH">Ohio</option>
							<option value="OK">Oklahoma</option>
							<option value="OR">Oregon</option>
							<option value="PA">Pennsylvania</option>
							<option value="RI">Rhode Island</option>
							<option value="SC">South Carolina</option>
							<option value="SD">South Dakota</option>
							<option value="TN">Tennessee</option>
							<option value="TX">Texas</option>
							<option value="UT">Utah</option>
							<option value="VT">Vermont</option>
							<option value="VA">Virginia</option>
							<option value="WA">Washington</option>
							<option value="WV">West Virginia</option>
							<option value="WI">Wisconsin</option>
							<option value="WY">Wyoming</option>
						</select>
					</td>
				</tr>
				<tr> <td>Zip Code</td> <td><input required="" type="text" name="zip"></td> </tr>
				<tr> <td>Create a Password</td> <td><input required="" type="password" name="pw" value='password'></td> </tr>
				<tr> <td>Confirm Password</td> <td><input required="" type="password" name="pwConf" value='password'></td> </tr>
				<tr> <td></td> <td><input type="submit" value="Submit"> <input type="reset"></td> </tr>
			</table>
		</form>
	</div>

	<div id="footer">
		<p>(c) Chris & Cheese
	</div>

</body>
</html>
