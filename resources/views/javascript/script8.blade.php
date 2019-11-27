<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script type="text/javascript">
(function(global,$){
	var Greetr = function(firstname , lastname , language){
		return new Greetr.init(firstname ,lastname , language);
	}

	Greetr.prototype = {};
	Greetr.init = function (firstname , lastname , language){
		this.firstname = firstname || '';
		this.lastname = lastname || '';
		this.language = language || 'en';
	}

	Greetr.init,prototype = Greetr.prototype;
	global.Greetr = global.G$  = Greetr;
	console.log("Greetr.prototype" +Greetr.prototype);
}(window,jQuery));

var g = G$("Jhone","Doe");
console.log(g);

</script>
</html>