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
									<h4>You are logged in as : <?php if($_SESSION['session_name']) { echo $_SESSION['full_name']; } else { echo 'Not logged in!'; }?></h4>
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
											$sql_users = "SELECT * FROM chat_users";
											$res = $conn->query($sql_users);

											if ($res->num_rows > 0) {
												while ($row = $res->fetch_assoc()) {
											?>
											<div class="col-md-12">
												<li style="list-style: none; border-bottom: thin solid #e5e5e5; padding: 5px;">
													<div class="row">
														<i class="col-md-10"><?php echo $row['full_name'] . " - " . $row["email"]; ?></i>
														<form action="chat/del_user.php" method="POST" class="col-md-2">
															<input type="hidden" name="id" value="<?php echo($row['id']); ?>">
															<button type="submit" <?php if ($row['id'] == $_SESSION['id']){ ?> class="btn btn-xs btn-danger hidden" <?php } else { ?> class="btn btn-xs btn-danger" <?php }?> title="Delete user <?php echo($row['id']); ?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-remove"></i></button>
														</form>
													</div>
												</li>
											</div>
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
												<div class="col-md-5 pull-right" style="padding: 0px;">
													<form action="auth/logout.php"> <a href="auth/logout.php" class="btn btn-sm btn-danger btn-block"> Logout</a> </form>
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
															<?php if($_SESSION['id'] == $row['id_sender'] || $_SESSION['id'] == $row['id_receiver']){ ?>
															<tr> <?php } else {?> <tr class="hidden"> <?php }?>
															
																<td><?php echo $row['topic']; ?></td>
																<td><?php echo $row['message']; ?></td>
																<td>
																	<form action="chat/delete.php" method="POST">
																		<input type="hidden" name="id" value="<?php echo( $row['id']);?>">
																		<button type="submit" class="btn btn-xs btn-danger" title="Delete Message <?php echo( $row['id']);?>" onclick="return confirm('Are you sure you want to delete?')"><i class="fa fa-remove"></i></button>
																	</form>
																</td>
															</tr>

														<?php } } else { echo "No Message yet! "; } $conn->close(); ?>
													</table>
												</div>
											</div>
										</div>
										<div class="col-md-12">
											<form class="form" action="chat/send.php" method="POST">

												<div class="col-md-6 pull-left" style="padding-left: 0px;">
													<input type="text" name="topic" class="form-control pull-left" placeholder="Topic" required autofocus>
												</div>
												<div class="col-md-6 pull-right" style="padding: 0px;">
													<?php include 'database/connect.php';
														$sql_users = "SELECT * FROM chat_users";
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
												<input type="hidden" name="id_sender" value="<?php echo $_SESSION['id'] ?>">
												<hr>
												<div class="col-md-7 pull-left" style="padding-left: 0px; margin-top: 5px;">
													<textarea name="message" class="form-control" rows="1" placeholder="Message"></textarea>
												</div>
												<div class="col-md-5 pull-right" style="padding: 0px; margin-top: 5px;">
													<button type="submit" class="btn btn-primary btn-block">Send </button>
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