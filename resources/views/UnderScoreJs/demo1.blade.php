@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <!-- <div class="card-header">Dashboard</div> -->

                <div class="card-body" id="bodyCard">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <ul>
                    	<li id="li"></li>
                    </ul>
                    <button type="button" id="clusterDiv">Cluster</button>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/underscore-min.js')}}"></script>
<script type="text/javascript">
//Gruop by
// console.log(_.union([101, 2, 1, 10],[1, 2, 3],[2, 1]));
// console.log(_.zip(['moe', 'larry', 'curly',"Doe"], [30, 40, 50], [true, false, false]));
const kindergarten = [
		  	{ time: '12:00', location: 'mall' },
		  	{ time: '9:00', location: 'store' },
		  	{ time: '9:00', location: 'mall' },
		  	{ time: '12:00', location: 'store' },
		  	{ time: '12:00', location: 'market' },
		];
var partners = _.chunk(kindergarten, 2);
console.log(partners);
const ready = function(){
	document.getElementById('clusterDiv').addEventListener('click',show);

	function show(){
		const events = [
		  	{ time: '12:00', location: 'mall' },
		  	{ time: '9:00', location: 'store' },
		  	{ time: '9:00', location: 'mall' },
		  	{ time: '12:00', location: 'store' },
		  	{ time: '12:00', location: 'market' },
		];
		let groupBy = _.groupBy([1.3, 2.1, 2.4,1.5,1.7,0.1,0.3,0.2], function(num){ return Math.floor(num); }); 
		let groupBy2 = _.groupBy(events, function(num){ return num.location; }); 
		let groupBy1 =_.groupBy(['one', 'two', 'three','four','five' ,'hi','d',''], 'length');
		console.log(groupBy2);

		_.each(groupBy2 , function(value){

			if(value.length > 1){
				//console.log("cluster is here");
					//alert("hello");
					_.each(value,function(value2){
						let data  = `<strong class="para">${value2.location} </strong>: <span >${value2.time} </span>` ;
						
						document.getElementById("li").insertAdjacentHTML('beforeend',data);
						//console.log(value2.time);
					});
				
				
			}
		});

	}
}

document.addEventListener("DOMContentLoaded", ready);


	/*const array = [
				{number: 1.,question:"What is your name?" ,mark :2},
				{number: 2.,question:"What is your Hobby?",mark :2},
				{number: 3.,question:"What is your Occupation?",mark :2},
				{number: 4.,question:"Where are you from?",mark :2},
			];
			let total = '';
	_.each(array, function(value){
		// console.log(value);
		 total += value.mark;
		let data  = `<p class="para">${value.number} : ${value.question} (${value.mark} Marks) </p>` ;
		document.getElementById("bodyCard").insertAdjacentHTML('beforeend',data);
		//$(".card-body").append(value);
	});*/
</script>

<script type="text/javascript">
/*
//Map function
_.map([1, 2, 3,4,5,6,7,8,9,10], function(num){ 
	// console.log(num * 3); 
});
	// => [3, 6, 9]
_.map({one: 1, two: 2, three: 3}, function(num, key){ console.log(`key =${key}   , num = ${num * 3}  `); });
	// => [3, 6, 9]
let valueFirst =  _.map([[1, 2], [3, 4], [5, 6], [7, 8]], _.first);
let valueLast =  _.map([[1, 2], [3, 4], [5, 6], [7, 8]], _.last);
console.log(`First : ${valueFirst} , Last : ${valueLast}`);
	// => [1, 3] */
</script>

<script type="text/javascript">
/*//Reduce Function
	var sum = _.reduce([1, 2, 3], function(memo, num){ return memo + num; }, 0);
	console.log(`reduce value is : ${sum}`);

//Reduce Right
var list = [[0, 1], [2, 3], [4, 5]];
var flat = _.reduceRight(list, function(a, b) { return a.concat(b); }, []);
console.log(`Reduce right : ${flat}`);*/
</script>

<script type="text/javascript">
/*//Find Function

const array_map = [
				{number: 1.,question:"What is your name?" ,mark :2},
				{number: 2.,question:"What is your Hobby?",mark :2},
				{number: 3.,question:"What is your Occupation?",mark :2},
				{number: 3.,question:"Where are you from?",mark :2},
			];
	var even = _.find([1, 2, 3, 4, 5, 6], function(num){ return num % 2 == 0; });
	var mapData = _.filter(array_map, function(num){ return num.number <= 3; });
	console.log(`Find : ${even}`);
	console.log(mapData);


//Where function
var where = _.where(array_map, {number : 3 , mark :2});
//console.log(where);
let whereVal = _.each(where ,function (val){
	console.log(val.question);
});


//Reject Function
var odds = _.reject(array_map, function(num){ return num.number === 3; });
console.log(odds);

//Every Function
var every = _.every(array_map, function(num) { return num.number <= 4; }); 
// return true if all data is correct according to condition .
console.log(every);


//Contains Funcion 
let check = { question: "What is your name?"};
let contains= _.contains(array_map[0], check);
console.log(contains);


//Invoke Function
const arr = ["one","two","three"]
let invoke = _.invoke(arr, 'toUpperCase');
console.log(invoke);

//Pluck Function
var stooges = [{name: 'moe', age: 40}, {name: 'larry', age: 50}, {name: 'curly', age: 60}];
console.log(_.pluck(stooges, 'age'));

//Max function
let max = _.max(stooges, function(stooge){ return stooge.name.length; });
console.log(max);

//Min Function 
var numbers = [{name: 'moe', age: 60}, {name: 'larry', age: 40}, {name: 'curly', age: 50}];
console.log(_.min(numbers, function(number){ return number.age; }));

//Sort by
let sortby = _.sortBy([1, 6, 3, 2, 5, 4], function(num){ return Math.sin(num); });
let sortby1 = _.sortBy(numbers, function(num){ return num.age });

console.log(sortby1);
*/


/*//Count by
let countBy = _.countBy([1,2,7,3,4,5,5,4,7,6,7], function(num){ 
	return num;
}); 
var arrCount =  [ 
                {prop1:"10", prop2:"07", prop3: "Geeks"}, 
                {prop1:"12", prop2:"86", prop3: "for"}, 
                {prop1:"11", prop2:"58", prop3: "Geeks"}  ,
                {prop1:"11", prop2:"58", prop3: "Geeks"}  
            ];
let arrVal = _.countBy(arrCount, 'prop3'); 
console.log(arrVal);

//Suffle Function
console.log(_.shuffle(arrCount));

//Sample Function
_.sample([1, 2, 3, 4, 5, 6]);


console.log(_.sample([1, 2, 3, 4, 5, 6], 3));

console.log(_.size(arrCount));

console.log(_.compact([0, 1, false, 2, '', 3,null ,6 ,true ,"hello"]));

console.log(_.rest([5, 4, 3, 2, 1]));

console.log(_.without([1, 2, 1, 0, 3, 1, 4,2 ,4], 0, 1,3));*/
</script>
@endsection

