<?php
set_include_path('../');
?>
<!doctype html>
<html lang="en">

<head>
	<?php include_once 'includes/head.php'; ?>

	<link rel="stylesheet" href="css/carousel.css">
	<link rel="stylesheet" href="css/awards.css">
	<link rel="stylesheet" href="css/actioncalls.css">
</head>

<body>
	<br>

	<table id="cal" style="width: 500px">
	</table>

	<?php include_once 'includes/javascript.php'; ?>
	<script>
		Date.prototype.monthDays= function(){
			var d = new Date(this.getFullYear(), this.getMonth()+1, 0);
			return d.getDate();
		}
		$(function(){
			$.fn.cal = function(action){
				var cal = { root: this };
				setup = function(){ //sets up elements
					cal.root.html('<thead></thead><tbody></tbody>');
					cal.head = cal.root.find("thead").html('<tr><th colspan="7"><span class="float-left"></span><span class="float-none"></span><span class="float-right"></span></th></tr>').css("font-size", "1.1em");

					cal.body = cal.root.find("tbody").html('<tr class="cal-row"><td class="cal-col"></td></tr>');
					cal.root.addClass("table").addClass("text-center").addClass("table-bordered").css("table-layout","fixed");
					var row = cal.root.find(".cal-row");
					var item = row.find(".cal-col");
					for (var i = 1; i < 7; i++) {
						row.append(item.clone());
					}
					for (var i = 1; i < 6; i++) {
						cal.body.append(row.clone());
					}
					cal.root.find(".cal-col").each(function(i){$(this).addClass("cal-day-" + i)});
					cal.today = new Date();
					cal.month = new Date(cal.today.getFullYear(), cal.today.getMonth());

					function move(i){
						return function(){
							console.log(cal.month);
							cal.month = new Date(cal.month.getFullYear(), cal.month.getMonth() + i);
							console.log(cal.month);
							update();
						};
					}
					cal.head.find(".float-left").html("&lsaquo;").css("cursor","pointer").click(move(-1));
					cal.head.find(".float-right").html("&rsaquo;").css("cursor","pointer").click(move(+1));
				}
				update = function(){ //changes to a different month
					cal.root.find(".cal-col").html("");
					var month = cal.month;
					var first = (35 + month.getDay() - month.getDate() + 1) % 7;
					for(var day = 0; day < month.monthDays(); day++){
						$(".cal-day-" + (first + day)).text(day + 1);
					}
					var explodedDate = month.toString().split(" ");
					cal.head.find(".float-none").text(explodedDate[1] + " " + explodedDate[3]);
				}
				switch(action){
					case 'init': {
						setup();
						update();
					}
					break;

				}

			}
			$("#cal").cal('init');
		});

	</script>

</body>

</html>