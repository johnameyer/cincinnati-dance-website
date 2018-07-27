<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>

<script>
	(function (d, s, id) {
		var js, fjs = d.getElementsByTagName(s)[0];
		if (d.getElementById(id)) return;
		js = d.createElement(s);
		js.id = id;
		js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0';
		fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));
</script>

<script>
	/*$(function () {

		$("#spacer").height($("nav").outerHeight());
		$(window).scroll(function () {
			var scroll = $(window).scrollTop();
			if (scroll > 400) {
				$("#top-nav").addClass("fixed-top");
			} else {
				$("#top-nav").removeClass("fixed-top");
			}
		});
	});*/
</script>

<script type="text/javascript">
	$(function(){
		$.validator.addMethod("alpha", function ( value, element ){
			return this.optional( element ) || /^[a-zA-Z\s-]+$/.test( value );
		}, "Please use only a-z characters, spaces, and dashes.");
		$.validator.addMethod("phone", function( value, element ) {
			return this.optional( element ) || /^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$/.test( value );
		}, "Please enter phone like '513-555-5555'");
		$.validator.addMethod("date", function ( value, element ){
			return this.optional( element ) || /^[1-2][0|9][0-9][0-9]-[0|1]?[0-9]-[0-3]?[0-9]$/.test( value );
		}, "Please put in a format like '2003-11-22'");
	});
</script>