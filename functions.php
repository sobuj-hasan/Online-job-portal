<?php


function convert2_parmalink($str,$separated='-')
{

$str =str_replace('অফিস','office',$str);
$str =str_replace('কমার্সিয়াল','commercial ',$str);
$str =str_replace('ফ্লাট','Flat',$str);
$str =str_replace('ফ্ল্যাট','Flat',$str);
$str =str_replace('ঘর','Ghor',$str);
$str =str_replace('ব্যাংক','bank',$str);
$str =str_replace('এ্যাম্বুলেন্স','ambulance',$str);
$str =str_replace('রুম','Room',$str);

$str =str_replace('ত্রী','ttri',$str);
$str =str_replace('্য','a',$str);
$str =str_replace('ত্র','tro',$str);
$str =str_replace('ৈ','OI',$str);
$str =str_replace('যাঁ','a',$str);
$str =str_replace('মৃ','mrri',$str);
$str =str_replace('ত্ত','tto',$str);
$str =str_replace('য়','y',$str);
$str =str_replace('ৌ','OU',$str);
$str =str_replace('ক্ষ','kkho',$str);
$str =str_replace('ষ্ণ','ssno',$str);
$str =str_replace('জ্ঞ','gg',$str);
$str =str_replace('ঞ্জ','njy',$str);
$str =str_replace('ঞ্চ','nco',$str);
$str =str_replace('ঙ্গ','ngo',$str);
$str =str_replace('ঙ্ক','nko',$str);
$str =str_replace('ট্ট','tto',$str);
$str =str_replace('হ্ন','hon',$str);
$str =str_replace('হ্ণ','hon',$str);
$str =str_replace('স্তু','sto',$str);
$str =str_replace('ব্ধ','bdho',$str);
$str =str_replace('ক্র','kkro',$str);
$str =str_replace('গ্ধ','gdho',$str);
$str =str_replace('ত্র','ttr',$str);
$str =str_replace('ক্ত','kto',$str);
$str =str_replace('ক্স','kks',$str);
$str =str_replace('ত্থ','ttha',$str);
$str =str_replace('ত্ত','tto',$str);
$str =str_replace('ত্ম','tto',$str);
$str =str_replace('্যা','za',$str);
$str =str_replace('ড়া','ra',$str);

$len = mb_strlen($str, 'UTF-8');
$result = array();
for ($i = 0; $i < $len; $i++) {
    $result[] = mb_substr($str, $i, 1, 'UTF-8');
}
//$str = $result[0];
$bwrd = array('্য','অ','আ','ই','ঈ','উ','ঊ','ঋ','এ','১','২','৩','৪','৫','৬','৭','৮','৯','০',
'ঐ','ও','ঔ','ক','খ','গ','ঘ','ঙ','চ','ছ','জ','ঝ','ঞ','ট','
ঠ','ড','ঢ','ণ','ত','থ','দ','ধ','ন','প','ফ','ব','ভ','ম','য','
র','ল','শ','ষ','স','হ','ড়','ঢ়','য়','র','া','ো','ি','ু','ে','ং','্','ৎ','ী','ৈ','ৃ','ঁ','়','ূ','য়'
);

$eward = array('sa','o','a','i','E','u','U','rri','e','1','2','3','4','5','6','7','8','9','0',
'oi','o','OU','k','kh','g','gh','NG','c','ch','j','jh','ng','t','
th','D','Dh','n','t','th','d','dh','n','p','f','b','v','m','z','
r','l','Sh','SH','s','h','R','Rh','y','r','a','o','i','u','e','ng','y','t','OU','rri','a','a','u','y','y'
);
		
$rtn = '';
foreach ($result as $key ) {
$rtn .=  strtolower(str_replace( $bwrd,$eward, $key));
}
//return  $rtn;
if($separated != ''){
$rtn =  preg_replace("/[^a-zA-Z 0-9]+/","",$rtn);
$rtn =  str_replace(' ',$separated,$rtn);
$rtn =  str_replace('--','-',$rtn);
if(substr($rtn , -1) == '-'){$rtn = rtrim($rtn,"-");} //remove last (-)
return  $rtn;
}else {
return  $rtn;	
}
//echo '<br><br>';
//foreach ($result as $key ) {
//echo $key.' = ';	
//}
}

function excerpt( $str, $wordCount = 28 ,$by = 'word') {
  $excerpt = implode( 
    '', 
    array_slice( 
      preg_split(
        '/([\s,\.;\?\!]+)/', 
        $str, 
        $wordCount*2+1, 
        PREG_SPLIT_DELIM_CAPTURE
      ),
      0,
      $wordCount*2-1
    )
  );
  return ''.$excerpt.'';
}

function gen_notification($msg = 'undefiend!!',$type = 'info',$dismissable = 1){
if($dismissable == 1){$d = 'alert-dismissable';}else {$d = '';}
if($dismissable == 1){$d2 = '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>';}else {$d2 = '';}
return '<div class="alert alert-'.$type.' '.$d.'">
'.$d2.'
'.$msg.'
</div>';	
}
function reloader($link = '' ,$timer= 1000){ 
global $actual_link;
if($link == ''){$link = $actual_link;}
return '<script>setTimeout(function(){window.location = "'.$link.'"},'.$timer.');</script>';
}

	function image_thumb($im_name,$im_size,$im_type,$im_temp,$actual_image_name,$save_path,$imgresize = 'orginal',$imgquality,$watermark = "")
{
	$max_size = 1080; //max image size in Pixels
	$destination_folder = $save_path;
	$image_name = $im_name; //file name
	$image_size = $im_size; //file size
	$image_type = $im_type; //file type
	$image_temp = $im_temp; //file temp
	//list($txt, $ext) = explode(".", $image_name);
	//$actual_image_name	= $actual_image_name.'.'.$ext;					
	switch(strtolower($image_type)){ //determine uploaded image type 
			//Create new image from file
			case 'image/png': 
				$image_resource =  imagecreatefrompng($image_temp);
				break;
			case 'image/gif':
				$image_resource =  imagecreatefromgif($image_temp);
				break;          
			case 'image/jpeg': case 'image/pjpeg':
				$image_resource = imagecreatefromjpeg($image_temp);
				break;
			default:
				$image_resource = false;
		}
	
	if($image_resource){
		//Copy and resize part of an image with resampling
		list($img_width, $img_height) = getimagesize($image_temp);
		
		
		if($imgresize == 'orginal'){
		$new_image_width    = $img_width;
		$new_image_height   = $img_height;
		$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);	
		}
		else {
		$str = $imgresize;
		$hwds = (explode("x",$str));
		$new_image_height   = $hwds[0];
		$new_image_width    = $hwds[1];
		$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);
		}
		//$image_scale        = min($max_size / $img_width, $max_size / $img_height); 
		//$new_image_width    = ceil($image_scale * $img_width);
		//$new_image_height   = ceil($image_scale * $img_height);
		//$new_canvas         = imagecreatetruecolor($new_image_width , $new_image_height);
	    //Construct a proportional size of new image
		

		if(imagecopyresampled($new_canvas, $image_resource , 0, 0, 0, 0, $new_image_width, $new_image_height, $img_width, $img_height))
		{
			
			if(!is_dir($destination_folder)){ 
				mkdir($destination_folder);//create dir if it doesn't exist
			}
			
			//center watermark
			if($watermark != ''){   
			$pos = ($new_image_height*2/100);
			$watermark_left = ($new_image_width/2)-(300/2); //watermark left
			$watermark_bottom = ($new_image_height-130); //watermark bottom
			$watermark_png_file = 'watermark.png';
			$watermark = imagecreatefrompng($watermark_png_file); //watermark image
			imagecopy($new_canvas, $watermark, $watermark_left, $watermark_bottom, 0, 0, 300, 100); //merge image
			}
			//output image direcly on the browser.
			//header('Content-Type: image/jpeg');
			//imagejpeg($new_canvas, NULL , 90);
			
			//Or Save image to the folder
			imagejpeg($new_canvas, $destination_folder.'/'.$actual_image_name,$imgquality);
			
			//free up memory
			imagedestroy($new_canvas); 
			imagedestroy($image_resource);
			//die();
			
			
			//echo "<img src='".$destination_folder."".$actual_image_name."' alt='image'  value='".$actual_image_name."' class='preview'>";

			return true;
		}
	}
	}
?>