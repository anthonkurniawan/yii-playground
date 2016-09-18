<?php
class TreeMenuAction extends CAction 
{
	//public $layout='//layouts/column2';
	
	public function run()
	{																									//dump( $this->getData() );
        $data=$this->getDataFormatted($this->getData());					//dump($data);
        $this->getController()->render('/widget/CTreeView/CTreeView_menu',array('data'=>$data ));
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
																		echo "key->".$key. "name->".$link['label']. "<br>";															
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

