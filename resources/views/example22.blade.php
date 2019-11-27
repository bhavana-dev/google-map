<!DOCTYPE html>
<html>
<head>
	<title>Generators</title>
</head>
<body>
	<h4><a href="{{url('example23')}}"> Other example </a></h4>



	<h4><a href="{{url('example21')}}">Back << </a></h4>
	<h4><a href="{{url('example24')}}">Next is Set Method  >>  </a></h4>
</body>
<script type="text/javascript">
function  *generators(){
	yield 'First One';
	yield 'Second';
	yield 'Third';
	yield 'Fourth';
	yield 'Fifth';
	return "DONE";
}

const gen =  generators();
//console.log(gen.next());

////////////////////////////////////

function  *meetingProcess(){
	alert("Your meeting is fixed at 2 PM.");
	yield 'Step 1 Completed';
	alert("Please acknowlege the meeting schedule");
	yield 'Step 2 Completed';
	alert("I acknowleged and will be available on time.");
	yield 'Step 3 Completed';
	alert("Meeting was good.We will inform you later for meeting result.");
	yield 'Step 4 Completed';
	alert("You are selected.");
	yield 'Step 5 Completed';
	alert("Thanks for the job.");
	yield 'Step 6 Completed';
	return "DONE";
}

const meeting =  meetingProcess();
//console.log(gen.next());
////////////////////////////////////////

function *brands(){
	yield 'Audy';
	yield 'Toyota';
	yield 'Datsun';
	yield 'Lamborgini';
	yield 'BMW';
}

const get = brands();
var array = [];
for(var i of brands()){
	//array.push(i);
	array = [...array,i];
}
console.log(array);

////////////////////////////////////////
const car = {
	id: 1,
	status:"new",
	wheels: 4,
	brand: "Ford",
	color: "Red",
	year: 2017,
	model: "Mustang"
}

function *generateCar(objCar){
	yield objCar.id;
	yield objCar.model;
	yield objCar.year;
	yield objCar.color;
}

var arr = [];
for(var i of generateCar(car)){
	arr = [...arr,i];
}

console.log(arr);
</script>
</html>