<!-- index.php by Bruno Nicholas -->

<?php include ('includes/header.php') ?>
<div class="well">
	<div class="row">
		<div class="col-md-12 text-center">
			<div class="row">
				<div class="col-md-6">
					<div class="panel panel-info">
						<div class="panel-heading">
							<h4>Login</h4>
						</div>
						<div class="panel-body">
							<form class="form" action="auth/login.php" method="POST">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Your username" autofocus>
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>

								<div class="form-group">
									<div class="col-md-5 pull-right">
										<button type="submit" class="btn btn-success btn-block">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4>Register</h4>
						</div>
						<div class="panel-body">
							<form class="form" action="auth/register.php" method="POST">
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Your username" required>
								</div>
								<div class="form-group">
									<input type="text" name="full_name" class="form-control" placeholder="Full Names" required>
								</div>
								<div class="form-group">
									<input type="email" name="email" class="form-control" placeholder="Your Email" required>
								</div>
								<div class="form-group">
									<input type="password" name="password" class="form-control" placeholder="Password" required>
								</div>
								<div class="form-group">
									<input type="password" name="confim_password" class="form-control" placeholder="Confirm Password" required>
								</div>

								<div class="form-group">
									<div class="col-md-5 pull-right">
										<button type="submit" class="btn btn-success btn-block">Create Profile</button>
									</div>
									<div class="col-md-5 pull-left">
										<input type="checkbox" name="agreement" value="1" required> I Agree to <a href="#">Terms</a>.
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include ('includes/footer.php') ?>