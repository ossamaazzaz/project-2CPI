// Enable pusher logging - don't include this in production
var c=0;
var isActive = false;
var notifications = [];
const NOTIFICATION_TYPES = {
    Confirmation: 'App\\Notifications\\Confirmation',
    MissingProducts: 'missingproduct'
};

const NOTIFICATION_TYPES_RT = {
    Confirmation: 'OrderConfirmed',
    MissingProducts: 'MissingProducts'
};

//dealing with show more
function getAllNotifications() {
	console.log("clicked");
	jQuery.ajax({
            type : "GET",
            url : "/showmore",
            success : function(data){
            	notifications = [];
            	addNotifications(data, "#navbarDropdown");
            }
    	});
}



//dealing with desktop notifications


// add new notifications
function addNotifications(newNotifications, target) {
    notifications = notifications.concat(newNotifications);
    // show only last 5 notifications
    showNotifications(notifications, target);
}

// show notifications
function showNotifications(notifications, target) {
    if (notifications.length) {
        var htmlElements = notifications.map(function (notification) {
        	console.log(notifications.length);
            return makeNotification(notification);
        });
        counter = `<li class="head text-light" >
                        <div class="row">
                          <div class="col-lg-12 col-sm-12 col-12">
                            <span>Notifications (<span id="notificationListCounter">`+ notifications.length +`</span>)</span>
                          </div>
                      </li>`;
        htmlElements.unshift(counter);
        jQuery(target + 'Menu').html(htmlElements.join(''));
        jQuery(target).addClass('has-notifications');
    } else {
        jQuery(target + 'Menu').html(`<li class="notification-box" style="width: 400px; "> 
                        <div class="row">  
                          <div class="col-lg-12 col-sm-12 col-12">  
                            <div>
                           		Il n'y a pas de notification !
                            </div>
                          </div>    
                        </div>
                      </li>
                      <li class="divider"></li>`);
        jQuery(target).removeClass('has-notifications');
    }
}

// create a notification li element
function makeNotification(notification) {
    var notificationIsReady = MakeAndRouteNotification(notification);
    return notificationIsReady;
}

// get the notification route based on it's type
function MakeAndRouteNotification(notification) {
	// make the route 
    var to = '';
    var code = notification.data;
    if (notification.type === NOTIFICATION_TYPES.MissingProducts || notification.type === NOTIFICATION_TYPES_RT.MissingProducts) {
        to = `onclick="getmissingproduct('{{$notif->data }}')"`;
    } else if (notification.type === NOTIFICATION_TYPES.Confirmation || notification.type === NOTIFICATION_TYPES_RT.Confirmation) {
        to = `href="facture/` + code+`"`;
    }
    // make the content
    var text = '';
    text += '<li class="divider"></li>'
    text += '<li class="notification-box" style="width: 400px; ">'
    if (notification.type === NOTIFICATION_TYPES.MissingProducts || notification.type === NOTIFICATION_TYPES_RT.MissingProducts) {
        text += '<strong class="text-info">Produits manquants</strong>';
        text += '<div class="row"><div class="col-lg-12 col-sm-12 col-12">';
        text += '<a '+ to+ '>';
        text += "il y a un manque de produits dans ta panier: "+code;
        text += '<br>cliquez pour comfirmer,annulez ou changer!'
        text += '</a>';
        text += '</div>'
        
    } else if (notification.type === NOTIFICATION_TYPES.Confirmation || notification.type === NOTIFICATION_TYPES_RT.Confirmation) {
    	text += '<strong class="text-info">Confirmation de la commande</strong>';
    	text += '<div class="row"><div class="col-lg-12 col-sm-12 col-12">';
        text += '<a '+ to +'>';
        text += "votre code : "+code;
        text += '</a>';
        text += '</div>';
    }
    text += `<small class="text-warning">`+notification.created_at+`</small>`;
    text += '</div>';
    text += '</li>'
    return text;
}
function notifyMe() {
  // Let's check if the browser supports notifications
  if (!("Notification" in window)) {
    alert("This browser does not support desktop notification");
  }

  // Let's check whether notification permissions have already been granted
  else if (Notification.permission === "granted") {
    // If it's okay let's create a notification
    var notification = new Notification("There is new Notifications check it out !");
  }

  // Otherwise, we need to ask the user for permission
  else if (Notification.permission !== "denied") {
    Notification.requestPermission(function (permission) {
      // If the user accepts, let's create a notification
      if (permission === "granted") {
        var notification = new Notification("There is new Notifications check it out !");
      }
    });
  }

  // At last, if the user has denied notifications, and you 
  // want to be respectful there is no need to bother them any more.
}
Notification.requestPermission().then(function(result) {
  console.log(result);
});function spawnNotification(body, icon, title) {
  var options = {
      body: body,
      icon: icon
  };
  var n = new Notification(title, options);
}

jQuery(document).ready(function (){
    jQuery.noConflict();
    //dealling with 5 notifications
	jQuery.ajax({
            type : "GET",
            url : "/getnotifications",
            success : function(data){
            	addNotifications(data, "#navbarDropdown");
            }
    });
	window.onfocus = function () { 
	  	isActive = true;
	  	console.log("isActive")
	}; 
	window.onblur = function () { 
		isActive = false;
		console.log("isNotActive")
	};
    //dealing with real time notifications
    Pusher.logToConsole = true;
    var counterNewN = document.getElementById('notificationCounter');
	var pusher = new Pusher('1f6e9b9676f948197518', {
	  cluster: 'eu',
	  encrypted: true
	});
	var UserId = document.getElementById("userId").value;
	if (UserId == "noId") {
		console.log("guest");
	}else { 
	    var channelConfirmation = pusher.subscribe('privateorder.'+UserId);
	   	channelConfirmation.bind('OrderConfirmed', function(data) {
	   			c++;
	   			counterNewN.setAttribute("data-count",c);
	    		addNotifications({data:data.data,type:'OrderConfirmed',created_at:data.created_at}, '#navbarDropdown');
				if (window.isActive == false){
					notifyMe();
				}
						
	    });
	    var channelMissingProducts = pusher.subscribe('privateorder.'+UserId);
	    channelMissingProducts.bind('MissingProducts', function(data) {
	    		c++;
	   			counterNewN.setAttribute("data-count",c);
	    		addNotifications({data:data.data,type:'MissingProducts',created_at:data.created_at}, '#navbarDropdown');
	    		console.log(data);
	    });
	}
	jQuery("#noDrdown").click(function() {
		c=0;
		counterNewN.setAttribute("data-count",c);
	});
});






