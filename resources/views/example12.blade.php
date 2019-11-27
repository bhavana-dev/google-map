
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
	   	.product {
	       border: 1px solid #d2d2d2;
	       box-sizing: border-box;
	       padding:20px;
	       width:250px;
	       float:left;
	       margin:10px;
	   	}
	   	.product h1 {
	       margin: 0 0 10px;
	       color: #03A9F4;
	   	}
	   	.product span {
	       background: #F44336;
	       color: #fff;
	       padding: 5px;
	   	}
	</style>
</head>
<body>

	<h4><a href="{{url('example11')}}">Back << </a></h4>
	<h4><a href="{{url('example13')}}">Next is Map helper >>  </a></h4>
</body>
</html>



<script type="text/javascript">
var products = [
   {name:'Iphone',price:200},
   {name:'Motorola',price:70},
   {name:'Samsung',price:150},
   {name:'Sony',price:98},
   {name:'Windows pone',price:10}
];
let template = '';
products.forEach(function(product){

	let sale = '';
		/*if(product.price < 150){
			 sale = `<span>On sale !!</sapn>`;
		}*/
	
	template += `
			<div class="product">
				<h1>Name: ${product.name}</h1>
		   		<strong>Price: $ ${product.price} </strong>
		   		${sale}
	   		</div>
	    `;
});

document.body.insertAdjacentHTML('beforeend',template);
</script>