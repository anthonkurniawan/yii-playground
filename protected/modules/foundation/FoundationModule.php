<?php
		
class FoundationModule extends CWebModule
{
  public $preload=array('foundation');
        
		protected function preinit()
        {
			$this->setComponents(array(
                'foundation'=>array(
                        //'class'=>'admin.extensions.foundation.components.foundation', /* assuming you extracted foundation under extensions */
						'class'=>'ext.foundation.components.Foundation', // assuming you extracted foundation under extensions
						//'responsiveCss'=>true, // or true if you want it to be responsive (i.e. change as screen becomes bigger and smaller)
						//'coreCss'=>true,
						//'yiiCss'=>true,
						//'enableJS'=>true,
                ),
            ));
				
			// $this->setImport(array(									//# LOAD IMPOR DARI DIREKTORI ( modules/Admin )
                        // 'Admin.models.*',
                        // 'Admin.components.*',
            // )); 
           
		   $this->layout = 'main';     //# ATAU BISA DGN ( public function beforeControllerAction($controller, $action) )
 
        }
		 /* -- OR -- */
		 // public function init()
		// {
			// (...)
			// $this->configure(array(
				// 'preload'=>array('foundation'),
				// 'components'=>array(
					// 'foundation'=>array(
						// 'class'=>'admin.extensions.foundation.components.foundation',
						// 'coreCss'=>true,
						// 'responsiveCss'=>true,
						// 'yiiCss'=>true,
						// 'enableJS'=>true,
					// ),
				// )
			// ));
			// $this->preloadComponents();
			// (...)
		// }
		
		//# BISA JUGA GUNAKAN FUNGSI INI UNTUK CONTROL ROUTE NYA
		// public function beforeControllerAction($controller, $action)
		// {
			// if(parent::beforeControllerAction($controller, $action))
			// {
				// // this method is called before any module controller action is performed
				// // you may place customized code here
				// $controller->layout = 'main';
				// return true;
			// }
			// else
				// return false;
		// }
		
}
