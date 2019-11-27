<!DOCTYPE html>
<html>
<head>
	<title>Underscore.js</title>
</head>
<body>
<select id="changeSelect">
	<option>One</option>
	<option>two</option>
	<option>three</option>
</select>

<select id="mySelect">
	<option></option>
</select>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.9.1/underscore-min.js" integrity="sha256-G7A4JrJjJlFqP0yamznwPjAApIKPkadeHfyIwiaa9e0=" crossorigin="anonymous"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#changeSelect").change(function(){
		console.log($(this).val());
		
		     $('#mySelect').append($("<option></option>")
		                    .attr("value",$(this).val())
		                    .text($(this).val())); 
		
	});
});

//Each function
//_.each([1, 2, 3], alert);
//_.each({one: 1, two: 2, three: 3}, alert);

//Map function
 var data = _.map([1,2,3],function(num){
	return  num * 2;
});
//console.log(data);

//Reduce function
var data2 = _.reduce([1,2,3],function(start,num){
	return  start + num;
},0);
//console.log(data2);

//reduceRight Function
var data3 = _.reduceRight([1,2,3],function(start,num){
	return  start+num;
},0);
//console.log(data3);

//find Function
var data4 = _.find([1,2,3],function(num){
	return  num % 2 == 0 ;
});
//console.log(data4);

//filter Function
var data5 = _.filter([1,2,3,4,5,6],function(num){
	return  num % 2 == 0 ;
});
//console.log(data5);

//findWhere Function
var list = [{one: 1 },{one : 2},{one: 3}, {one: 4}, {one : 5},{one :2}];
var data6 = _.findWhere(list,{one : 2});
//console.log(data6); //If no match is found, or if list is empty, undefined will be returned.

//where Function
var list = [{one: "one" },{one : "two"},{one: "three"}, {one: "four"}, {one : "five"},{one :"two"}];
var data7 = _.where(list,{one : "two"});
//console.log(data7); //returns data with duplicate also 

//reject function
var odds = _.reject([1, 2, 3, 4, 5, 6], function(num){ return num % 2 == 0; });
//console.log(odds);

//every function
var data8 = _.every([2, 4,6], function(num){ return num % 2 == 0; });
//console.log(data8);  //Returns true if all of the values in the list pass the predicate truth test.

//some function
var data9 = _.some([1, 2, 3, 4, 5, 6], function(num){ return num % 2 == 0; });
//console.log(data9);  //Returns true if any of the values in the list pass the predicate truth test.

//contains function
var data10 = _.contains([1, 2, 3, 4, 5, 6],6);
//console.log(data10);  

//invoke function
var data11 = _.invoke([[1, 2, 3],[5,8,7,6]],"sort");
//console.log(data11);

//pluck function
var stooges = [{name: 'moe', age: 40}, {name: 'larry', age: 50}, {name: 'curly', age: 60}];
_.pluck(stooges, 'name');
//console.log(_.pluck(stooges, 'name')); 

//range Function
var data12 = _.range(1, 10,1);
console.log(data12);
var all = data12.forEach(function(res){
	//console.log(res * 2);
});
//console.log(all);

//fibonacci Function
var fibonacci = _.memoize(function(n) {
  return n < 2 ? n: fibonacci(n - 1) + fibonacci(n - 2);
});
console.log(fibonacci(8));


</script>
</html>