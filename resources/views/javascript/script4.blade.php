<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
<script type="text/javascript">
function greet(name){
      return function (lastname){
            console.log(name+ "  " +lastname);
      }
}

greet("Denis")("Ritchi");
var say = greet("Jhon");
say("Doe");  


/////////////////////////////////////////

function buildFunction(){
	var arr = [];
	for(var i=0 ; i < 3 ; i++){
		arr.push(
			(function(j) {
				return function(){
					console.log(j);
				}
			}(i))
			);
		
	}
	return arr;
}

var func = buildFunction();
func[0]();
func[1]();
</script>
</html>