 <!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />

		<title>Campus-Connect</title>

		<!-- <link
			href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
			rel="stylesheet"
		/> -->

		<link rel="preconnect" href="https://fonts.googleapis.com" />
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
		<link
			href="https://fonts.googleapis.com/css2?family=Patrick+Hand&display=swap"
			rel="stylesheet"
		/>

		<link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />

		<link href="assets/css/style.css" rel="stylesheet" />

		<script defer src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
		<script defer src="assets/js/main.js"></script>
	</head>

	<body
	>
		
	<div class="invisible-items">
		<div id="preloader"></div>

		<div id="mobile-nav">
			<button id="close-nav" class="btn">
				<i class="bi bi-x fs-1 m-2"></i>
			</button>
			<a href="./index.html" class="text-decoration-underline">Home</a>
			<a href="./accomodation.html">Browse Accomodation</a>
			<a href="./about.html">About</a>
			<a href="./contact.html">Get In Touch</a>
		</div>

		<a href="#" class="back-to-top d-flex align-items-center justify-content-center"
			><i class="bi bi-arrow-up-short"></i
		></a>
	</div>

	<!--START OF HEADER -->

	<header class="sticky-top d-flex text-white bg-success">
		<div class="container">
			<div class="p-3 d-flex justify-content-between align-items-center">
				<a href="./index.html" id="logo" class="text-inherit mt-2">
					<h4 class="">
						<i class="bi bi-house-door-fill"></i>
						<span>C</span>ampus<span>-C</span>onnect
					</h4>
				</a>

				<button
					id="open-nav"
					type="button"
					class="d-lg-none btn btn-light rounded-circle shadow"
				>
					<i class="bi bi-list fs-5"></i>
				</button>
				<nav class="d-none d-lg-flex align-items-center">
					<a href="./index.html" class="active">Home</a>
					
					<a href="./signin.html">Sign Up</a>
				</nav>
			</div>
		</div>
	</header>
	<!--END OF HEADER -->


	<!-- forgot password modal -->
	<div
	class="modal fade"
	id="forgotpasswordmodal"
	data-bs-backdrop="static"
	data-bs-keyboard="false"
	tabindex="-1"
	aria-labelledby="forgotPasswordLabel"
	aria-hidden="true"
>
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="forgotPasswordLabel">
					Forgot password?
				</h5>

				<button
					type="button"
					class="btn-close"
					data-bs-dismiss="modal"
					aria-label="Close"
				></button>
			</div>

			<div class="modal-body text-center">
				We've sent a password reset link to your email
				address.
			</div>

			<div class="modal-footer text-center d-block">
				<button
					type="button"
					class="btn btn-success"
					data-bs-dismiss="modal"
				>
					Dismiss
				</button>
			</div>
		</div>
	</div>
</div>
</div>
<!--Forgot password-->





    <main class="p-5">
        <h1 class="display-1 text-center">
            <i class="bi bi-person-circle"></i>
        </h1>

        <h1 class="text-center mb-3">Login</h1>

        <form class="mx-auto signin-form">
            <div class="form-floating mb-3">
                <input
                    type="email"
                    class="form-control"
                    id="floatingInput"
                    placeholder="name@example.com"
                />
                <label for="floatingInput">Email address</label>
            </div>

            <div class="form-floating mb-3">
                <input
                    type="password"
                    class="form-control"
                    id="floatingPassword"
                    placeholder="Password"
                />
                <label for="floatingPassword">Password</label>
            </div>

            <div class="d-flex justify-content-between">
                <div>
                    <p class="mb-3">
                        Don't have an account? <br />
                        <a class="normal-link" href="signin.html">Signup</a>
                    </p>

                    <a class="d-block normal-link" onclick="clickNext(this)"
                        >Forgot Password</a
                    >

                    <button
                        type="button"
                        class="d-none"
                        data-bs-toggle="modal"
                        data-bs-target="#forgotpasswordmodal"
                    ></button>
                </div>

                <div>
                    <button class="btn btn-primary" type="submit">
                        Login
                    </button>
                </div>
            </div>
        </form>
    </main>


	<script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="assets/js/custom.js"></script>
	<script src="assets/js/main2.js"></script>
	<script src="assets/js/main.js"></script>

	</body>
</html>
