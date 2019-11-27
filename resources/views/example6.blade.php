
<!DOCTYPE html>
<html>
<head>
	<title>Fat Arrow function</title>
</head>
<body>
	<h4><a href="{{url('example5')}}">Back << </a></h4>
	<h4><a href="{{url('example7')}}">Next is Template string or Template Literals >>  </a></h4>
</body>

<script type="text/javascript">
//Old syntax
const myFunction = function(first,second){
	return `My Name is ${first} and age is ${second}`;
}

//New syntax with fat arrow
const NewFunction = (first,second) => {
	let total = `My Name is ${first} and age is ${second}`;
	return total;
}


//New syntax with fat arrow
const OtherExample = (first,second) =>  first+second;

//New syntax with fat arrow
const OtherOne = first => first+10;

console.log(OtherExample("james",24));
</script>
</html>
