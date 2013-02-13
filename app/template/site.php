<?php
/**
 * @package phpasr
 * @author Thomas Palmer
 * @version v1.0.0 13/02/2013 NEW FILE
 */
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>phpasr</title>
		<link rel="stylesheet" href="<?php echo web_css; ?>master.css">
		<script src="<?php echo web_js; ?>jquery/jquery.min.js"></script>
	</head>

	<body>
		<div id="header" class="group">
			<div class="group width">
				<h1 id="logo">PHPASR</h1>
				<ul id="navigation">
					<li class="active"><a href="#">Repo</a>
						<ul>
							<li><a href="#">Categories</a></li>
							<li><a href="#">Newest S+</a></li>
							<li><a href="#">Most popular</a></li>
							<li><a href="#">Favorite S+</a></li>
						</ul>
					</li>
					<li><a href="#">Add S+</a></li>
				</ul>
				<div id="search">
					Search...
					<div id="search-button"></div>
				</div>
				<div id="user">
					<div id="username" class="group">Welcome, <a href="#">admin</a></div>
					<div id="controls" class="group">
						<div id="settings"><a href="#">Settings</a></div>
						<div id="logout"><a href="#">Logout</a></div>
					</div>
				</div>
			</div>
		</div>

		<?php echo $this->showPage(); ?>

		<div id="footer" class="group width">
			A phpacademy.org community project.
		</div>
	</body>
</html>