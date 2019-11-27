<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">
	var arr = [
		1,
		false,{
			name: "test",
			address : "India"
		},
		function show(name){
			var greeting = "Hello";
			console.log(greeting +" "+name);
		}
		

	];
	var array = arr.forEach((a) => {
		//console.log(a);
	});
	console.log(arr[3]);
	console.log(`arr1 = ${arr[2].name} and arr2 = ${arr[3].greeting}`);
</script>
</html>