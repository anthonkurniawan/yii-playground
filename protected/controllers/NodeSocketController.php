<?php
class NodeSocketController extends Controller {

	public function actionIndex() {
		$this->render('index');
	}

	public function actionSendEvent() {
		//$event = Yii::app()->nodeSocket->createEventFrame();
		$frame = Yii::app()->nodeSocket->getFrameFactory()->createEventFrame();
		$frame->setEventName('event.example');
		$frame['data'] = array(
			1,
			array(
				'red',
				'black',
				'white'
			),
			new stdClass(),
			'simple string'
		);
		$frame->send();
		$this->render('sendEvent');
	}

	public function actionSendRoomEvent() {
		$event = Yii::app()->nodeSocket->createEventFrame();

		$event->setRoom('example');
		$event->setEventName('example.room.event');

		$event['type_string'] = 'hello world';
		$event['type_array'] = array(1, 2, 3);
		$event['type_object'] = array('one' => 1, 'two' => 2);
		$event['type_bool'] = true;
		$event['type_integer'] = 11;

		$event->send();
		$this->render('sendRoomEvent');
	}

	public function actionEventListener() {
		Yii::app()->nodeSocket->registerClientScripts();
		$this->render('eventListener');
	}
}