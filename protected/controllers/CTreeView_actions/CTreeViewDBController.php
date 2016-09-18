<?php
class TreeDBController extends Controller
{
	public $layout='//layouts/column2';
	
	#-----------Tree with db
	public function actionTree_db()
	{
		$model =$this->getDataFormatted_DB( $this->getData() );				//dump( $this->getData()  );
        $this->render('/widget/CTreeView/CTreeView_db',array('data'=>$model));
	}
	
	#-----------Tree with data " Async"
	public function actionTreeFill() {
        if ( ! isset($_GET['root']))
            $dataId = 'source';
        else
            $dataId = $_GET['root'];

        $persons = ($dataId == 'source') ?
			$this->getData() : $this->recursiveSearch($dataId, $this->getData());

		$dataTree = array();
        if (is_array($persons)) {													//dump($persons);
            foreach($persons as $value) {									//dump($value['parent']);
                #$dataTree[] = $this->formatData($value);
				if ($_GET['root'] !='source') 
						$dataTree = $this->getChild($value);
				else	
						$dataTree[] = $this->formatData($value);
			}
        }
        echo json_encode($dataTree);	#//echo CTreeView::saveDataAsJson($dataTree);
    }
	
	 // * @return all the data  */
    protected function getData()
    {
	 //$data=$this->getDataFormatted($this->getData_db());
		#$model=TblUserMysql::model()->findAll(1);
		
		// $sql= "SELECT *  FROM tbl_user_mysql as t  
			 // LEFT JOIN tbl_data as t2 ON t.id=t2.id
			 // LEFT JOIN tbl_pic as t3 ON t2.propic_id=t3.pic_id
			 // LEFT JOIN Logs as t4 ON t.id=t4.id_user
			// ";
		// $command = Yii::app()->db->createCommand($sql);
		// $rawData = $command->queryAll();

		// $arr=new CArrayDataProvider($rawData, array(
			// /*'sort'=>array(
				// 'attributes'=>array(
					// 'name' => 'id',
				// ),
			// ),*/
			// 'pagination'=>array(
				// 'pageSize'=>10,
			// ),
		// ));
		
		//$arr = CHtml::listData($listData,'id','username'); 			dump($arr);
		#$arr = array ( "table" =>CHtml::listData($listData,'id','username') );		dump($arr);
		
		$listData=tblUserMysql::model()->findAll('role=1');		
			foreach( $listData as $key=>$value )	{ 						
				//$res[] = array($value['id'] => $value->attributes);   
				//$res[ $value['id'] ] = $value->attributes;   
				
				$res[]=array(
					'id'=>$value->id,
					'username'=>$value->username,
					'parent'=>array($value->attributes)
				);
			}
			//dump($res); 		echo "<hr>";
		return $res;
	}
	
    /*  * Used by Async Tree  * @param id the Id of the child * @param root the node to test* @return the Familly Member */
    protected function recursiveSearch($id,$array)  		//CARI ARRAY DATA CHILD FROM ID YG DI TERIMA
    {																
       if(is_array($array))
        {
            foreach($array as $person)
            {																	//dump($person);
                if($person['id']==$id)
                    return $person["parent"];
            }
        }
        return null;
    }
	
	protected function formatData($value) {		//dump($value);
		return array('text'=>"<b>No ID ". $value['id'] ."</b>", 'id'=>$value['id'], 'hasChildren'=>isset($value['parent']));	
    }

	#GET CHILD
	protected function getChild($x)
    {																			//dump($x); //echo count($x);
		$parents[]= array('text'=>"username :". $x['username'],'id'=>$x['id'],'hasChildren'=>isset($x['parent']));
		$parents[]= array('text'=>"firstname :". $x['first_name'],'id'=>$x['id'],'hasChildren'=>isset($x['parent']));
		$parents[]= array('text'=>"email :". $x['email'],'id'=>$x['id'],'hasChildren'=>isset($x['parent']));
       return $parents;
    }
	
	protected function getDataFormatted_DB($res)
    {																			//dump($res);
        foreach($res as $key=>$value)
        {																		//echo $key;
            $Formatted[$key]=$this->formatData($value);		//dump($Formatted);
            
			$parents=null;
            if(isset($value['parent']))
            {													//echo "bol<hr>"; dump( $value['parent']);
                #1 $parents=$this->getDataFormatted_DB( $value['parent']);		dump($parents);
				 $parents=$this->getChild( $value['parent'][0] );		//dump($parents);
				 
				$Formatted[$key]['children'] = $parents; 					#dump($Formatted[$key]['children']);
            }
        }														
        return $Formatted;
    }
	
    /*
     * @return all the data
     */
	 protected function getData_db() {
        $model=TblUserMysql::model();
	}
	
}
