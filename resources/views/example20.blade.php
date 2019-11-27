
<!DOCTYPE html>
<html>
<head>
	<title>String and Number</title>
</head>
<body>
	<h4><a href="{{url('example19')}}">Back << </a></h4>
	<h4><a href="{{url('example21')}}">Next is Modules >>  </a></h4>
</body>

<script type="text/javascript">
//String functions
	let string = "Hello ";
console.log(string.repeat(5));
console.log(string.indexOf("o"));//4
console.log(string.startsWith("H")); //true
console.log(string.endsWith("o")); //false because there is one space at the end
console.log(string.includes("09")); //false

/////////////////////////////////
//Number functions
console.log(Number.isSafeInteger(200));//true
console.log(Number.isSafeInteger(-200));//true
console.log(Number.isSafeInteger(200.09));//false

console.log(Number.isInteger(200.09));//false
console.log(Number.isInteger(200));//false

console.log(Math.trunc(-200.00009));//false

</script>
</html>
