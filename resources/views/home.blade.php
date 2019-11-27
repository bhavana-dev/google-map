@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <div id="token"></div>
                    <div id="msg"></div>
                    <div id="notis"></div>
                    <div id="err"></div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://www.gstatic.com/firebasejs/4.6.2/firebase.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-messaging.js"></script>

<script src="https://www.gstatic.com/firebasejs/7.2.1/firebase-analytics.js"></script>

<script>
        MsgElem = document.getElementById("msg")
        TokenElem = document.getElementById("token")
        NotisElem = document.getElementById("notis")
        ErrElem = document.getElementById("err")
        // Initialize Firebase
        // TODO: Replace with your project's customized code snippet
        var config = {
            apiKey: "AIzaSyDtQWo88Wt7L01JXzEhBUCe0YybNlA3QyI",
            authDomain: "testing-94d28.firebaseapp.com",
            databaseURL: "https://testing-94d28.firebaseio.com",
            storageBucket: "testing-94d28.appspot.com",
            messagingSenderId: "91709905226",
            appId: "1:91709905226:web:fa39dbb0201a0772cf49b3"
        };
        firebase.initializeApp(config);

        var  messaging = firebase.messaging();

        messaging.onMessage(function(payload) {
            console.log("Message received. ", payload);
            NotisElem.innerHTML = NotisElem.innerHTML + JSON.stringify(payload) 
        });
        
        messaging
            .requestPermission()
            .then(function () {
                MsgElem.innerHTML = "Notification permission granted." 
                console.log("Notification permission granted.");

                // get the token in the form of promise
                return messaging.getToken()
            })
            .then(function(token) {
                TokenElem.innerHTML = "token is : " + token
            })
            .catch(function (err) {
                ErrElem.innerHTML =  ErrElem.innerHTML + "; " + err
                console.log("Unable to get permission to notify.", err);
            });

        
    </script>
@endsection
