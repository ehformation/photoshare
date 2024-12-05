<?php
include __DIR__ . '/partials/header.php';
?>
<?php if(isset($user)) : ?>
<div class="container my-4">
<div class="row gutters">
<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="account-settings">
			<div class="user-profile">
				<div class="user-avatar mb-4">
                    <?php if($user['picture'] != '') : ?>
					    <img src="../assets/img/users/<?php echo $user['picture'] ?>" alt="Maxwell Admin" width="100%">
                    <?php endif; ?>
				</div>
                <?php if($user['nom_prenom'] != '') : ?>
				    <h5 class="user-name"><?php echo $user['nom_prenom'] ?></h5>
                <?php else : ?>
                    <h5 class="user-name"><?php echo $user['username'] ?></h5>
                <?php endif; ?>   
				<h6 class="user-email"><?php echo $user['email'] ?></h6>
			</div>
			<div class="about">
				<h5>Bio</h5>
                <?php if($user['bio'] != '') : ?>
				    <p><?php echo $user['bio'] ?></p>
                <?php endif; ?> 
			</div>
		</div>
	</div>
</div>
</div>
<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
<div class="card h-100">
	<div class="card-body">
		<div class="row gutters">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<h6 class="mb-2 text-primary">Info personelle</h6>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="fullName">Nom & Prénom</label>
					<input type="text" class="form-control" id="fullName" placeholder="Nom prénom" value="<?php echo $user['nom_prenom'] ?? '' ?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="eMail">Email</label>
					<input type="email" class="form-control" id="eMail" placeholder="Email" value="<?php echo $user['email']; ?>">
				</div>
			</div>
			<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
				<div class="form-group">
					<label for="phone">Tel.</label>
					<input type="text" class="form-control" id="phone" placeholder="Tel." value="<?php echo $user['tel'] ?? '' ?>">
				</div>
			</div>
		</div>
		<div class="row gutters mt-4">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="text-right">
					<button type="button" id="submit" name="submit" class="btn btn-secondary">Annuler</button>
					<button type="button" id="submit" name="submit" class="btn btn-primary">Modifier</button>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
</div>
</div>
<?php endif; ?>
<?php
include __DIR__ . '/partials/footer.php';
?>