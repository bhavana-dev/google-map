
<!DOCTYPE html>
<html>
<head>
	<title>Rest and Spread Operator</title>
</head>
<body>
	<h4><a href="{{url('example15')}}">Back << </a></h4>
	<h4><a href="{{url('example17')}}">Next is Class >>  </a></h4>
</body>

<script type="text/javascript">
//Rest Operator
function args(...args){
	console.log(`My name is ${args[0]} and I am ${args[1]} years old .I works as a ${args[2]} and my hobby is ${args[3]}`);
}

args('James',20 ,"Developer","Writing");

/////////////////////////////////////////// 
//Spread operator

const arr1 = ["Ford","Nishan"];
const arr2 = ["BMW","Datsun"];

const newArr = [...arr1 , ...arr2,"Audy","Lamborgini"];
console.log(newArr);

///////////////////////////////////////////

function  getCount(...args){
	let total = 0 ;
	args.forEach((arg) => {
		total += arg ;
	});
	console.log(total);

	const total1 = args.reduce((sum ,arg) => {
		return sum+arg;
	},0);
	console.log(total1);

}
getCount(100,200,300);

//////////////////////////////
const concatArr = (args1 , args2,...args3) => {
	let arr = [...args1, ...args2,...args3];
	console.log(arr);
}

concatArr(["Faisal","Abdel"],["Rimmy","Rihana"],"Mikky","Jhon");
</script>
</html>
