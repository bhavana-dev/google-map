<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">
	var person = {
		name : "Jhon",
		lastname : "Doe",
		getFullName : function (){
			return `${this.name} , ${this.lastname}`;
		}
	}

	var log = {
		position : "Developer"
	}

	log.__proto__ = person;
	console.log(log.name);

///////////////////////////////////////////////

Array.prototype.CustomFeature = "Cool!!!";
var arr = ["Thomas","Dennis","Sofia","Anna"];

for(var name in arr){
	console.log(`${name}  ${arr[name]}`);
}
</script>
</html>