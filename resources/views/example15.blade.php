
<!DOCTYPE html>
<html>
<head>
	<title>Default Argument</title>
</head>
<body>
	<h4><a href="{{url('example14')}}">Back << </a></h4>
	<h4><a href="{{url('example16')}}">Next is Rest and Speed Operator >>  </a></h4>
</body>

<script type="text/javascript">
function RandomBrand(){
	const array =["Ford","Nishan","Audy","BMW","Datsun","Duster"];
	return array[Math.floor(Math.random() * array.length )]
}


const getRandomBrand = (brand = RandomBrand()) => {
	return `My Brand is ${brand}`;
}
console.log(getRandomBrand());

////////////////////////////////////////////////////////////


const userName = (name = 'user') => `My name is ${name}`;
console.log(userName('James'));
</script>
</html>
