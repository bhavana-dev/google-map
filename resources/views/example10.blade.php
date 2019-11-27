
<!DOCTYPE html>
<html>
<head>
	<title>Template string or Template Literals3 and Literals4</title>
</head>
<body>
	
		<ul class="players">
			
		</ul> 

	<h4><a href="{{url('example9')}}">Back << </a></h4>
	<h4><a href="{{url('example11')}}">Next is Foreach helper >>  </a></h4>
</body>

<script type="text/javascript">
const players = [
   {jersey:56,name:"Djounte Murray",position:"Point guard",PPG:2.6},
   {jersey:98,name:"Dennis Rodman",position:"Small Forward",PPG:10.8},
   {jersey:1,name:"Michael Jordan",position:"Small Forward",PPG:345.6},
   {jersey:2,name:"Lebron James",position:"Shooting Guard",PPG:26.7},
   {jersey:33,name:"Patrick Ewing",position:"Center",PPG:20.2}
]
let template ='';
const list = document.querySelector('.players');
for(let i= 0 ; i < players.length; i++){
	template += `
				<li>${players[i].jersey} , ${players[i].name} , ${players[i].position} , ${players[i].PPG}</li>
			`;
}
list.insertAdjacentHTML('beforeend',template);
</script>
</html>
