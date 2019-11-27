
<!DOCTYPE html>
<html>
<head>
	<title>Promises and Fetch</title>
</head>
<body>
	<h4><a href="{{url('example18')}}">Back << </a></h4>
	<h4><a href="{{url('example20')}}">Next is Strings and Numbers >>  </a></h4>
</body>

<script type="text/javascript">
//Promise
let promises = new Promise((resolved,rejected) => {
	
	setTimeout(() => {
		rejected();
	},3000);
});

promises
.then(() => {console.log("resolved")})
.catch(() => {console.log("Failed")})

///////////////////////////////////////////

//Fetch 
const url = "http://localhost:8000/getuser/2";

fetch(url,{
	headers:{
		'Content-Type':'application/json'
	}
})
.then(response=> response.json())
.then(data => console.log(data))
.catch(error  => console.log("Failed : "+error))


///////////////////////////

const url1 = "http://localhost:8000/postuser";

fetch(url1,{
	method : "POST",
	headers:{
		'Content-Type':'application/json'
	},
	body : JSON.stringify({id:"title"}),
	mode : 'cors',
})
.then(response=> response.json())
.then(data => console.log(data))
.catch(error  => console.log("Failed : "+error))


</script>
</html>
