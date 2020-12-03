<?/* Template Name: Calendar Template */ 

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="#" method="post" >
	<input type="text" name="names" >
</form>





<script type="text/javascript">
	
	function getDOW( day, month, year){
		//if true a 1 if not then 0
		var isleapYear = (year % 4)== 0 ? true : false;
		var leapFlag = isleapYear && month < 3 ? 1:0;

		// gets the last two digits of the year
		var twoDigYear = year % 100;
		yearCode = (twoDigYear + (twoDigYear/4) ) % 7;
		var monthsArr = [0,3,3,6,1,4,6,2,5,0,3,5];
		// centry codes from 1700s to 2000s
		var centuryObj ={
			1700:4,
			1800:2,
			1900:0,
			2000:6,
			2100:4,
			2200:2,
			2300:0
		};

		var dayofwk = (yearCode + monthsArr[month-1] + centuryObj[year-twoDigYear]  
		+ day - leapFlag ) % 7;

		return dayofwk;
	}

</script>
</body>
</html>