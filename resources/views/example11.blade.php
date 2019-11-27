
<!DOCTYPE html>
<html>
<head>
	<title>Foreach Helper</title>
</head>
<body>
	<div>
		<ul class="ul">
			
		</ul>

	<h4><a href="{{url('example10')}}">Back << </a></h4>
	<h4><a href="{{url('example12')}}">Next is Foreach helper other Example >>  </a></h4>
	</div>
</body>

<script type="text/javascript">
const array = ['Demon','Bruno','Jhon','Calpton','Lamer'];
const list = document.querySelector('.ul');
let template = '';
array.forEach(function(arr){
	console.log(arr);
	 template += `<li>${arr}</li>`
	
});
list.insertAdjacentHTML('beforeend',template);


///////////////////////////////////////////////////

const purchases = [
					{quantity :1 , amount: 100},
					{quantity :2 , amount: 100},
					{quantity :3 , amount: 100},
				];
let total = 0;
	purchases.forEach(function(purchase){
		total += purchase.quantity *  purchase.amount;
	});	
	console.log(total);		
</script>
</html>
