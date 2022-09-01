var notificationsWrapper = $('.nav-item.dropdown');
var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
var notificationsCountElem = notificationsToggle.find('span[data-count]');
var notificationsCount = parseInt(notificationsCountElem.data('count'));
var notifications = notificationsWrapper.find('#ahmed');

// Subscribe to the channel we specified in our Laravel Event
var channel = pusher.subscribe('notification');

// Bind a function to a Event (the full Laravel class)
channel.bind('App\\Events\\NewNotification', function (data) {
    var existingNotifications = notifications.html();

    var newNotificationHtml=`<a href="`+data.url_route +`" class="dropdown-item"><small>`+ data.title +`</small> <small class="float-right text-muted time">` + data.date +`</small> </a>
    <div class="dropdown-divider"></div>`;

    notifications.html(newNotificationHtml + existingNotifications);
    notificationsCount += 1;
    notificationsCountElem.attr('data-count', notificationsCount);
    notificationsWrapper.find('#notif-count').text(notificationsCount);
    notificationsWrapper.show();

    playAudio();


});


function playAudio() {
    var x = new Audio('https://assets.mixkit.co/sfx/download/mixkit-software-interface-start-2574.wav');
    // Show loading animation.
    var playPromise = x.play();

    if (playPromise !== undefined) {
        playPromise.then(_ => {
            x.play();
        })
            .catch(error => {
            });

    }
}
