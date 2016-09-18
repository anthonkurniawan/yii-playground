   <?php 
 return array(
   'guest'=> array(
       'type'=> CAuthItem::TYPE_ROLE,
       'description'=>'Guest Access',
       'bizRule'=> null,
       'data'=> null
    ),
   'user-a'=> array(
       'type'=> CAuthItem::TYPE_ROLE,
       'description'=>'User Access',
       'children'=> array(
           'guest', // inherit from the guest 
        ),
		 'bizRule'=> null,
		//'bizRule'=> 'return Yii::app()->user->id==$params["id"];',  # hanya pada leel ini saja yg tidak bisa di akses - KECUALI  user id == param set
		'data'=> null
    ),
	 'user-b'=> array(
       'type'=> CAuthItem::TYPE_ROLE,
       'description'=>'User Access',
       'children'=> array(
           'guest', // inherit from the guest 
        ),
		 'bizRule'=> null,
		//'bizRule'=> 'return Yii::app()->user->id==$params["id"];',  # hanya pada leel ini saja yg tidak bisa di akses - KECUALI  user id == param set
		'data'=> null
    ),
   'poweruser'=> array(
       'type'=> CAuthItem::TYPE_ROLE,
       'description'=>'Moderator Access',
       'children'=> array(
           'user-a', 'user-b',          // inherit from user 
        ),
       'bizRule'=> null,
       'data'=> null
    ),
   'administrator'=> array(
       'type'=> CAuthItem::TYPE_ROLE,
       'description'=>'Administrator Access',
       'children'=> array(
           'poweruser',         // let all the admin is allowed to moderation
        ),
		'bizRule'=> null,	# the business rule to be executed when checkAccess is called for this particular authorization item.
		//'bizRule'=>  'return Yii::app()->user->id==1;',  # hanya bisa dengan user id 1 saja
		//'bizRule'=> 'return Yii::app()->user->id==$params["id"];',  # saat chechAccess harus bersama $params cth: checkAccess('administrator', array('id'=>'1')))

		# NOTE : 
		# -jika llogin dgn role "admin" dan pada auth config "bizRule" di set pada level terbawah cth: "administrator" maka user hanya bisa akses pada auth "guest" aja
		# - jika auth config "bizRule" di pindah ke level cth: "user" maka user dapat akses "guest, poweruser, administrator" kecuali "user"
       'data'=> null
    ),
);
?>