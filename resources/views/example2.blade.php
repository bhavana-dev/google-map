
<!DOCTYPE html>
<html>
<head>
	<title>Seacrh Find</title>
</head>
<body>
	Brand : 
	<select id="brand">
		<option value="Audy">Audy</option>
		<option value="BMW">BMW</option>
		<option value="Ford">Ford</option>
		<option value="Nishan">Nishan</option>
		<option value="Porsche">Porsche</option>
	</select>
	Price: 
	<select id="price">
		<option value="100">100</option>
		<option value="200">200</option>
		<option value="300">300</option>
		<option value="400">400</option>
		<option value="500">500</option>
	</select>

	<button type="button" class="search"> Search</button>


	<h4><a href="{{url('jsExample')}}">Back << </a></h4>
	<h4><a href="{{url('example3')}}">Next is Every and Some Function >>  </a></h4>
</body>

<script type="text/javascript">
	//Filter method
	const cars=[
				{brand:"Ford",price:200,available:3,type:"Sports Car"},
				{brand:"Nishan",price:400,available:6,type:'Sports Car'},
				{brand:"Audy",price:150,available:1,type:"Wagon"},
				{brand:"Porsche",price:500,available:5,type:"Urbon"},
				
			];

	
	function search(price,type){
		return cars.find(function(car){
			return car.price <= price && car.brand === type ;
		})
	}
	
	document.querySelector(".search").addEventListener('click',function(){

		let price = parseInt(document.querySelector("#price").value);
		let brand = document.querySelector("#brand").value;
		const result = search(price,brand);
		if(result){

			console.log(`Found ${result.brand} on price $ ${result.price}`);
		}else{
			console.log("Sorry not found");
		}
	});
	
</script>
</html>
