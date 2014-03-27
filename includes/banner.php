<?php
	$sql 			= "SELECT `id`, `arquivo` FROM `imagens` WHERE `destaque` = 1 AND `ativo` = 1 ORDER BY RAND() LIMIT 3";
	$query 			= mysql_query($sql);
	$num_rows_img	= mysql_num_rows($query);
?>

<div class="banner" >
	<div class="wrapper-thumb">
		<ul>
			<?php
				if($num_rows_img > 0){
					while($dados = mysql_fetch_array($query)){
			?>
						<li>
							<img src="administrator/uploads/images/<?php echo $dados["arquivo"]; ?>" alt="" width="168" height="94" rel="<?php echo $dados["id"] ?>">
						</li>
			<?php
					}
				} else {
			?>
						<li>
							<p style="padding: 1em;">Nenhuma imagem encontrada!</p>
						</li>
			<?php
				}
			?>
		</ul>
	</div>
	<div class="wrapper-banner">
		<ul>
			<li class="">
				<img src="" alt="" />
			</li>
		</ul>
	</div>
</div>

<script type="text/javascript">
	$(window).ready(function(){
		function altBanner(newImgAtiva){
			$('.wrapper-banner ul li img').attr('src', newImgAtiva.attr('src'));
		}
		imgAtiva = $('.wrapper-thumb ul li:nth-child(1) img');
		altBanner(imgAtiva);

		$('.wrapper-thumb ul li img').on('click', function(e){
			e.preventDefault();
			e.stopPropagation();
			var $this = $(this);
			$('.wrapper-banner ul li img').fadeOut("normal", function(){
				$('.wrapper-banner ul li img').remove();
				$('.wrapper-banner ul li').append('<img src="" alt="" style="display: none;" />');
				altBanner($this);
				$('.wrapper-banner ul li img').fadeIn("fast");
			});
		});
	});
</script>