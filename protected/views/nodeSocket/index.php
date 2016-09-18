<?php
/**
 * @var nodeSocketController $this
 */
?>
<h3>Instruction</h3>
https://github.com/oncesk/yii-node-socket <br>

<b>Don't forget run nodejs server <i style="color: #079c59">./yiic node-socket start</i> before example usage</b>
<ul>
	<li>1. Open "Go to this page for catch events example" page for catching events</li>
	<li>2. Open "Send simple event" or "Send simple room event" and see result on "Go to this page for catch events example"</li>
</ul>
<ul>
	<li><a href="<?php echo $this->createUrl('nodeSocket/eventListener');?>" target="_blank">Go to this page for catch events example</a></li>
	<li><a href="<?php echo $this->createUrl('nodeSocket/sendEvent');?>">Send simple event</a></li>
	<li><a href="<?php echo $this->createUrl('nodeSocket/sendRoomEvent');?>">Send simple room event</a></li>
</ul>

<b> NOTE :</b>
<p>delete D:\WEB\yiiProject\yiiTest\protected\runtime\socket-transport.pid</p> (nanti cr tau knp tidak bs restart lg)


<pre>
Hi, i can not test it right now, but by the code you can send and catch it inside the room or outside

if outside code should be like that

var socket = new YiiNodeSocket();
socket.onConnect(function () {
  socket.on('user-event', function () {

  });
});

or inside

var socket = new YiiNodeSocket();
socket.onConnect(function () {
  socket.room('testRoom').join(function (success, numberOfRoomSubscribers) {
        if (success) {
            console.log(numberOfRoomSubscribers + ' clients in room: ' + roomId);
            // do something

            // bind events
            this.on('user-event', function (newMembersCount) {
                // fire on client join
            });
        } else {
            // numberOfRoomSubscribers - error message
            alert(numberOfRoomSubscribers);
        }
    });
});
maybe this helps you
</pre>