<?php include_once('includes/session.php'); ?>

<nav id="top-nav" class="navbar navbar-expand-md navbar-light sticky-top bg-light drop">

	<a href="" class="navbar-brand">
		<img src="img/logo.svg" style="height: 40px">
		<span>
			Cincinnati Dance
			<span class="d-none d-lg-inline"> &amp; Movement Center</span>
		</span>
	</a>

	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
	aria-expanded="false" aria-label="Toggle navigation">
	<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
	<ul class="navbar-nav mr-auto">
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" id="dropdownAbout" role="button" data-toggle="dropdown" aria-haspopup="true"
			aria-expanded="false">
			About Us
		</a>
		<div class="dropdown-menu" aria-labelledby="navbarDropdown">
			<a class="dropdown-item" style="display:none" href="about/story">Our Story</a>
			<a class="dropdown-item" href="about/crew">Our Faculty/Staff</a>
			<a class="dropdown-item" href="about/studio">Our Facility</a>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" style="display:none" href="events/">News and Events</a>
	</li>
	<li class="nav-item dropdown" style="display:none">
		<a class="nav-link dropdown-toggle" href="#" id="dropdownTeams" role="button" data-toggle="dropdown" aria-haspopup="true"
		aria-expanded="false">
		Programs
	</a>
	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="team/ballet">Ballet Program</a>
		<a class="dropdown-item" href="team/open">Open Division</a>
		<a class="dropdown-item" href="team/performance">Performance Teams</a>
	</div>
</li>
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="dropdownTeams" role="button" data-toggle="dropdown" aria-haspopup="true"
	aria-expanded="false">
	2018-2019 Classes
</a>
<div class="dropdown-menu" aria-labelledby="navbarDropdown">
	<a class="dropdown-item" href="classes/">All</a>
	<div class="dropdown-divider"></div>
	<a class="dropdown-item" href="classes/preschool">Preschool (ages 2 to 6)</a>
	<a class="dropdown-item" href="classes/ballet">Ballet & Pointe (6 to adult)</a>
	<a class="dropdown-item" href="classes/tap">Tap (6 to adult)</a>
	<a class="dropdown-item" href="classes/jazz-hip-hop">Jazz &amp; Hip-Hop (5 to adult)</a>
	<a class="dropdown-item" href="classes/contemporary-acro-dance">Contemporary &amp; Acro-Dance (10 to adult)</a>
	<a class="dropdown-item" href="classes/performance-teams">Performance Teams (8 to adult)</a>
	<a class="dropdown-item" href="classes/drop-in">Drop-In Classes (6 to adult)</a>
</div>
</li>
<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" id="dropdownTeams" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Student Info</a>
	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<a class="dropdown-item" href="student/tuition.php">Tuition/Fees</a>
		<a class="dropdown-item" href="student/calendar.php">Calendar</a>
	</div>
</li>
<li class="nav-item">
	<a class="nav-link" href="gallery">Gallery</a>
</li>
</ul>
<ul class="nav justify-content-end">
	<?php if(isset($_SESSION['contact-id'])): ?>
		<li class="nav-item justify-content-end" style="display: flex; align-items: center;">
			Welcome <?php echo $_SESSION['fname']; ?>
		</li>
	<?php endif; ?>
	<li class="nav-item">
		<?php if(isset($_SESSION['contact-id'])): ?>
			<li class="nav-item dropdown">
				<a class="nav-link dropdown-toggle" href="#" id="dropdown-account" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Account Info</a>
				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="account/student.php">Your Students</a>
					<a class="dropdown-item" href="account/classes.php">Your Registered Classes</a>
					<a class="dropdown-item" href="account/sign-out.php">Sign Out</a>
				</div>
			</li>
			<?php else: ?>
				<a class="btn btn-primary" href="account/sign-in.php">Sign In</a>
			<?php endif; ?>
		</li>
	</ul>
</div>
</nav>
<div id="spacer">

</div>