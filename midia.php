<?php
	include("includes/config.php");
	$pag = "midia";
	function youtubeImage($url, $size = 'small'){
		$url = explode('v=',$url);
		$url = explode('&',$url[1]);
		$url = $size == 'small' ? ('http://i1.ytimg.com/vi/' . $url[0] . '/mqdefault.jpg') : ('http://img.youtube.com/vi/' . $url[0] . '/0.jpg');
		//i1.ytimg.com/vi/rXOBNsBmAps/mqdefault.jpg
		return $url;
	}
?>
<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php"); ?>
</html>
<body>
    <div class="lightbox"> 
        <div class="wrapper-lightbox"> 
            <div class="container-lightbox">
                <?php /*?>'<object width="1000" height="563">
'                	<param name="movie" value="//www.youtube.com/v/vgyJd75ibPA"></param>
'                    <param name="allowFullScreen" value="true"></param>
'                    <param name="allowscriptaccess" value="always"></param>
'                    <embed src="//www.youtube.com/v/vgyJd75ibPA?autoplay=1" type="application/x-shockwave-flash" width="1000" height="563" allowscriptaccess="always" allowfullscreen="true"></embed>
'               	</object><?php */?>
					<?php /*?><iframe width="640" height="480" src="//www.youtube.com/embed/ZpDQJnI4OhU" frameborder="0" allowfullscreen></iframe><?php */?>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="container-conteudo">
            <header>
                <?php include("includes/header-logo.php"); ?>

                <?php include("includes/header-login.php"); ?>
                
                <?php include("includes/header-menu.php"); ?>
            </header>
            <div class="content">
                <section class="conteudo midia">
                    <div class="lateral">
                        <ul>
                        	<?php
								$sqlVideosLinha 	= "SELECT `titulo`, `resumo`, `link` FROM `videos_linha` WHERE `ativo` = 1 ORDER BY id ASC";
								$queryVideosLinha   = mysql_query($sqlVideosLinha);
								$numRowsVideosLinha	= mysql_num_rows($queryVideosLinha);
								if($numRowsVideosLinha > 1){
									//for($i = 0; $i < 12; $i++){
									while($videosLinha = mysql_fetch_array($queryVideosLinha)){
							?>
                                        <li>
                                            <a href="<?php echo $videosLinha["link"]; ?>" class="thumb-video" rel="iframe">
                                                <img width="184" height="106" alt="" src="<?php echo youtubeImage($videosLinha["link"]);?>" /> 
                                            </a>
                                            <a href="" class="titulo-video"><?php echo substr_replace(substr($videosLinha["titulo"],0,26), ' (...)', -1, 1); ?></a>
                                            <span class="descricao-video"><?php echo substr_replace(substr($videosLinha["resumo"],0,110), ' (...)', -1, 1); ?></span>
                                        </li>
                            <?php
									}
								}
							?>
                        </ul>
                    </div>
                    <div class="play-video">
                        <div class="iframe-video">
                            
                        </div>
                        <div class="carrosel-videos">
                            <ul>
                            	<?php
									$sqlVideos 		= "SELECT `titulo`, `resumo`, `link` FROM `videos_linha` WHERE `ativo` = 1 ORDER BY id ASC";
									$queryVideos   	= mysql_query($sqlVideos);
									$numRowsVideos	= mysql_num_rows($queryVideos);
									if($numRowsVideos > 1){
										//for($i = 0; $i < 12; $i++){
										while($videos = mysql_fetch_array($queryVideos)){
								?>
                                            <li>
                                                <a href="<?php echo $videos["link"]; ?>" class="thumb-video" rel="div">
                                                    <img alt="" src="<?php echo youtubeImage($videos["link"]); ?>" />
                                                </a>
                                                <span class="titulo-video"><?php echo substr_replace(substr($videos["titulo"],0,22), ' (...)', -1, 1); ?></span>
                                            </li>
                                <?php
										}
									}
								?>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include("includes/rodape.php"); ?>
</body>