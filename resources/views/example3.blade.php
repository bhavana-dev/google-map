
<!DOCTYPE html>
<html>
<head>
	<title>Every and Some function</title>
</head>
<body>
Users : users=[
				{name:"Jhony",grade:4},
				{name:"Tom",grade:5},
				{name:"Bob",grade:6},
				{name:"Henry",grade:7},
				
			];

	<h4><a href="{{url('example2')}}">Back << </a></h4>
	<h4><a href="{{url('example4')}}">Next is Reduce Function >>  </a></h4>
</body>

<script type="text/javascript">
	//Filter method
	const users=[
				{name:"Jhony",grade:4},
				{name:"Tom",grade:5},
				{name:"Bob",grade:6},
				{name:"Henry",grade:3}
				
			];
	//Every function
	const PassedUser = users.every(function(user){
		return user.grade >= 6;
	});

	//Some function
	/*const PassedUser = users.some(function(user){
		return user.grade >= 6;
	});*/
	
	console.log(PassedUser);
</script>
</html>
