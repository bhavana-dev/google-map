
<!DOCTYPE html>
<html>
<head>
	<title>Destructing</title>
</head>
<body>
<h4><a href="{{url('example17')}}">Back << </a></h4>
	<h4><a href="{{url('example19')}}">Next is Promises and Fetch >>  </a></h4>
</body>

<script type="text/javascript">
const user  = {
	name : "James",
	age : 23,
	position : "Manager"
}

const printUser = ({name,age,position},test) => {
	console.log(`My name is ${name} .I am ${age} years old and works as a ${position}. ${test}`);
}

printUser(user,"test");

///////////////////////////////////////

const car = [
	"Audy",
	"Datsun",
	"Nova"
];

//let car1 = car[0];

const data =  [car1 , ...rest] = car;
console.log(data);


///////////////////////////////////////

const usersName = {
	names : ["Martha","Jhon","Tom","Deniel","Thomas"]
}

const {names:[name1,name2,name3]} = usersName;
console.log(name3);


///////////////////////////////////////

function createCar({brand,wheels,color,status,price}){
	console.log(`Brand is ${brand} ,wheels are ${wheels} , color is ${color} , status is ${status} ,price is ${price}. `)
}

const set_car = {
	status : "new",
	color : "black",
	price : 400,
	wheels : 4,
	brand : "Audy"
}

createCar(set_car);
</script>
</html>
