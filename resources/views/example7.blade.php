
<!DOCTYPE html>
<html>
<head>
	<title>Fat Arrow function</title>
</head>
<body>
	<h4><a href="{{url('example6')}}">Back << </a></h4>
	<h4><a href="{{url('example8')}}">Next is Template string or Template Literals >>  </a></h4>
</body>

<script type="text/javascript">
const MyFunction = {
	brands:['Jhon','Thomas','Deny','Alen'],
	category:'Developer',
	test : function(){
		let  $this = this;
		return $this.brands.map(function(brand){
			console.log(`${brand} is ${$this.category}`);
		});

		//Or 
		/*return $this.brands.map((brand) => {
			console.log(`${brand} is ${$this.category}`);
		});*/
	}
}

MyFunction.test();

//////////////////////////////////////

var names= ["James","Ron","Lisa","Tommy"];
var randomName = function(items){
	
 return items[Math.floor(Math.random()*items.length)]
}
var randomNumber = function(maxNumber,minNumber){
 return Math.floor(Math.random() * maxNumber) + minNumber;
}
console.log(randomName(names) + " magic number is " + randomNumber(5,2))
</script>
</html>
