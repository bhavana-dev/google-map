<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">

	function greetings(languages){
		return function(firstname,lastname){
			if(languages === "en")
				console.log(`${firstname} , ${lastname}  Hello`);
			else
				console.log(`${firstname} , ${lastname}  Bonzor`);
		}
	}

	var greetEng = greetings("en");
	var greetfr = greetings("fr");
	greetEng("Dennis","Ritchi");
	greetfr("Jhon","Doe");


	///////////////////////////////
	//Callbacks

	function callMeWhenDone(callback){
		var a = 1000;
		var b = 1000;
		var c = a + b;
		console.log(c);
		callback();
	}

	callMeWhenDone(function(){
		console.log("I'm done");
	}
		);
	callMeWhenDone(function(){
		console.log("Completed......")
	}
		);
</script>
</html>