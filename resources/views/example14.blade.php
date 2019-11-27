
<!DOCTYPE html>
<html>
<head>
	<title>Object literals</title>
</head>
<body>
	<h4><a href="{{url('example13')}}">Back << </a></h4>
	<h4><a href="{{url('example15')}}">Next is Default Argument >>  </a></h4>
</body>

<script type="text/javascript">
const request = (url ,data) => {
	//$.ajax({method : "post" ,url ,data});
}
request('http://localhost:8000',{car:'ford'});

//////////////////////////////////////////////

const creatFunction = (name,lastname) => {
	return {
		name,
		lastname,
		getFriends(name1 ,lastname1){
			return `My Friend is ${name1} ${lastname1}`;
		},
		getEnemies(){
			return `My Enemie is ${name} ${lastname}`;
		}
	}
}
const object = creatFunction('James','Doe');
//console.log(object.getFriends("Thomas","Ron"));
//console.log(object.getEnemies());
//console.log(object.name);
//console.log(object.lastname);

////////////////////////////////////////////////

const createObject = (name,lastname,age) => {
   return {
       name,
       lastname,
       age,
   }   
}
console.log(createObject("James","Thomas",30));
</script>
</html>
