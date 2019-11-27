<!DOCTYPE html>
<html>
<head>
	<title>Generators and  Iterators</title>
</head>
<body>
	<h4><a href="{{url('example22')}}">Other Example </a></h4>

	<h4><a href="{{url('example21')}}">Back << </a></h4>
	<h4><a href="{{url('example24')}}">Next is Set Method >>  </a></h4>
</body>
<script type="text/javascript">
const otherFeatures = {
	store1 : "India",
	store2 : "US"
}


const car = {
	id:1,
	status:"New",
	color:"Red",
	brand:"Audy",
	model:"Mustang",
	price:500,
	wheels:4,
	stores : otherFeatures
}

function *storeGenerators(otherFeatures){
	yield otherFeatures.store1;
	yield otherFeatures.store2;
}

function *generator(objCar){
	yield objCar.model;
	yield objCar.status;
	yield objCar.color;
	yield*  storeGenerators(objCar.stores);
}

let array = [];
for(var i of generator(car)){
	array = [...array,i];
}
console.log(array);

/////////////////////////////////////////////////////

const otherFeatures2 = {
	store1 : "India",
	store2 : "US",
	[Symbol.iterator] : function*(){
		yield this.store1;
		yield this.store2;
	}

}

const car2 = {
	id:1,
	status:"New",
	color:"Red",
	brand:"Audy",
	model:"Mustang",
	price:500,
	wheels:4,
	stores : otherFeatures2,
	[Symbol.iterator] : function*(){
		yield this.model;
		yield this.status;
		yield this.color;
		yield* this.stores;
	}
}


let array2 = [];
for(var i of car2){
	array2 = [...array2,i];
}
console.log(array2);
</script>
</html>