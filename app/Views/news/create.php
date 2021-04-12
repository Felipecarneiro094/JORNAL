<h2><?php echo isset($id) ? "Editando a notícia" : "Cadastrando nova notícia" ?></h2>
<?php echo \Config\Services::validation()->listErrors(); ?>
<div class="text-right my-5">
    <a href="<?php echo base_url('news'); ?>" class="btn btn-primary">Noticias</a>
</div>
<?php if (isset($sucess)) : ?>
    <div class="row">
        <div class="alert alert-success col-12 text-center">
            <?php echo $sucess ?>
        </div>
    </div>
<?php endif; ?>
<form action="<?php echo base_url('/news/save') ?>" method="POST">
    <div class="row">
        <input type="hidden" name="id" id="id" value="<?php echo isset($id) ? $id : set_value('id')?>" />
            <div>
                <label for="title">Titulo</label>
                <input type="text" class="for-control" name="title" id="title" value="<?php echo isset($title) ? $title : set_value('title')?>"/>        
            </div>
            <div class="form-group col-12">
                <label for="body">Notícia</label>
                <textarea class="form-control" name="body" id="body" cols="10" rows="10">
                    <?php echo isset($body) ? $body : set_value('body')?>
                </textarea>
            </div>
            <div class="form-group col-12">
                <input type="submit" class="btn btn-primary" value="Salvar Noticia"/>
            </div>
    </div>    
</form>