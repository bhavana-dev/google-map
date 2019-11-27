
<!DOCTYPE html>
<html>
<head>
	<title>Template string or Template Literals</title>
</head>
<body>
	<h4><a href="{{url('example7')}}">Back << </a></h4>
	<h4><a href="{{url('example9')}}">Next is Templates Literals3 and 4 >>  </a></h4>
</body>

<script type="text/javascript">
function returnEmployee(){
	const employeName = "Loren";
	const age = 24;
	const position = "Developer";
	console.log(`Employer name is ${employeName} and age is ${age} and workes as a ${position}`);
}

returnEmployee();
</script>
</html>
