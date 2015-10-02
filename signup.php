<!DOCTYPE html>
<html>
	<head>
		<title>
			Sign up
		</title>
		<link rel="stylesheet" type="text/css" href="css/stylesheet.css">
	</head>
	<body>
		<div id="topbar">
			<table style="width:100%">
				<tr>
			    	<td><img src="shoppingcart.png" width = "50" height = "40"> eShop</td>
			   	</tr>
			</table>
		</div>
		<div  class="wrap">
						  <div class="Regisration">
						  	<div class="Regisration-head">
						    	<h2><span></span>Register</h2>
						 	 </div>
						  	<form>
						  		<input type="text" value="First Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'First Name';}" >
						  		<input type="text" value="Last Name" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Last Name';}" >
						  		<input type="text" value="Email Address" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email Address';}" >
								<input type="password" value="Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Password';}" >
								<input type="password" value=" Confirm Password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = ' Confirm Password';}" >
								<input id="pic" type="file" name="picture" accept="image/*">
								 <div class="Remember-me">

								<div class="p-container">
								<label class="checkbox"><input type="checkbox" name="checkbox" checked><i></i>I agree to the Terms and Conditions</label>
								<div class ="clear"></div>
							</div>
												 
								<div class="submit">
									<input type="submit" onclick="myFunction()" value="Sign Me Up >" >
								</div>
	</body>