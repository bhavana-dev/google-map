<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">
	/*var a="Hello World";
	function b(){
		
		console.log("Function b");
	} 
	b();
	console.log(a);

//////////////////////////
	b1(); 
	console.log(a1); //Variable printed before assigning
	var a1="Hello World";
	function b1(){
		
		console.log("Function b1");
	} */

function b(){
	var myVar ;
	console.log(myVar);
}

function a(){
	var myVar = 2;
	
	console.log(myVar);
	b();
}
var myVar = 1;
a();
console.log(myVar);

//////////////////////////////////
//Associativity
var  a =1 , b =2 , c= 3;

a =b = c ;
console.log(a);
console.log(b);
console.log(c);

///////////////
console.log(3 < 2 < 1); //true
console.log(1 < 2 < 3); //true
//////////////////////
var a = 0;
var b = false;
if(a === b){
	console.log("Equal");
}else{
	console.log("Nope");
}
</script>
</html>