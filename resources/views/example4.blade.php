
<!DOCTYPE html>
<html>
<head>
	<title>Reduce function</title>
</head>
<body>
counts=[
				{expanses:"Jhony",amount:4},
				{expanses:"Tom",amount:5},
				{expanses:"Bob",amount:6},
				{expanses:"Henry",amount:3}
				
			];

	<h4><a href="{{url('example3')}}">Back << </a></h4>
	<h4><a href="{{url('example5')}}">Next is For Function >>  </a></h4>
</body>

<script type="text/javascript">
	//Filter method
	const extra= 2;
	const counts=[
				{expanses:"Jhony",amount:4},
				{expanses:"Tom",amount:5},
				{expanses:"Bob",amount:6},
				{expanses:"Henry",amount:3}
				
			];


	//Reduce function with predefined sum
	/*const Total = counts.reduce(function(sum,expanses){
		return sum + expanses.amount;
	},extra);*/

	
	const Total = counts.reduce(function(sum,expanses){
		return sum + expanses.amount;
	},0);

	const users = counts.reduce(function(start,user){
		start.push(user.expanses);
		return start;
	},[]);
	
	//console.log(users);


///////////////////////////////////////

const computers = [
   {type:'Laptop',price:124, os:'Windows'},
   {type:'Desk',price:124, os:'Mac'},
   {type:'Desk',price:124, os:'Windows'},
   {type:'Laptop',price:124, os:'Mac'},
   {type:'Laptop',price:124, os:'Windows'},
];

const osTypes = computers.reduce(function(start,item){

	return item.os === "Mac" ? {mac: start.mac+1,windows:start.windows}:{mac: start.mac,windows:start.windows+1};
		
	/*if(item.os === "Mac"){
		return {mac: start.mac+1,windows:start.windows}
	}else{
		return {mac: start.mac,windows:start.windows+1}
	}*/


	},{mac:0,windows:0});

console.log(osTypes);
</script>
</html>
