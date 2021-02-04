<?php

    include('../../function/koneksi.php');

    function resizeImage($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
        $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
        imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
        return $imageLayer;
    }

    if(!empty($_POST)){
        $output = '';
        $id_plan = $_POST["id_plan"];
        $id_task = $_POST["id_task"];  
        $task = $_POST["task"];  
        $date = $_POST["date"];  
        $plan = $_POST["plan"];
        $status = $_POST["status"];
        $kendala = $_POST["kendala"];
        $nmgambar = "";

        if (!empty($_FILES)) {
			if ($_FILES['upload_image']['name'] != "") {
				if(is_array($_FILES)) {
					$fileName = $_FILES['upload_image']['tmp_name'];
					$sourceProperties = getimagesize($fileName);
					$resizeFileName = time();
					$uploadPath = "../../bukti/";
					$fileExt = pathinfo($_FILES['upload_image']['name'], PATHINFO_EXTENSION);
					$uploadImageType = $sourceProperties[2];
					$sourceImageWidth = $sourceProperties[0];
					$sourceImageHeight = $sourceProperties[1];
					switch ($uploadImageType) {
						case IMAGETYPE_JPEG:
						$resourceType = imagecreatefromjpeg($fileName); 
						$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,450,450);
						imagejpeg($imageLayer,$uploadPath."pal_".$resizeFileName.'.'. $fileExt);
						break;

						case IMAGETYPE_GIF:
						$resourceType = imagecreatefromgif($fileName); 
						$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,450,450);
						imagegif($imageLayer,$uploadPath."pal_".$resizeFileName.'.'. $fileExt);
						break;

						case IMAGETYPE_PNG:
						$resourceType = imagecreatefrompng($fileName); 
						$imageLayer = resizeImage($resourceType,$sourceImageWidth,$sourceImageHeight,450,450);
						imagepng($imageLayer,$uploadPath."pal_".$resizeFileName.'.'. $fileExt);
						break;

						default:
						$imageProcess = 0;
						break;
					}
				}
				$nmgambar="pal_".$resizeFileName.'.'. $fileExt;
			}
		}
        $query = (" INSERT INTO tabel_realisasi (id_plan,id_task,date,plan,status,bukti,kendala)
							VALUES ('".$id_plan."', '".$id_task."','".$date."',
									'".$plan."', '1','".$nmgambar."','".$kendala."') ");

        $query2=" UPDATE tabel_plan SET status = '1' WHERE id_plan = '".$id_plan."' ";

        if(mysqli_query($conn, $query))
    	{ 
			mysqli_query($conn, $query2); ?>
			<script type="text/javascript"> alert("Realisasi Sukses !"); </script>
			<?php echo"<script>document.location='index.php?plan'</script>"; ?> 
<?php	}
	}
?>
