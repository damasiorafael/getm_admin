<?php
	include("includes/config.php");
	$sql 	= "SELECT * FROM imagens ORDER BY RAND() LIMIT 3 WHERE destaque = 1";
	$query 	= mysql_query($sql);
	$dados = mysql_fetch_array($query);
?>
	<div class="banner" >
		<div class="wrapper-thumb">
			<span id="#controlTop"></span>
			<ul>
				<?php
					while($dados){
				?>
						<li>
							<a href="#foto<?php echo $dados["id"]; ?>">
								<img src="administrator/uploads/images/<?php echo $dados["arquivo"]; ?>" alt="" width="168" height="94">
							</a>
						</li>
				<?php
					}
				?>
			</ul>
			<span id="#controlBottom"></span>
		</div>
		<div class="wrapper-banner">
			<ul>
				<li id="foto1" class="">
					<img src="images/slide1.png"  width="700" alt="" >
				</li>
				<li id="foto2">
					<img src="images/slide2.png" width="700" alt="" class="">
				</li>
				<li id="foto3">
					<img src="images/slide3.png"  width="700" alt="" class="">
				</li>
			</ul>
		</div>
	</div>