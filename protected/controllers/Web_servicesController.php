<?php
class web_servicesController extends Controller
//class widgetController extends tambahDB
{
	//public $layout='//layouts/column1';
	
	public function actions()
    {
        return array(
            'quote'=>array(
                'class'=>'CWebServiceAction',
				'classMap'=>array(
                    'Post'=>'Post',  // atau cukup 'Post'
				),
            ),
        );
    }
	
	/**
     * @param string the symbol of the stock
     * @return float the stock price
     * @soap
     */
	 #http://hostname/path/to/index.php?r=stock/quote
	 #Secara default, CWebServiceAction menganggap controller saat ini adalah penyedia layanan. Itulah mengapa kita mendefinisikan metode getPrice di dalam kelas StockController.
    public function getPrice($symbol)
    {
        $prices=array('IBM'=>100, 'GOOGLE'=>350);
        return isset($prices[$symbol])?$prices[$symbol]:0;
        //...return stock price for $symbol
    }
	
	public function actionIndex(){
		$this->render('index');
	}
	
	#to avoid this error when new function were added to the web service then add this two lines on your client side ws consumer (before you call "new SoapClient.."):
	//ini_set( 'soap.wsdl_cache_enable' , 0 );
	//ini_set( 'soap.wsdl_cache_ttl' , 0 );

}
?>