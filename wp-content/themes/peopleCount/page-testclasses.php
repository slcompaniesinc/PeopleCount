<?php



?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.overlay{
			height: 100%;
		    width: 100%;
		    background-color: lightgrey;
		    z-index: 1000;
    		opacity: 0.5;
		}
		#buttonclick{
			position: relative;
			top: 50%;
		}
		.button{
			height: 50%;
		}
		body{
			overflow: scroll;
		    text-align: center;
		    height: 900px;
		}
		html{
			min-height: 100%;
    		position: relative;
		}
		#myProgress {
		  width: 100%;
		  background-color: #ddd;
		}
		#myBar {
		  width: 10%;
		  height: 30px;
		  background-color: #4CAF50;
		  text-align: center;
		  line-height: 30px;
		  color: white;
		}
	</style>
</head>
<body>
	<div id="overlay-div">
		<div id="myProgress" style="display: none;">
  			<div id="myBar">10%</div>
		</div>

	 
<div class="button">
	<button id="buttonclick"> CLICK ME </button>
</div>
</div>
<script type="text/javascript">
	var button = document.getElementById( 'buttonclick' );
	button.addEventListener( 'click', event=>{
		document.getElementById('myProgress').style.display = 'block';
		document.getElementById('overlay-div').classList.add('overlay');
		console.log('next');
		move(90, 100);
		button.style.display = 'none';



	} );
	var i = 0;
function move(width, interval) {
  if (i == 0) {
    i = 1;
    var elem = document.getElementById("myBar");
    var id = setInterval(frame, 50);
    function frame() {
      if (width >= interval) {
        clearInterval(id);
        i = 0;
      } else {
        width++;
        elem.style.width = width + "%";
        elem.innerHTML = width  + "%";
      }
    }
  }
}
</script>
</body>
</html>
