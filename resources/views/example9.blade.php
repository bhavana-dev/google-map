
<!DOCTYPE html>
<html>
<head>
	<title>Template string or Template Literals3 and Literals4</title>
</head>
<body>
	<div class="list">
		User List:
	</div>

	<h4><a href="{{url('example8')}}">Back << </a></h4>
	<h4><a href="{{url('example10')}}">Next is Template string or Template Literals4 >>  </a></h4>
</body>

<script type="text/javascript">
function showUser(name , lastname){
	const list = document.querySelector('.list');
	let template = `
					<div>
					<h4>${name} ${lastname} </h4>
					</div>
	 			`;
	 			
	list.insertAdjacentHTML('beforeend',template)
	//list.insertAdjacentHTML('afterend',template)
	//list.insertAdjacentHTML('beforebegin',template)
	//list.insertAdjacentHTML('afterbegin',template)
}

showUser("francis","jones");
showUser("jane","doe");

/////////////////////////////////////////

console.log(String.raw`This\nis\na\ntesting\xa0`);
</script>
</html>
