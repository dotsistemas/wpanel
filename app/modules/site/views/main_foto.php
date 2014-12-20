<div class="row" style="margin-bottom: 30px;">
	<div class="col-md-12">
		<h3 class="page-header"><?= $album->titulo; ?></h3>
		<p><?= $album->descricao; ?></p>
		<p><?= mdate('%d/%m/%Y', strtotime($album->created)); ?></p>
		<!-- <hr/> -->
	</div>
</div>

<div class="row" style="margin-bottom: 10px;">
    <div class="col-md-12">
        <!-- AddThis Button BEGIN -->        
         <div class="addthis_toolbox addthis_default_style ">            
             <a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>            
             <a class="addthis_button_tweet"></a>            
             <a class="addthis_button_pinterest_pinit"></a>            
             <a class="addthis_counter addthis_pill_style"></a>            
         </div>            
         <!-- AddThis Button END -->
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<?php
		$conf_foto = array(
        	'src' => base_url() . '/media/albuns/' . $album->id . '/' . $foto->filename,
        	'class' => 'img-responsive',
        	'alt' => $foto->descricao
        );
        echo img($conf_foto);
        ?>
        <h4><?= $foto->descricao; ?></h4>
	</div>
</div>

<div class="row" style="margin-top: 20px;">
	<div class="col-md-12">
		<h3 class="page-header">Comentários</h3>
		<div class="fb-comments" 
            data-href="<?php echo site_url('foto/' . $foto->id); ?>" 
            data-num-posts="15" data-width="100%"></div>
	</div>
</div>