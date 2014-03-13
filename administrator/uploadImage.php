<?php
    include("inc/config.php");
    if(isset($_POST)){
        ############ Edit settings ##############
        $ThumbSquareSize        = 50; //Thumbnail will be 200x200
        $BigImageMaxSize        = 702; //Image Maximum height or width
        $ThumbPrefix            = "thumb_"; //Normal thumb Prefix
        $DestinationDirectory   = 'uploads/images/'; //specify upload directory ends with / (slash)
        $Quality                = 90; //jpeg quality
        ##########################################
		$id	           	= anti_injection($_POST['id']);
        $nome           = anti_injection($_POST['nome']);
        $destaque       = (anti_injection($_POST['destaque']) == "") ? 0 : 1;
        $ativo          = (anti_injection($_POST['ativo']) == "") ? 0 : 1;
        $editarArquivo  = (anti_injection($_POST['editarArquivo']) == "") ? 0 : 1;
        $acao           = anti_injection($_POST['acao']);

        $arrayRequest   = array();
        $arrayCampos    = array();

        //check if this is an ajax request
        if (!isset($_SERVER['HTTP_X_REQUESTED_WITH'])){
            die();
        }
        
        // check $_FILES['ImageFile'] not empty
        if(!isset($_FILES['arquivo']) /*|| !is_uploaded_file($_FILES['arquivo']['tmp_name'])*/){
            if($acao != "editaImagem"){
                die('Something wrong with uploaded file, something missing!'); // output error when above checks fail.
            }
        }
        
        // Random number will be added after image name
        $RandomNumber   = rand(0, 9999999999); 

        $ImageName      = str_replace(' ','-',strtolower($_FILES['arquivo']['name'])); //get image name
        $ImageSize      = $_FILES['arquivo']['size']; // get original image size
        $TempSrc        = $_FILES['arquivo']['tmp_name']; // Temp name of image file stored in PHP tmp folder
        $ImageType      = $_FILES['arquivo']['type']; //get file type, returns "image/png", image/jpeg, text/plain etc.

        //echo $ImageType;
        //Let's check allowed $ImageType, we use PHP SWITCH statement here
        switch(strtolower($ImageType)){
            case 'image/png':
                //Create a new image from file 
                $CreatedImage =  imagecreatefrompng($_FILES['arquivo']['tmp_name']);
                break;
            case 'image/gif':
                $CreatedImage =  imagecreatefromgif($_FILES['arquivo']['tmp_name']);
                break;          
            case 'image/jpeg':
            case 'image/pjpeg':
                $CreatedImage = imagecreatefromjpeg($_FILES['arquivo']['tmp_name']);
                break;
            default:
                die('Unsupported File!'); //output error and exit
        }
        
        //PHP getimagesize() function returns height/width from image file stored in PHP tmp folder.
        //Get first two values from image, width and height. 
        //list assign svalues to $CurWidth,$CurHeight
        list($CurWidth,$CurHeight)=getimagesize($TempSrc);
        
        if($destaque == 1 && $CurWidth != "702" && $CurHeight != "319"){
            die("Dimensões da imagem não permitida! Insira uma imagem com 702 x 319 pixels!");
        }

        //Get file extension from Image name, this will be added after random name
        $ImageExt = substr($ImageName, strrpos($ImageName, '.'));
        $ImageExt = str_replace('.','',$ImageExt);
        
        //remove extension from filename
        $ImageName      = preg_replace("/\\.[^.\\s]{3,4}$/", "", $ImageName); 
        
        //Construct a new name with random number and extension.
        $NewImageName = $ImageName.'-'.$RandomNumber.'.'.$ImageExt;
        
        //set the Destination Image
        $thumb_DestRandImageName    = $DestinationDirectory.$ThumbPrefix.$NewImageName; //Thumbnail name with destination directory
        $DestRandImageName          = $DestinationDirectory.$NewImageName; // Image with destination directory
        
        //Resize image to Specified Size by calling resizeImage function.
        if(resizeImage($CurWidth,$CurHeight,$BigImageMaxSize,$DestRandImageName,$CreatedImage,$Quality,$ImageType)){
            //Create a square Thumbnail right after, this time we are using cropImage() function
            if(!cropImage($CurWidth,$CurHeight,$ThumbSquareSize,$thumb_DestRandImageName,$CreatedImage,$Quality,$ImageType)){
                echo 'Error Creating thumbnail';
            }
			$arquivo = $NewImageName;
			
			array_push($arrayCampos, 'nome');
			
			if($acao == "addImagem" || $acao == "editaImagem" && $editarArquivo == 1){
				array_push($arrayCampos, 'arquivo');
			}
			
			array_push($arrayCampos, 'destaque');
			array_push($arrayCampos, 'ativo');
			
			array_push($arrayRequest, $nome);
			
			if($acao == "addImagem" || $acao == "editaImagem" && $editarArquivo == 1){
				array_push($arrayRequest, $arquivo);
			}
			
			array_push($arrayRequest, $destaque);
			array_push($arrayRequest, $ativo);

            $campos = join($arrayCampos, '|');
            $dados  = join($arrayRequest, '|');
			
			if($acao == "addImagem"){
				if(gravanobd('imagens',$campos,$dados)){
					echo "success";
				} else {
					echo "error";
				}
			} else if($acao == "editaImagem"){
				if(editanobd('imagens',$campos,$dados,$id)){
					echo "success";
				} else {
					echo "error";
				}
			}
            $arrayRequest   = array();
            $arrayCampos    = array();
        } else {
            die('Resize Error'); //output error
        }
    }


    // This function will proportionally resize image 
    function resizeImage($CurWidth,$CurHeight,$MaxSize,$DestFolder,$SrcImage,$Quality,$ImageType){
        //Check Image size is not 0
        if($CurWidth <= 0 || $CurHeight <= 0){
            return false;
        }
        //Construct a proportional size of new image
        $ImageScale         = min($MaxSize/$CurWidth, $MaxSize/$CurHeight); 
        $NewWidth           = ceil($ImageScale*$CurWidth);
        $NewHeight          = ceil($ImageScale*$CurHeight);
        $NewCanves          = imagecreatetruecolor($NewWidth, $NewHeight);
        
        // Resize Image
        if(imagecopyresampled($NewCanves, $SrcImage,0, 0, 0, 0, $NewWidth, $NewHeight, $CurWidth, $CurHeight)){
            switch(strtolower($ImageType)){
                case 'image/png':
                    imagepng($NewCanves,$DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves,$DestFolder);
                    break;          
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($NewCanves,$DestFolder,$Quality);
                    break;
                default:
                    return false;
            }
            //Destroy image, frees memory   
            if(is_resource($NewCanves)){
                imagedestroy($NewCanves);
            } 
            return true;
        } else {
			die("erro nessa porra");
		}
    }

    //This function corps image to create exact square images, no matter what its original size!
    function cropImage($CurWidth,$CurHeight,$iSize,$DestFolder,$SrcImage,$Quality,$ImageType){
        //Check Image size is not 0
        if($CurWidth <= 0 || $CurHeight <= 0){
            return false;
        }
        
        //abeautifulsite.net has excellent article about "Cropping an Image to Make Square bit.ly/1gTwXW9
        if($CurWidth>$CurHeight){
            $y_offset = 0;
            $x_offset = ($CurWidth - $CurHeight) / 2;
            $square_size    = $CurWidth - ($x_offset * 2);
        } else {
            $x_offset = 0;
            $y_offset = ($CurHeight - $CurWidth) / 2;
            $square_size = $CurHeight - ($y_offset * 2);
        }
        
        $NewCanves  = imagecreatetruecolor($iSize, $iSize); 
        if(imagecopyresampled($NewCanves, $SrcImage,0, 0, $x_offset, $y_offset, $iSize, $iSize, $square_size, $square_size)){
            switch(strtolower($ImageType)){
                case 'image/png':
                    imagepng($NewCanves,$DestFolder);
                    break;
                case 'image/gif':
                    imagegif($NewCanves,$DestFolder);
                    break;          
                case 'image/jpeg':
                case 'image/pjpeg':
                    imagejpeg($NewCanves,$DestFolder,$Quality);
                    break;
                default:
                    return false;
            }
            //Destroy image, frees memory   
            if(is_resource($NewCanves)){
                imagedestroy($NewCanves);
            }
            return true;
        }
    }
?>