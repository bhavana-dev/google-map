
// Initialize the Firebase app in the service worker by passing in the
// messagingSenderId.
var config = {
            apiKey: "AIzaSyDtQWo88Wt7L01JXzEhBUCe0YybNlA3QyI",
            authDomain: "testing-94d28.firebaseapp.com",
            databaseURL: "https://testing-94d28.firebaseio.com",
            storageBucket: "testing-94d28.appspot.com",
            messagingSenderId: "91709905226",
        };
firebase.initializeApp(config);

// Retrieve an instance of Firebase Messaging so that it can handle background
// messages.
var messaging = firebase.messaging();

messaging.setBackgroundMessageHandler(function(payload) {
  console.log('[firebase-messaging-sw.js] Received background message ', payload);
  // Customize notification here
  const notificationTitle = 'Background Message Title';
  const notificationOptions = {
    body: 'Background Message body.',
    icon: '/itwonders-web-logo.png'
  };

  return self.registration.showNotification(notificationTitle,
      notificationOptions);
});