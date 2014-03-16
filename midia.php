<?php
	$pag = "midia";
?>
<?php
session_start();
$id = $_POST['id'];
$senha = $_POST['senha'];

$_SESSION['id'] = $id;
$_SESSION['senha'] = $senha;
if(isset($id)){
   //echo "Você está logado como: $id";
   //header('location:http://localhost/GETM/index.php');
}
else
 // echo 'Você não está logado' // Não logado

?>

<?php
function youtubeImage($url, $size = 'small'){
    $url = explode('v=',$url);
    $url = explode('&',$url[1]);
    $url = $size == 'small' ? ('http://i1.ytimg.com/vi/' . $url[0] . '/mqdefault.jpg') : ('http://img.youtube.com/vi/' . $url[0] . '/0.jpg');
    return $url; }
?>
<!DOCTYPE html>
<html lang="en">
<?php include("includes/head.php"); ?>
</html>
<body>
    <div class="lightbox"> 
        <div class="wrapper-lightbox"> 
            <div class="container-lightbox">
                <object width="1000" height="563"><param name="movie" value="//www.youtube.com/v/vgyJd75ibPA"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="//www.youtube.com/v/vgyJd75ibPA?autoplay=1" type="application/x-shockwave-flash" width="1000" height="563" allowscriptaccess="always" allowfullscreen="true"></embed></object>
            </div>
            <span class="btn-fechar"></span>
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
                            <li>
                                <a href="" class="thumb-video" >
                                    <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                </a>
                                <a href="" class="titulo-video">Titulo Video</a>
                                <span class="descricao-video">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </span>
                            </li>
                            <li>
                                <a href="" class="thumb-video" >
                                    <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                </a>
                                <a href="" class="titulo-video">Titulo Video</a>
                                <span class="descricao-video">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </span>
                            </li>
                            <li>
                                <a href="" class="thumb-video" >
                                    <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                </a>
                                <a href="" class="titulo-video">Titulo Video</a>
                                <span class="descricao-video">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </span>
                            </li>
                            <li>
                                <a href="" class="thumb-video" >
                                    <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                </a>
                                <a href="" class="titulo-video">Titulo Video</a>
                                <span class="descricao-video">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </span>
                            </li>
                            <li>
                                <a href="" class="thumb-video" >
                                    <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                </a>
                                <a href="" class="titulo-video">Titulo Video</a>
                                <span class="descricao-video">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </span>
                            </li>
                            <li>
                                <a href="" class="thumb-video" >
                                    <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                </a>
                                <a href="" class="titulo-video">Titulo Video</a>
                                <span class="descricao-video">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </span>
                            </li>
                            <li>
                                <a href="" class="thumb-video" >
                                    <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                </a>
                                <a href="" class="titulo-video">Titulo Video</a>
                                <span class="descricao-video">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. </span>
                            </li>
                        </ul>
                    </div>
                    <div class="play-video">
                        <div class="iframe-video">
                            
                        </div>
                        <div class="carrosel-videos">
                            <ul>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>

                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>

                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                                <li>
                                    <a href="" class="thumb-video" >
                                        <img alt="" src="<?php echo youtubeImage('https://www.youtube.com/watch?v=ZBcUxu2d9QM');?>" />
                                    </a>
                                    <a href="" class="titulo-video">Titulo Video Titulo Video Titulo Video</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php include("includes/rodape.php"); ?>
</body>