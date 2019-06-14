<!-- home.php -->
<?php if (session_start() == FALSE) { ?>
	<head>
		<title>Session Expired!</title>		
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	</head>
	<main style="text-align: center; margin-top: 10%;">
		<h3>You Are Logged out!</h3>
		<a href="index.php" class="btn btn-primary">Login</a>
	</main>
<?php } else { ?>
	<?php include ('includes/header.php'); ?>
		<div class="well">
			<div class="row">
				<div class="col-md-12 text-center">
					<div class="row">
						<div class="col-md-12">
							<div class="panel panel-success">
								<div class="panel-body">
									<h4>You are logged in as : <?php if($_SESSION['session_name']) { echo $_SESSION['session_name']; } else { echo 'Not logged in!'; }?></h4>
									<?php $sender = $_SESSION['session_name']; ?>
								</div>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="panel panel-info">
								<div class="panel-body">
									<h3>All System Users</h3><hr>
									<ol class="text-left">
										<?php
											include 'database/connect.php';
											$sql_users = "SELECT * FROM users";
											$res = $conn->query($sql_users);

											if ($res->num_rows > 0) {
												while ($row = $res->fetch_assoc()) {
											?>
												<li><?php echo $row['full_name'] . " - " . $row["email"]; ?></li>
										<?php } } $conn->close(); ?>
									</ol>
								</div>
							</div>
						</div>

						<div class="col-md-6">
							<div class="panel panel-warning">
								<div class="panel-heading">
									Send Message from here!
								</div>
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<div class="row">
												<div class="col-md-5 pull-right">
													<form action="auth/logout.php"> <a href="auth/logout.php" class="btn btn-sm btn-danger btn-block"> Logout</a> </form>
												</div>
												<div class="col-md-7">

												</div>
												<div class="col-md-12" id="chat_space">
													<p class="col-heading">Messages to: </p>
													<table class="table">
														<?php include 'database/connect.php';
														$sql_all = "SELECT * FROM chats";
														$res_all = $conn->query($sql_all);
														if ($res_all->num_rows > 0){
															while ($row = $res_all->fetch_assoc()) {
															 	?>
																<tr>
																	<td><?php echo $row['topic']; ?></td>
																	<td><?php echo $row['message']; ?></td>
																	<td><a href="#" class="btn btn-xs btn-danger" title="Delete Message <?php echo( $row['id']);?> ">x</a></td>
																</tr>
														<?php } } else { echo "No Message yet! "; } $conn->close(); ?>
													</table>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<form class="form" action="chat/send.php" method="POST">

												<div class="col-md-12" style="margin: 5px;">
													<div class="col-md-6 pull-left" style="padding: 0px;">
														<input type="text" name="topic" class="form-control pull-left" placeholder="Topic" required autofocus>
													</div>
													<div class="col-md-6 pull-right" style="padding: 0px;">
														<?php include 'database/connect.php';
															$sql_users = "SELECT * FROM users";
															$res = $conn->query($sql_users);
														?>
														<select name="id_receiver" class="form-control pull-right" required>
															<?php
																if ($res->num_rows > 0) {
																	while ($row = $res->fetch_assoc()) { ?>
															<option value="<?php echo $row['id']; ?>" title="<?php echo $row['name']; ?>"><?php echo $row['full_name'];?></option>
															<?php } } $conn->close(); ?>
														</select>
													</div>
												</div>
												<?php 
													include 'database/connect.php';
													$sql_sender = "SELECT * FROM users WHERE name = '$sender' ";
													$re_sender = $conn->query($sql_sender); 
													if ($re_sender->num_rows > 0) {
														while ($row = $re_sender->fetch_assoc()) { ?>
															<input type="hidden" name="id_sender" value="<?php echo $row['id'] ?>">
														<?php } } $conn->close();
												?>
												<div class="col-md-7 pull-left">
													<textarea name="message" class="form-control" rows="1" placeholder="Message"></textarea>
												</div>
												<div class="col-md-5 pull-right">
													<button type="submit" class="btn btn-primary btn-block">Send Message</button>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php include ('includes/footer.php'); ?>
<?php } ?>