</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="sidebar">
					<div class="block">
						<h3>Login Form</h3>
						<form role="form">
						<div class="form-group">
							<label>Username</label>
							<input name="username" type="text" class="form-control" placeholder="Enter Username">
						</div>
						<div class="form-group">
							<label>Password</label>
							<input name="password" type="password" class="form-control" placeholder="Enter Password">
						</div>			
						<button name="do_login" type="submit" class="btn btn-primary">Login</button> <a  class="btn btn-default" href="register.html"> Create Account</a>
					</form>
					</div>
					
					<div class="block">
					<h3>Categories</h3>
					<div class="list-group">
						<a href="topics.php" class="list-group-item <?= is_active(null) ?>">All Topics <span class="badge pull-right">14</span></a> 
						<?php foreach (getCategories() as $category) : ?>
							<a href="topics.php?category=<?=$category->id?> " class="list-group-item"><?=$category->name?></a>
						<?php endforeach ?>
					</div>
				</div>	
				</div>
			</div>
		</div>
    </div><!-- /.container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.js"></script>
  </body>
</html>
