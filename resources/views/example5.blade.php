
<!DOCTYPE html>
<html>
<head>
	<title>For  function</title>
</head>
<body>
["Hello","Hii","Bye","Tata"]

<h4><a href="{{url('example4)}}">Back << </a></h4>
	<h4><a href="{{url('example6')}}">Next is Fat Arrow >>  </a></h4>
</body>

<script type="text/javascript">


const array = ["Hello","Hii","Tata","Bye"];


for(let value of array){
	console.log(value);
}

const array2 = [10,20,30,40,50];
let total = 0 ;
for(let count of array2){
	total += count;
}
console.log(total);
</script>
</html>
