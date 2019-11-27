<!DOCTYPE html>
<html>
<head>
	<title>Map Method</title>
</head>
<body>
	<h4><a href="{{url('example24')}}">Back << </a></h4>
</body>
<script type="text/javascript">
//Map
let superHeroes = new Map();
 superHeroes.set("Batman",{
 	realName : "Bruce wayne",
 	Power : "Millionaire",
 	Weakness : "None",
 });

 superHeroes.set("Superman",{
 	realName : "Clark Kent",
 	Power : "All",
 	Weakness : "Not having power",
 });

  superHeroes.set("Antman","He is just awesome.");
  superHeroes.set("Trigger",() => {console.log("This is testing function.")});
  superHeroes.get("Trigger")();
 console.log(superHeroes.get("Batman").realName);
 console.log(superHeroes.get("Superman").Weakness);
 console.log(superHeroes.get("Antman"));

 console.log(superHeroes.size);  //4
 console.log(superHeroes.has("Antman"));  //true
superHeroes.delete("Superman");  
//superHeroes.clear(); 
//console.log(superHeroes);

/////////////////////////////////////////////////////////
//Iterating Map
/*
for(let [key,value] of superHeroes){
	//console.log(key[0]); and console.log(key[1]);
	console.log(key);
	console.log(value);
}*/

/*const data = superHeroes.forEach((key,value) => {
	console.log(value);
	console.log(key);
});*/

const keys = Array.from(superHeroes.keys());
console.log(keys);
const values = Array.from(superHeroes.values());
console.log(values);
const all = Array.from(superHeroes.values()).map(item => {
		return item.realName;
});
console.log(all);
</script>

</html>