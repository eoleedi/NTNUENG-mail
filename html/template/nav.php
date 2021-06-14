<!-- nav bar -->
<nav class="navbar navbar-inverse navbar-light sticky-top navbar-expand-lg" style="background-color:#44090d">
	<div class="container-fluid">
		<div class="navbar-header">
			<a class="navbar-brand" href="./">
				<img src="./src/ntnu_logo_2.png" height="50" class="d-inline-block align-middle" alt="">
			</a>
		</div>
		<ul class="navbar-nav mr-auto mt-2 mt-lg-0">
			<?php if ( !(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false ) ){ ?>
			<li class="nav-item">
				<!-- search box -->
				<form class="form-inline my-2 my-lg-0">
					<div class="input-group " style="border-radius: 20px">
						<div class="input-group-prepend ">
							<span class="input-group-text">
								<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
									<path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
								</svg>
							</span>		
						</div>
						<input class="form-control mr-sm-2" name="query" type="search" placeholder="Search" aria-label="Search">
					</div>
				</form>
			</li>
			<li class="nav-item">
				<!-- Add storage button -->
				<div>
					<button class="btn" onclick="location.href='add.php'">增加簽收物品</button>
				</div>
			</li>
			<?php } ?>

		</ul>
		<ul class="nav navbar-nav navbar-right">
		<?php if($_SESSION['loggedin']){ ?>
			<li><p class="vertical-center" style="color: white;"><?php echo htmlspecialchars($_SESSION['username']); ?>&nbsp</p></li>
			<li><button class="btn" onclick="location.href='logout.php'">登出</button></li>
		<?php } else{?>
			<!--<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>-->
			<!--<li><button class="btn" onclick="location.href='login.php'">登入</button></li>-->
		<?php } ?>
		</ul>
	</div>
</nav>
