<?php

class MediaController extends AdminController
{	
	public $layout='//layouts/column1';
	
	public function actionIndex()
	{		
		$this->render('index');
	}
	
	//public function actionReadXls() {
	public function actionRead1() 
	{
		$objPHPExcel = Yii::app()->excel;	
		$objPHPExcel = PHPExcel_IOFactory::load("test_input.xls");
		$objWorksheet = $objPHPExcel->getActiveSheet();
		
		echo '<table border=1>' . "\n";
		foreach ($objWorksheet->getRowIterator() as $row) 
		{
			echo '<tr>' . "\n";
			$cellIterator = $row->getCellIterator();
			$cellIterator->setIterateOnlyExistingCells(false);
									
									//ECHO "<P><B>  ARRAY CELL ITERATOR </BR>"; PRINT_R($cellIterator );
									/*  $objPHPExcel->setActiveSheetIndex(0) 
		                             ->setCellValue('A'.$row, $rs->fields[0])	*/
									 
			foreach ($cellIterator as $cell) 
			{														//ECHO "<P><B>  ARRAY CELL </BR>"; PRINT_R($cell );
															//ECHO "<P><B>  ARRAY CELL VALUE-->".$cell->getValue('A2'). "</BR>";
				echo '<td>' . $cell->getValue() . '</td>' . "\n";
			}
														ECHO "<b>  ARRAY CELL VALUE :</b> ".$cell->getValue('B').", ";
			echo '</tr>' . "\n";
		}
		echo '</table>' . "\n";
		
		//$model=new TblUserMysql('search');		
		//$model=new tblUserMysql;
		//$this->render('testXls',array('model'=>$model ));
	}
	
	//TESTING USE "php_excel_reader_22.1" EXTENSION
	public function actionRead2() 
	{
		//require_once '.\protected\extensions\php_excel_reader_221\excel_reader2.php';  // PAKE INI JG BISA
		Yii::import('ext.EXCEL_PDF.php_excel_reader_221.excel_reader2',true);			
		
		$data = new Spreadsheet_Excel_Reader("test_input.xls");
		
		echo $data->dump(true,true);
	}
	
	
	//TESTING EXPORT TO EXCEL  ----------------------------------------------------------------------------------------------------
	public function actionExport(){			print_r($_POST); 
			# LOAD DATA VIA MYCActiveRecord FN 
			$dataProvider = TblUserMysql::model()->loadData();
			
			$this->widget('ext.EXCEL_PDF.EExcelView', array(
				'dataProvider' => $dataProvider,
				'grid_mode'=>'export',
				'title' => 'Daftar ListData',
				//'exportType'=>'CSV',	//'Excel5','Excel2007',PDF,CSV,HTML	
				//'exportType'=>$_POST["ftype"],
				'exportType'=>isset($_POST["ftype"])?$_POST["ftype"] : 'PDF', 
				'filter' => $dataProvider,
				'columns' => array(
					'id',
					'username',
					'email',
					'first_name',
					'role',
					// array(			
						// //'class'=>'TblData',//'name' =>'ket',
						// 'name'=>'TblData.ket',
						// 'value' =>'TblData::model()->FindByPk($data->id)->ket', 
					// ), 
				),
			));
		//}
	}
	
	#EXPORT WITH HTML2PDF  -- LOM BISA!!!!!!
	public function actionHtml2pdf(){
		# ATAU DI TARO FILE TERPISAH ( file.php )
		ob_start();
		echo $this->renderPartial('index');  // source/te,plate file to convert
		$content = ob_get_clean();

		Yii::import('application.extensions.EXCEL_PDF.tcpdf.ETcPdf');
		try
		{
			// $html2pdf = new HTML2PDF('P', 'A4', 'en');
			$html2pdf = new ETcPdf('P', 'A4', 'en');
			//$html2pdf->setModeDebug();
			$html2pdf->setDefaultFont('Arial');
			$html2pdf->writeHTML($content,false);
			$html2pdf->Output("pdfdemo.pdf");
		}
		catch(HTML2PDF_exception $e) {
			echo $e;
			exit;
		}
		
		// $this->renderPartial('file');
		
		# OR
		// $pdf = Yii::createComponent('application.extensions.tcpdf.ETcPdf',  'P', 'cm', 'A4', true, 'UTF-8');
		// $pdf->SetCreator(PDF_CREATOR);
		// $pdf->SetAuthor("Nicola Asuni");
		// $pdf->SetTitle("TCPDF Example 002");
		// $pdf->SetSubject("TCPDF Tutorial");
		// $pdf->SetKeywords("TCPDF, PDF, example, test, guide");
		// $pdf->setPrintHeader(false);
		// $pdf->setPrintFooter(false);
		// $pdf->AliasNbPages();
		// $pdf->AddPage();
		// $pdf->SetFont("times", "BI", 20);
		// $pdf->Cell(0,10,"Example 002",1,1,'C');
		// $pdf->Output("example_002.pdf", "I");
	}
		
	public function actionWrite1()
	{
		$model = new tblUserMysql();
		$this->widget('ext.EXCEL_PDF.EExcelView', array(
			'grid_mode'=>'export',
			'title' => 'Daftar',
			'dataProvider' => $model->search(),
			'filter' => $model,
			'columns' => array(
			'id',
			'username',
			'email',
			'role',
			),
		));
	}
	
	public function actionWrite2()
	{
		$model = new tblUserMysql();
        $labels = $model->attributeNames();
        $data = $model->findAll();
		
		#CARA2 --------------------------------------------------------------------------------------- SUCCESS
		// get a reference to the path of PHPExcel classes -  Yii::import('ext.PHPExcel',true);
		//**$phpExcelPath = Yii::getPathOfAlias('ext.phpexcel.Classes'); 
		//$phpExcelPath = Yii::getPathOfAlias('ext.phpexcel');
		
		//---------------------------------- ga dipake(updated autoloader) --------------------------------//
		// Turn off our amazing library autoload 
		//**spl_autoload_unregister(array('YiiBase','autoload'));        
		//Yii::import('ext.phpexcel',true);
		//Yii::import('application.extensions.phpexcel.JPhpExcel');
		
		// making use of our reference, include the main class, when we do this, phpExcel has its own autoload registration
		// procedure (PHPExcel_Autoloader::Register();)
		//include($phpExcelPath . DIRECTORY_SEPARATOR . 'PHPExcel.php');
		//-------------------------------------------------------------------------------------------------------------//
		//** Create new PHPExcel object
		//$objPHPExcel = new PHPExcel();   //#cara1
	    $objPHPExcel = Yii::app()->excel;	   //#cara2
 
		// Set properties
		$objPHPExcel->getProperties()->setCreator("Anthon Kurniawan")
		->setLastModifiedBy("blaquecry")
		->setTitle("PDF Test Document")
		->setSubject("PDF Test Document")
		->setDescription("Test document for PDF, generated using PHP classes.")
		->setKeywords("pdf php")
		->setCategory("Test result file");
		
		// --------------------------------- CONTENT
		// $objPHPExcel->setActiveSheetIndex(0)
			// ->setCellValue('A1', 'Hello')
 
		// // Miscellaneous glyphs, UTF-8
		// $objPHPExcel->setActiveSheetIndex(0)
            // ->setCellValue('A4', 'Miscellaneous glyphs')
 
		// // Rename sheet
		// $objPHPExcel->getActiveSheet()->setTitle('Simple');
 
		// // Set active sheet index to the first sheet, so Excel opens this as the first sheet
		// $objPHPExcel->setActiveSheetIndex(0);

	 //Set labels in excel file
        $objPHPExcel->getActiveSheet()->setCellValue('A1',$labels[0]);
        $objPHPExcel->getActiveSheet()->setCellValue('B1',$labels[1]);
        $objPHPExcel->getActiveSheet()->setCellValue('C1',$labels[2]);
        $objPHPExcel->getActiveSheet()->setCellValue('D1',$labels[3]);
        $i = 2;
        foreach($data as $record){

            //Set value for each cell
            $objPHPExcel->getActiveSheet()->setCellValue('A'. $i,$record->id);
            $objPHPExcel->getActiveSheet()->setCellValue('B'. $i,$record->username);
            $objPHPExcel->getActiveSheet()->setCellValue('C'. $i,$record->email);
            $objPHPExcel->getActiveSheet()->setCellValue('D'. $i,$record->role);
            $i++;
        }
   
        //Set width for each B,C,D cell 
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(24);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(24);
        $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(24);
		
		//------------------------------------ OUTPUT
		$filename="test";
		
		// SAVE TO  : Redirect output to a client’s web browser (PDF)
		//header('Content-Type: application/pdf');
		// header('Content-Disposition: attachment;filename="01simple.pdf"');
		// header('Cache-Control: max-age=0');
 
		// $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'PDF');
		// $objWriter->save('php://output');
		// Yii::app()->end();

		// SAVE TO (Excel2007)
		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment;filename="'.$filename.'.xlsx"');
		header('Cache-Control: max-age=0');
		$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');	
		$objWriter->save('php://output');
		Yii::app()->end();
		
		//$objPHPExcel->saveExcel2007($objPHPExcel,'test.xlsx'); //**! LANGSUNG DOWNLOAD TANPA KONFIRM(LOKASI :main root app )
		// Once we have finished using the library, give back the TO autoload nya YII
		//**spl_autoload_register(array('YiiBase','autoload'));
	
		$this->render('TestXls',array('model'=>$model));
	}
	

}
?>