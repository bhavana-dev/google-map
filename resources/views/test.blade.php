<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Real-time notifications in Laravel using Pusher</title>

</head>
<body>
    <h1>Real-time notifications using Pusher In Laravel</h1>
    <input type="button" id="notificationButton" value="Notify" />
    <!-- Incldue Pusher Js Client via CDN -->
    
    <script>
      document.addEventListener('DOMContentLoaded', function () 
        {

            
            if (Notification.permission !== "granted")
            {
                Notification.requestPermission();
                // alert("Dont block otherwise you will receiveany ntificatonn");
            }

        
        });


      function notifyBrowser(title,desc,url) 
        {
            

            if (Notification.permission !== "granted"){
                Notification.requestPermission();            
            }else if (Notification.permission === 'denied') {
                alert("you've blocked notifiction setting");
            }
            else{
                var notification = new Notification(title, {
                icon:'http://ppa.preferredpersonnel.co.ke/assets/img/ppa-logo.png',
                body: desc,
                });

                /* Remove the notification from Notification Center when clicked.*/
                notification.onclick = function () {
                    window.open(url); 
                    //notification.close();

                };

                /* Callback function when the notification is closed. */
                notification.onclose = function () {
                    console.log('Notification closed');
                };

            }
        }
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            
            $("#notificationButton").click(function(){
                var id = 10;
                var title = " Testing notification";
                var desc = " Testing desc";
                var url =  "http://localhost:8000/test/"+id;
                notifyBrowser(title,desc,url);
                return false;
            });
        });
    </script>
</body>
</html>