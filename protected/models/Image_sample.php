<?php
class Image_sample extends CFormModel
{
	//public $image_head;  // set ini jika field tdk ada di table.
	public $name;
	public $types;
	public $title;
	
	public function rules()
    {
        return array(
            array(
				'name', 'file',
                'types'=>'jpg, gif, png, bmp',
                'maxSize'=>1024 * 1024 * 50, // 50MB
                'tooLarge'=>'The file was larger than 50MB. Please upload a smaller file.',
				'tooSmall'=>'kekecilan gan..',
            ),
        );
    }
	
	protected function afterSave()
	{
		parent::afterSave();

		if($_FILES['image_head']['size'] != 0)
			move_uploaded_file($_FILES['image_head']['tmp_name'], "files/header/" . $this->id .".jpg");
			
		$this->arrayMenu();

	}

	
}
?>