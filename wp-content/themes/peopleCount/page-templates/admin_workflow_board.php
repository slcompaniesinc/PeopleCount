<?
/* Template Name:Workflow Board Template */ 
wp_head();


function getApplicants($tablename){
	$mysqli = new mysqli( 'localhost', 'finalpeo_wp763' , 'Sp)s7o5J1.' , 'finalpeo_wp763' );
	$checkuserSql = "SELECT * FROM $tablename";
	$result = $mysqli->query($checkuserSql);
	$counter = 0;
	while( $row = $result->fetch_assoc() ){
		echo "<article class='card' draggable='true' ondragstart='drag(event)' id='todo1'>";
		echo "<h3>". $row["userName"]. "</h3>";
		echo "</article>";
	}
}



?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		.column{
			float: left;
			margin-right: 20px;
			height: 300px;
		}
		.card {
    cursor: grab;
}

.card:active {
    cursor: grabbing;
}
.card {
    transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
}

.card.dragging {
    opacity: .5;
    transform: scale(.8);
}
.column {
    transition: all 0.3s cubic-bezier(0.4, 0.0, 0.2, 1);
}

.column.drop {
    border: 2px dashed #FFF;
}

.column.drop article {
    pointer-events: none;
}
	</style>
	<title></title>

	<script type="text/javascript">
	function allowDrop(ev) {
  ev.preventDefault();
}

function drag(ev) {
  ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev, flag) {
  ev.preventDefault();
  var data = ev.dataTransfer.getData("text");
  var element = document.getElementById(data);
  var usr = element.childNodes[0].innerHTML;
  console.log(usr);
  ev.target.appendChild(element);
  jQuery.ajax({
            type: "POST",
            url: "/workflow",
            data: {username : usr,
                flag:flag
            },
            success: function( data ){
              console.log(data);
              alert("Workflow Updated");
            }
             
           });
}
	</script>
</head>
<body>

	
		<div>
			<div id="div1" ondrop="drop(event,1)" ondragover="allowDrop(event)" class="column">
				<h2>New Applicants</h2>
				<?
				getApplicants("wp4s_applied_associates");
				?>
			</div>
			<div id="div2" ondrop="drop(event,2)" ondragover="allowDrop(event)" class="column">
				<h2>Active Associates</h2>
				<?
				getApplicants("wp4s_active_associates");
				?>
			</div>
			<div id="div3" ondrop="drop(event,3)" ondragover="allowDrop(event)" class="column">
				<h2>Inactive Associates</h2>
				<?
				getApplicants("wp4s_inactive_associates");
				?>
			</div>
			<div id="div4" ondrop="drop(event,4)" ondragover="allowDrop(event)" class="column">
				<h2>Placed Associates</h2>
				<?
				getApplicants("wp4s_placed_associates");
				?>
			</div>
			<div id="div5" ondrop="drop(event,5)" ondragover="allowDrop(event)" class="column">
				<h2>Terminated Associates</h2>
				<?
				getApplicants("wp4s_terminated_associates");
				?>
			</div>
			<div id="div6" ondrop="drop(event,6)" ondragover="allowDrop(event)" class="column">
				<h2>Do Not Return</h2>
				<?
				getApplicants("wp4s_dnr_associates");
				?>
			</div>
		</div>
<? wp_footer();?>
</body>
</html>