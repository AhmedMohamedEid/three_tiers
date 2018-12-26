<?php



/* Title Function v1.0
 * Title Function That is Echo the Page Title In case The Page Has
 * The Variable $pageTitle And Echo Defult Title From Other Pages
*/

	function getTitle(){
		
		global $pageTitle;

		if (isset($pageTitle)){
			echo $pageTitle;
		} else{
				echo "Defult";
			}

	}




/*
 * Uploade Image File 

*/

	// function uploade_img($img , $user  , $type){

	// 	// Upload Variables
	// 	#	$imgProfile  = $_FILES['product_image'];
	
	// 	$imgName 	= $_FILES[$img]['name'];
	// 	$imgSize 	= $_FILES[$img]['size'];
	// 	$imgTmp 	= $_FILES[$img]['tmp_name'];
	// 	$imgtype 	= $_FILES[$img]['type'];


	// 	// List Of Allowed  File Typed to Upload
	// 	$imageAllowedExtension = array("jpeg" , "jpg" , "png" , "gif");

	// 	// Get Image Extension
	// 	$imageExtension =explode(".", $imgName);
	// 	$extension = strtolower(end($imageExtension));


	// 	//$image = rand(0 ,1000000) . '_' . $imgName ;

	// 	// Check on Dir Name Is Found or Not Found and Creat it
	// 	$dirMember 			= "..\images\Members\\"."_" .$user ;
	// 	$dirMemberProfile 	= $dirMember. "\profile_img";
	// 	$dirMemberProduct 	= $dirMember. "\product_img";
	// 	if (! is_dir($dirMember)) {
	// 		mkdir($dirMember);
	// 		mkdir($dirMemberProfile);
	// 		mkdir($dirMemberProduct);

	// 		if($type == "profile"){
	// 			move_uploaded_file($imgTmp , $dirMemberProfile."\\".$imgName  );
	// 		}else{
	// 			move_uploaded_file($imgTmp , $dirMemberProduct."\\".$imgName  );
	// 		}
	// 	}
		
	// 	return $imgName;
	// }



/*check Items Function v1.0
 * Function To check Items In Database [ Function Accept Parameters ]
 *  $select =The Items To Select [Example: User , item]
 *  $from  = The Table To Select From [ Example: users , items ]
 *  $values = The Value of Select [ Example: Ahmed , box ]
 */
function checkIntoDatabase( $select , $from , $value ){

	global $conn;
	$statement = $conn->prepare(" SELECT $select FROM $from WHERE $select = ?");
	
	$statement->execute(array($value));
	
	$count = $statement->rowCount();

	return $count;
}



/* Redirect Function v2.0
	 * Redirect Function [ This Function Accept Paremeters ]
	 * $theMsg = [ Echo The  Message  ] [ Error | Success | Warning ]
	 * $url  = [ The Link yuo Went to Redirect ]
	 * $seconds  = [ Second Before Redirecting ]
	 */
	function redirectPage($url = null , $seconds = 0 )
	{
		if($url == null){
			$url =  'index.php' ;
			$link = 'Home Page';
		}else{
			if (isset($_SERVER ['HTTP_REFERER'] ) && $_SERVER ['HTTP_REFERER'] !== ''){
				
				$url = $_SERVER ['HTTP_REFERER'];
				$link = 'Previous Page';
			} else{
				$url = 'index.php';
				$link = 'Home Page'; 
			}
		}
		header("refresh:$seconds; url=$url");
		exit();
	}