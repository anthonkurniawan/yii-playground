<?php
class LangSelector extends CWidget 
{
	public function run() {
		$available_lang =array(
			'id'=>'Bahasa Indonesia',
			'en'=>'English',
			'en_US'=>'US English',
			'it_IT'=>'Italian',
		);

		$this->render('lang_selector', array(
			'available_lang'=>$available_lang,
		));
	}
}

?>
