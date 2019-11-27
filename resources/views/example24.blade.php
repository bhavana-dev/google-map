<!DOCTYPE html>
<html>
<head>
	<title>Set Method</title>
</head>
<body>
	<h4><a href="{{url('example23')}}">Back << </a></h4>
	<h4><a href="{{url('example25')}}">Next is Map Method >>  </a></h4>
</body>
<script type="text/javascript">
//Sets
let records = new Set(["first","second","third","fourth","fifth","first"]);
records.add("sixth");
records.add("seventh").add("eight");
records.delete("eight");
console.log(records.has("seventh")); //true
console.log(records);
console.log(records.size);
//records.clear();
console.log(records);

////////////////////////////////////////////////////////

//Iterating Sets
/*for(let item of records){
	console.log(item);
}*/

/*const data = records.forEach((record)=>{
	console.log(record);
});*/

const data = [...records].filter((record)=>{
	console.log(record);
});
</script>
</html>