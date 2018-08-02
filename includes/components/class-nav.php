<h1>2018-2019 Dance Classes</h1>
<br>
<div class="d-none d-sm-block">
	<ul class="nav nav-pills">
		<li class="nav-item">
			<a class="nav-link" id="class-nav-preschool" href="classes/preschool.php">Preschool</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="class-nav-ballet" href="classes/ballet.php">Ballet & Pointe</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="class-nav-tap" href="classes/tap.php">Tap</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="class-nav-jazz-hip-hop" href="classes/jazz-hip-hop.php">Jazz & Hip-Hop</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="class-nav-contemporary-acro-dance" href="classes/contemporary-acro-dance.php">Contemporary & Acro-Dance</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="class-nav-performance-teams" href="classes/performance-teams.php">Performance Teams</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="class-nav-drop-in" href="classes/drop-in.php">Drop-In Classes</a>
		</li>
	</ul>
</div>
<div class= "btn-primary d-block d-sm-none">
	<a class="nav-link dropdown-toggle" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" id="class-nav-m">Class Category</a>
	<div class="dropdown-menu" aria-labelledby="navbarDropdown">
		<a class="nav-link" id="class-nav-preschool-m" href="classes/preschool.php">Preschool</a>
		<a class="nav-link" id="class-nav-ballet-m" href="classes/ballet.php">Ballet & Pointe</a>
		<a class="nav-link" id="class-nav-tap-m" href="classes/tap.php">Tap</a>
		<a class="nav-link" id="class-nav-jazz-hip-hop-m" href="classes/jazz-hip-hop.php">Jazz & Hip-Hop</a>
		<a class="nav-link" id="class-nav-contemporary-acro-dance-m" href="classes/contemporary-acro-dance.php">Contemporary & Acro-Dance</a>
		<a class="nav-link" id="class-nav-performance-teams-m" href="classes/performance-teams.php">Performance Teams</a>
		<a class="nav-link" id="class-nav-drop-in-m" href="classes/drop-in.php">Drop-In Classes</a>
	</div>
</div>

<br>

<script>
	function setActiveClass(tag){
		document.getElementById(tag).className = "nav-link active"
		tagm = tag + "-m";
		document.getElementById(tagm).className = "nav-link disabled"
		document.getElementById("class-nav-m").innerHTML = document.getElementById(tagm).innerHTML;

	}
</script>