<?php $id = $_SESSION['user']['id']; ?>




<?php include_once 'views/admin/layout/'.$this->layout.'top.php'; ?>

<div class="col-md-10 col-sm-9 pad0">
  <div class="tab-content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<div class="row" id="requests-header">
						<div class="col-sm-8 col-xs-6">
							<h2 class="box-title">Profile</h2>
						</div>

						<div class="col-sm-4 col-xs-6">
							<a href="<?php echo (vendor_app_util::url(["ctl"=>"users", "act"=>"edit/".$id])) ?>" id="<?php echo("edit".$id);?>" type="button" class="btn btn-primary edit-record  pull-right">
								<i class="fa fa-edit"></i>
							</a>
						</div>
					</div>
				</div>
				<!-- /.box-header -->
				
				<div class="row">
					<div class="col-md-2 col-sm-12 col-xs-12"></div>	   
					<div class="col-md-6 col-sm-12 col-xs-12">	   
						<div class="box-body profile-body">
							<fieldset>
								<table class="profile-table">
									<tr>
										<td class="title">Full name :</td>
										<td><?php echo $this->record['firstname']; ?> <?php echo $this->record['lastname']; ?></td>
									</tr>
									<tr>
										<td class="title">Email :</td>
										<td><?php echo $this->record['email']; ?></td>
									</tr>
									<tr>
										<td class="title">Password :</td>
										<td><input disabled type="Password" name="password" value="<?php echo $this->record['password']; ?>" ></td>
									</tr>
									<tr>
										<td class="title">Phone :</td>
										<td><?php echo $this->record['phone']; ?></td>
									</tr>
									<tr>
										<td class="title">Address :</td>
										<td><?php echo $this->record['address']; ?></td>
									</tr>
									<tr>
										<td class="title">Date Of Birth :</td>
										<td><?php echo $this->record['datebirth']; ?></td>
									</tr>
									<tr>
										<td class="title">Gender :</td>
										<td><?php if(isset($this->record['gender'])) echo user_model::$gender[$this->record['gender']]; ?></td>
									</tr>
									<tr>
										<td class="title">Role :</td>
										<td><?php if(isset($this->record['role'])) echo $app['roles'][$this->record['role']]; ?></td>
									</tr>
									<tr>
										<td class="title">Country :</td>
										<td><?php echo $this->record['country']; ?></td>
									</tr>
									<tr>
										<td class="title">Website :</td>
										<td><?php echo $this->record['website']; ?></td>
									</tr>
								</table>
							</fieldset>
						</div>
					</div>
					<div class="col-md-4 col-sm-12 col-xs-12 text-center">	
						<div class="img-profile">
							<img src="<?php echo UploadURI.$app['ctl'].'/'.$this->record['avata']; ?>">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </div>
</div>
<script src="<?php echo RootREL; ?>media/admin/js/dashboard.js"></script>

<?php include_once 'views/admin/layout/'.$this->layout.'footer.php'; ?>
