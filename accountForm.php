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

  <div class style="background-color: white; width: 80%; margin: auto;">

   <form method="post" action="accountFormAction.php">
    <p>First Name<br><input required= "" type="text" name="first">
    <p>Last Name<br><input required="" type="text" name="last">
    <p>Birthdate<br><input required="" type="text" name="birthdate" value='04/13/1994'>
    <p>Email Address<br><input required="" type="text" name="email">
    <p>Phone Number (1234567890)<br><input required="" type="text" name="phone">
    <p>Street Address<br><input required="" type="text" name="street">
    <p>City<br><input required="" type="text" name="city">
    <p>State<br>
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
    </select><br>
    <p>Zip Code<br><input required="" type="text" name="zip"><br>
    <p>Create a Password<br><input required="" type="password" name="pw" value='password'><br>
    <p>Confirm Password<br><input required="" type="password" name="pwConf" value='password'><br>
    <input type="reset"><br>
    <input type="submit" value="Submit">
   </form>
  </div>

<div id="footer">
    <p>(c) Chris & Cheese
</div>

</body>
</html>
