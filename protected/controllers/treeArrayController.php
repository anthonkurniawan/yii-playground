<?php
class TreeArrayController extends AdminController
{
	public $layout='//layouts/column2';
	
	public function actionTreeArray()
	{																									//dump( $this->getData() );
        $data=$this->getDataFormatted($this->getData());					//dump($data);
        $this->render('/widget/CTreeView/CTreeView',array('data'=>$data ));
	}
	
	public function actionTreeFill() {
        if ( ! isset($_GET['root']))
            $personId = 'source';
        else
            $personId = $_GET['root'];

        $persons = ($personId == 'source') ?
			$this->getData() : $this->recursiveSearch($personId, $this->getData());

		$dataTree = array();
        if (is_array($persons)) {
            foreach($persons as $parent)
                $dataTree[] = $this->formatData($parent);
        }																											//dump($dataTree);
        echo json_encode($dataTree);
//        echo CTreeView::saveDataAsJson($dataTree);
    }
    
    /*
     * Used by Async Tree
     * @param id the Id of the child
     * @param root the node to test
     * @return the Familly Member
     */
    protected function recursiveSearch($id,$array)
    {																		//dump($array);	//echo $id;			
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

    /*
     * @return data for the tree
     */
    protected function formatData($person)
    {																							
      //return array('text'=>$person['name'],'id'=>$person['id'],'hasChildren'=>isset($person['parents']));	#default kalo class="filetree"
	  if( isset($person['parents']) !=null ) 
		return array('text'=>"<span class='folder'>". $person['name']. "</span>", 'id'=>$person['id'], 'expanded'=>0, 'hasChildren'=>isset($person['parents']));
	  else
		return array('text'=>"<span class='file'>". $person['name'] . "</span>", 'id'=>$person['id'], 'expanded'=>0, 'hasChildren'=>isset($person['parents']));
			//dump ( array('text'=>$person['name'],'id'=>$person['id'],'hasChildren'=>isset($person['parents'])) );
    }

    /*
     * @return data formated for the standard tree
     */
    protected function getDataFormatted($data)
    {												//dump($data);

        foreach($data as $k=>$person)
        {																			echo "key->".$k."name->".$person['name']. "<br>";
            $personFormatted[$k]=$this->formatData($person);
            $parents=null;
            if(isset($person['parents']))
            {
                $parents=$this->getDataFormatted($person['parents']);
                $personFormatted[$k]['children']=$parents;
            }
        }															//dump($personFormatted);
        return $personFormatted;
    }
   
    /*
     * @return all the data
     */
    protected function getData()
    {
        $data=array(
                  array("id"=>1,"name"=>"John","parents"=>
                        array(
                                array("id"=>10,"name"=>"Mary","parents"=>
                                    array(
                                        array("id"=>100,"name"=>"Jane","parents"=>
                                            array(
                                                array("id"=>1000,"name"=>"Helene",),
                                                array("id"=>1001,"name"=>"Peter",),
                                            )
                                        ),
                                        array("id"=>101,"name"=>"Richard","parents"=>
                                            array(
                                                array("id"=>1010,"name"=>"Lisa",),
                                                array("id"=>1011,"name"=>"William",),
                                            )
                                        ),
                                    ),
                                ),
                                array("id"=>11,"name"=>"Derek","parents"=>
                                    array(
                                        array("id"=>110,"name"=>"Julia"),
                                        array("id"=>111,"name"=>"Christian","parents"=>
                                            array(
                                                array("id"=>1110,"name"=>"Deborah",),
                                                array("id"=>1111,"name"=>"Marc",),
                                            ),
                                        ),
                                    ),
                                ),
                        ),
                    ),
					
					array("id"=>1,"name"=>"jablay","parents"=>
                        array(
                                array("id"=>10,"name"=>"Mary","parents"=>
                                    array(
                                        array("id"=>100,"name"=>"Jane","parents"=>
                                            array(
                                                array("id"=>1000,"name"=>"Helene",),
                                                array("id"=>1001,"name"=>"Peter",),
                                            )
                                        ),
                                        array("id"=>101,"name"=>"Richard","parents"=>
                                            array(
                                                array("id"=>1010,"name"=>"Lisa",),
                                                array("id"=>1011,"name"=>"William",),
                                            )
                                        ),
                                    ),
                                ),
							),
						),
                 );

        return $data;
    }
}

/*
array
(
    173 => 'eng_spv1'
    2 => 'kodoqkuww'
    3 => 'samsul2'
)


			array(
                  array("id"=>1,"name"=>"John","parents"=>
                        array(
                                array("id"=>10,"name"=>"Mary","parents"=>
                                    array(
                                        array("id"=>100,"name"=>"Jane","parents"=>
                                            array(
                                                array("id"=>1000,"name"=>"Helene",),
                                                array("id"=>1001,"name"=>"Peter",),
                                            )
                                        ),
                                        array("id"=>101,"name"=>"Richard","parents"=>
                                            array(
                                                array("id"=>1010,"name"=>"Lisa",),
                                                array("id"=>1011,"name"=>"William",),
                                            )
                                        ),
                                    ),
                                ),
*/