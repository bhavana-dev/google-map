<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">
	var person = {
		name : "Demon",
		lastname : "Ritchi",
		getFullName : function(){
			var FullName = `${this.name} ${this.lastname}`;
			return FullName;
			//console.log(FullName);
		}
	}
var log = function(lang1, lang2){
	console.log(lang1+ " "+lang2);
	console.log(this.getFullName());
	console.log("////////////////////////");
}
var data = log.bind(person);


//data();
data("en");
data.call(person,"en","fr");
data.apply(person,["en","fr"]);
</script>
</html>