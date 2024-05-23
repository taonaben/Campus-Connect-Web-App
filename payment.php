<!DOCTYPE html>
<html>
<head>
	<script src="https://kit.fontawesome.com/e8fa2e31b4.js" crossorigin="anonymous"></script>

    <title>Campus-Connect</title>

	
    <link href="assets/css/card.css" rel="stylesheet" />

</head>
<body>
    


	<div class="container">
		<div class="left">
			<p>Payment methods</p>
			<hr style="border:1px solid #ccc; margin: 0 15px;">
			<div class="methods">
				<div onclick="doFun()" id="tColorA" style="color: #198754;"><i class="fa-solid fa-credit-card" style="color: #198754;"></i> Payment by card</div>
				<div onclick="doFunA()" id="tColorB"><i class="fa-solid fa-building-columns"></i> Ecocash</div>
				
				
			</div>
			<hr style="border:1px solid #ccc; margin: 0 15px;">
		</div>
		<div class="center">
			<a href="https://www.shift4shop.com/credit-card-logos.html"><img alt="Credit Card Logos" title="Credit Card Logos" src="https://www.shift4shop.com/images/credit-card-logos/cc-lg-4.png" width="250" height="auto"/></a>
			<hr style="border:1px solid #ccc; margin: 0 15px;">

			<div class="card-details">
				<form>
					<p>Card number</p>
					<div class="c-number" id="c-number">
						<input id="number" class="cc-number" placeholder="Card number" maxlength="19" required>
						<i class="fa-solid fa-credit-card" style="margin: 0;"></i>
					</div>

					<div class="c-details">
						<div>
							<p>Expiry date</p>
							<input id="e-date" class="cc-exp" placeholder="MM/YY" required maxlength="5" required>
						</div>
						<div>
							<p>CVV</p>
							<div class="cvv-box" id="cvv-box">
								<input id="cvv" class="cc-cvv" placeholder="CVV" required maxlength="3" required>
								<i class="fa-solid fa-circle-question" title="3 digits on the back of the card" style="cursor: pointer;"></i>
							</div>
						</div>
					</div>
					<div class="email">
						<p>Email</p>
						<input type="email" placeholder="example@email.com" id="email" required>
					</div>
					<button>PAY NOW</button>
				</form>
			</div>
		</div>


		<div class="right">
			<p>Order information</p>
			<hr style="border:1px solid #ccc; margin: 0 15px;">
			<div class="details">
				<div style="font-weight: bold; padding: 3px 0;">Order discription</div>
				<div style="padding: 3px 0;"></div>
			</div>
			<hr style="border:1px solid #ccc; margin: 0 15px;">
			<a href="https://www.shift4shop.com/credit-card-logos.html"><img alt="Credit Card Logos" title="Credit Card Logos" src="https://www.shift4shop.com/images/credit-card-logos/cc-lg-4.png" width="100%" height="auto" /></a>
		</div>
		
	</div>

	<script src="assets/js/card.js"></script>
</body>
</html>
