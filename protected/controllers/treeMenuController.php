<?php
class TreeMenuController extends AdminController
{
	public $layout='//layouts/column2';
	
	#action Default
	public function actionTreeMenu()
	{																									//dump( $this->getData() );
        $data=$this->getDataFormatted($this->getData());					//dump($data);
        $this->render('/widget/CTreeView/CTreeView',array('data'=>$data ));
	}
    
	#action widget Tree menu
	public function actionTreeMenuWidget()
	{																									//dump( $this->getData() );
        $data=$this->getDataFormatted($this->getData());					//dump($data);
        //$this->render('/widget/CTreeView/CTreeView',array('data'=>$data ));
		 echo json_encode($data);
	}
	
	#action for ajax async request
	public function actionTreeFill() {
        if ( ! isset($_GET['root']))
            $personId = 'source';
        else
            $personId = $_GET['root'];				//echo $personId;

        $persons = ($personId == 'source') ?
			$this->getData() : $this->recursiveSearch($personId, $this->getData());	//print_r($persons);

		$dataTree = array();
        if (is_array($persons)) {
            foreach($persons['items'] as $parent)
                $dataTree[] = $this->formatData($parent);
				//print_r($parent);
        }																											//dump($dataTree);
        echo json_encode($dataTree);
//        echo CTreeView::saveDataAsJson($dataTree);
    }
    
    /* Used by Async Tree
     * @param id the Id of the child
     * @param root the node to test
     * @return the Familly Member */
    protected function recursiveSearch($id,$array)
    {																		echo $id; print_r($array);	//echo $id;			
       if(is_array($array))
        {
            foreach($array as $person)
            {
                if($person['id']==$id)
                    return $person["parents"];
                else
                {
                    $r=$this->recursiveSearch($id,$person["parents"]);
                    if($r!==null)
                         return $r;

               }
            }
        }
        return null;
    }
	
    /* @return data for the tree */
    protected function formatData($data)
    {	//dump($data);		
		if( isset($data['items']) !=null ) 
			return array('text'=>"<span class='folder'>". $data['label']. "</span>",'id'=>$data['label'],'hasChildren'=>isset($data['items']));
		else
			return array('text'=>"<span class='file'>". $data['label'],'id'=>$data['label'],'hasChildren'=>isset($data['items']));
    }
	
	 /* @return Link for the tree */
    protected function formatLink($data)
    {	//dump($data);		
		//CHtml::link($data['label'], $data['url'], isset($item['linkOptions']) ? $item['linkOptions'] : array() );
		isset($data['items']) ? 
			$link = "<span class='folder'>". CHtml::link($data['label'], $data['url'],  array('target'=>'_blank', 'class'=>'folder') ) ."</span>" :
			$link = "<span class='file'>". CHtml::link($data['label'], $data['url'],  array('target'=>'_blank', 'class'=>'file') ) ."</span>" ;
			
		if( isset($data['items']) !=null ) 
			return array('text'=>$link,'id'=>$data['label'], 'expanded'=>0, 'hasChildren'=>isset($data['items']));
		else
			return array('text'=>$link, 'id'=>$data['label'], 'expanded'=>0,  'hasChildren'=>isset($data['items']));
			
			//dump ( array('text'=>$data['label'],'id'=>$data['label'],'hasChildren'=>isset($data['items'])) );
    }
	
    protected function getDataFormatted($data)
    {												//dump($data);
		isset($data['items']) ? $source=$data['items'] : $source = $data;
		
        foreach($source as $key=>$link) 
        {																//dump($link);			
																		//echo "key->".$key. "name->".$link['label']. "<br>";															
            //$linkFormatted[$key]=$this->formatData($link);   //for view as label
            $linkFormatted[$key]=$this->formatLink($link);		//for view as link
			 
			// $items=null;
            if(isset($link['items']))
            {
                $items=$this->getDataFormatted($link['items']);
                $linkFormatted[$key]['children']=$items;
            }
        }														
        return $linkFormatted;
    }
   
   // protected function getDataFormatted2($data) {	
		// //dump($data);
		// foreach($data as $key=>$link) {			//dump($key);
			 // $linkFormatted[$key]=$this->formatData($link);
		// }
		 // if(isset($link['items']))
            // {
                // $items=$this->getDataFormatted2($link['items']);
                // $linkFormatted[$key]['children']=$items;
            // }
		 // return $linkFormatted;
	// }
	
    /* @return all the data */
    protected function getData()
    {
		$data =
			array(
				'items'=>array(
					array('label'=>'Home','url'=>array('site/index'),'items'=>array(								   
						array('label'=>'About', 'url'=>array('/site/page', 'view'=>'about')),		#using "CViewAction'"
						array('label'=>'Data User', 'url'=>array('/userMysql/index'),'items'=>array(
							array('label'=>'Create user', 'url'=>array('userMysql/create')),
							array('label'=>'Manage user', 'url'=>array('userMysql/admin')),
						)),
					)),
					array('label'=>'other', 'url'=>array('/site/page', 'view'=>'about')),
				),
			);
        return $data;
    }
}

