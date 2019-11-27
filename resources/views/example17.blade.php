
<!DOCTYPE html>
<html>
<head>
	<title>Class</title>
</head>
<body>
	<h4><a href="{{url('example16')}}">Back << </a></h4>
	<h4><a href="{{url('example18')}}">Next is Destructuring >>  </a></h4>
</body>

<script type="text/javascript">
function Car(){}

let car = new Car();
Car.prototype.status = "New";
Car.prototype.wheels = 4;
Car.prototype.price = 500;


let ford = new Car();
console.log(ford.__proto__);
//////////////////////////////////////////

class Wheechels {
	constructor(){
		this.status = "new",
		this.price  = 400,
		this.available = () => {
			console.log("Available");
		}
	}
}

let obj = new Wheechels();
let obj2 = new Wheechels();
obj2.color = "Black";
console.log(obj2);

///////////////////////////////////////////


/*class Car1{
	constructor(options){
		this.status = options.status,
		this.wheels = options.wheels,
		this.color = options.color,
		this.avail = options.avail
	}
}*/
///OR
/*class Car1{
	constructor({status,wheels,color,avail}){
		this.status = status,
		this.wheels = wheels,
		this.color = color,
		this.avail = avail
	}
}

const car1 = new Car1({
	status : "new",
	wheels : 4,
	color : "red",
	avail : () => {
		console.log("available");
	}

});

console.log(car1);*/

//////////////////////////////////////////////


class Car1{
	constructor(){
		this.status = "new",
		this.price  = 400,
		this.color  = "black",
		this.available = () => {
			console.log("Available");
		}
	}
}

class OtherCar extends Car1{
	constructor(){
		super();
	}
}

const car1 = new Car1();
const othercar = new OtherCar();
othercar.color = "red";
console.log(othercar);
</script>
</html>
