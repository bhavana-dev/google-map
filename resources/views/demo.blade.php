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

    <!-- Incldue Pusher Js Client via CDN -->
    <script src="https://js.pusher.com/4.4/pusher.min.js"></script>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <!-- Alert whenever a new notification is pusher to our Pusher Channel -->

    <script>
      //alert("swbfjwebfjwe");
      var OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
          OneSignal.init({
            appId: "07ba6099-c5f3-4ef8-9c74-1c945d75ac5d",
          });
      });
      Pusher.logToConsole = true;
        //Remember to replace key and cluster with your credentials.
        var pusher = new Pusher('874a2086ae007b106fbe', {
            cluster: 'ap2',
            encrypted: true
        });

        //Also remember to change channel and event name if your's are different.
        var channel = pusher.subscribe('notification');
        //console.log(channel);
        channel.bind('notification-event', function(message) {
            alert(message);
        });

   
    </script>
</body>
</html>