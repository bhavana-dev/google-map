<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">
	// By value
var a = 10;
var  b;
b = a;
a = 2;
console.log(a);
console.log(b);

// By reference (all objects (including function))
var c = {greeting : "Hiiiii"};
var d ;
d = c ;
c.greeting = "Hello" ; //Mutate
console.log(c);
console.log(d);

// By reference (even as parameter)
function ChangeGreeting(obj){
	obj.greeting = "Test";
}
ChangeGreeting(d);
console.log(c);
console.log(d);

//Equal operator sets up new memory space(new address)
c = {greeting : "Dont know"};
console.log(c);
console.log(d);
</script>
</html>