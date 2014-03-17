<?php
	include("includes/config.php");
	$sql 	= "SELECT `id`, `arquivo` FROM `imagens` WHERE `destaque` = 1 AND `ativo` = 1 ORDER BY RAND() LIMIT 3";
	$query 	= mysql_query($sql);
	$dados 	= mysql_fetch_array($query);
	echo "<pre>";
	print_r($dados);
	echo "</pre>";
?>

<div class="banner" >
	<div class="wrapper-thumb">
		<ul>
			<?php
				while($dados = mysql_fetch_array($query)){
			?>
					<li>
						<img src="administrator/uploads/images/<?php echo $dados["arquivo"]; ?>" alt="" width="168" height="94">
					</li>
			<?php
				}/*
			<li>
				<img src="images/banner2.jpg" alt="">
			</li>
			<li>
				<img src="images/banner3.jpg" alt="">
			</li>
			<li> 
				<img src="images/banner4.jpg" alt="">
			</li>
			*/ ?>
		</ul>
	</div>
	<div class="wrapper-banner">
		<ul>
			<li id="foto1" class="">
				<img src="images/banner1.jpg" alt="" />
			</li>
		</ul>
	</div>
</div>






<!-- <div class="banner" >
	<div class="wrapper-thumb">
		<span id="#controlTop"></span>
		<ul>
			<li>
				<a href="#foto1">
					<img src="images/banner2.jpg" alt="">
				</a>
			</li>
			<li>
				<a href="#foto2">
					<img src="images/banner3.jpg" alt="">
				</a>
			</li>
			<li> 
				<a href="#foto3">
					<img src="images/banner4.jpg" alt="">
				</a>
			</li>
		</ul>
		<span id="#controlBottom"></span>
	</div>
	<div class="wrapper-banner">
		<ul>
			<li id="foto1" class="">
				<img src="images/banner1.jpg" alt="" >
			</li>
			li id="foto2">
				<img src="images/slide2.png" width="700" alt="" class="">
			</li>
			<li id="foto3">
				<img src="images/slide3.png"  width="700" alt="" class="">
			</li> 
		</ul>
	</div>
</div> -->