
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	   
	</style>
</head>
<body>

	<select class="selectBox">
		
	</select>

	<h4><a href="{{url('example12')}}">Back << </a></h4>
	<h4><a href="{{url('example14')}}">Next is Object Literals >>  </a></h4>
</body>
</html>



<script type="text/javascript">
var products = [10,20,30,40,50,60,70,80,90,100];

const array = products.map(product => {

	return product * 10;
});
console.log(array);

///////////////////////////////////////////////

const users = [
				{user :"James",age : 30 ,course:'Bsc'},
				{user :"Thomas",age : 25 ,course:'BE'},
				{user :"Jane",age : 27 ,course:'Bcom'},
				{user :"Oliv",age : 20 ,course:'Bca'},
			];

	const all = users.map(function(user){
		return user.user;
	});

	all.forEach(function(data){
		var selectBox = document.querySelector('.selectBox');
		//console.log(data);
		//var template = `<option value="${data}" >${data}</option>`;
		selectBox.insertAdjacentHTML('afterbegin',`<option value="${data}" >${data}</option>`);

	});
	//console.log(all);
/////////////////////////////////////////////


const paintings = [
   {name:'Mona lisa',width:200,height:200},
   {name:'The scream',width:400,height:600},
   {name:'The last supper',width:600,height:700}
];

const array2 = paintings.map(function (painting){
	return 	`The ${painting.name} is ${painting.width} x ${painting.height};`;
});
//console.log(array2);

//////////////////////////////////////////////

const cars = [
   {name:'Ford',price:200},
   {name:'Nissan',price:400},
   {name:'Nissan',price:600}
];

function changePrice(price){
	return price * 20;
}
const total = cars.map(function (car){
	return `${car.name} is ${changePrice(car.price)} rupies;`;
});
console.log(total);
</script>