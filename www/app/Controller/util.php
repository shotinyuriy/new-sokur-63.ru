<?php 
class FileUtils {

	public static function saveFile( $id, $folder = 'menu-img' ) {
		$file_results = "";

		$image_url = null;
		if( $_FILES["image_url"]["error"] == 4 ) {
			// no file
		} elseif( $_FILES["image_url"]["error"] > 0 ) {
			$file_results .= 'No file Uploaded or invalid file';
			$file_results .= 'Error Code: '.$_FILES["image_url"]["error"];
			print_r($_FILES);
		} else {
			$file_results .= 'Upload: '.$_FILES["image_url"]["name"]."<br>"
				.'Type: '.$_FILES["image_url"]["type"].'<br>'
				.'File Size: '. round( $_FILES["image_url"]["size"] / 1024, 2 ) .' Килобайт <br>'
				.'Tmp Name: '.$_FILES["image_url"]["tmp_name"];

			$ext = ".jpg";

			$match = preg_match('/\..{1,5}$/', $_FILES["image_url"]["name"], $found);

			//debug($match);
			if( isset( $found ) ) {
				$ext = $found[0];
			}

			$filename = $_FILES["image_url"]["tmp_name"];
			$destination = $_SERVER[ 'DOCUMENT_ROOT' ]."/$folder/".$id.$ext;

			$file_results .= 'Расширение '.$ext.'<br> ';
			$file_results .= 'Файл перемещен в '.$destination.'<br> ';

			move_uploaded_file($filename, $destination);

			$image_url = $id.$ext;
		}

		//debug($file_results);

		return $image_url;
	}


	public static function isUploadedFile($params) {
	    $val = array_shift($params);
	    if ((isset($val['error']) && $val['error'] == 0) ||
	        (!empty( $val['tmp_name']) && $val['tmp_name'] != 'none')
	    ) {
	        return is_uploaded_file($val['tmp_name']);
	    }
	    return false;
	}
}