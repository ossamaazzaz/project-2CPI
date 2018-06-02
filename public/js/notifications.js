// Enable pusher logging - don't include this in production
var notifications = [];
Pusher.logToConsole = true;

var pusher = new Pusher('1f6e9b9676f948197518', {
  cluster: 'eu',
  encrypted: true
});
var UserId = document.getElementById("userId").value;
if (UserId == "noId") {
  console.log("guest");
}else {
      var channel = pusher.subscribe('privateorder.'+UserId);
      channel.bind('App\\Events\\OrderConfirmed', function(data) {
      console.log("data : "+data.data);
    });
}
//dealling with 5 notifications
jQuery(document).ready(function (){
    jQuery.noConflict();

});
//dealing with show more

//dealing with real time notifications

//dealing with desktop notifications







// const NOTIFICATION_TYPES = {
//     follow: 'App\\Notifications\\UserFollowed'
// };
// var myVar = setInterval(getN, 5000);
// function getN(){
// 	jQuery.ajax({

//                 type : "GET",
//                 url : "/notifications",
//                 success : function(data){
//                 	//addNotifications(data, "#notifications");
//                 	console.log("ssssssss : "+data);
//                 }
//         });
// }

// function addNotifications(newNotifications, target) {
//     notifications = _.concat(notifications, newNotifications);
//     // show only last 5 notifications
//     notifications.slice(0, 5);
//     showNotifications(notifications, target);
// }
// function showNotifications(notifications, target) {
//     if(notifications.length) {
//         var htmlElements = notifications.map(function (notification) {
//             return makeNotification(notification);
//         });
//         $(target + 'Menu').html(htmlElements.join(''));
//         $(target).addClass('has-notifications')
//     } else {
//         $(target + 'Menu').html('<li class="dropdown-header">No notifications</li>');
//         $(target).removeClass('has-notifications');
//     }
// }

// function notifyMe() {
//   // Let's check if the browser supports notifications
//   if (!("Notification" in window)) {
//     alert("This browser does not support desktop notification");
//   }

//   // Let's check whether notification permissions have already been granted
//   else if (Notification.permission === "granted") {
//     // If it's okay let's create a notification
//     var notification = new Notification("Hi there!");
//   }

//   // Otherwise, we need to ask the user for permission
//   else if (Notification.permission !== "denied") {
//     Notification.requestPermission(function (permission) {
//       // If the user accepts, let's create a notification
//       if (permission === "granted") {
//         var notification = new Notification("Hi there!");
//       }
//     });
//   }

//   // At last, if the user has denied notifications, and you 
//   // want to be respectful there is no need to bother them any more.
// }
// Notification.requestPermission().then(function(result) {
//   console.log(result);
// });function spawnNotification(body, icon, title) {
//   var options = {
//       body: body,
//       icon: icon
//   };
//   var n = new Notification(title, options);
// }


