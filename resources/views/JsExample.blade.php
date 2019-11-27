

<!DOCTYPE html>
<html>
<head>
	<title>Filter</title>
</head>
<body>
 
	<h4><a href="{{url('example11')}}">Next is Search And Find >>  </a></h4>
</body>
<script type="text/javascript">
	//Filter method
	const channels=[
				{name:"Jhon",premium:true},
				{name:"Teena",premium:false},
				{name:"Joya",premium:false},
				{name:"Abdel",premium:true},
				{name:"Tom",premium:false}
			];

	const user = {
		name : "Fransis",
		premium : true,
		PremiumChannel : function (){
			const $this =this;
			return channels.filter(function(channel){
				return channel.premium && $this.premium;
			})
		},
		NonPremiumChannel : function(){
			return channels.filter(function(channel){
				return channel.premium == false;
			})
		}
	}

	//console.log(user.PremiumChannel());
	//console.log(user.NonPremiumChannel());


	//Find method
	const result = channels.find(function(channel){
		return channel.premium !== false;
	})
	console.log(result);
</script>
</html>
