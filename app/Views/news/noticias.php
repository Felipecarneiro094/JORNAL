<h1>Noticia</h1>

<script>
    function confirma() {
        if (confirm('Deseja realmente excluir essa mensagem?')) {
            return true;
        }
            return false;
    }
</script>


<div class="text-right my-1">
    <div>
        <input type="hidden" value="<?php echo $news['id'] ?>"/>
    </div>
    <div>
        <a href="<?php echo base_url("news/edit/" . $news['id']); ?>" class="btn btn-warning">Editar</a>
        <a href="<?php echo base_url("news/delete/" . $news['id']); ?>"onclick="return confirma()" class="btn btn-danger">Excluir</a>      
    </div>       
    <br>
    <br>
    <div>
        <a href="<?php echo base_url('/news'); ?>" class="btn btn-primary">Retornar a Página Inicial</a>  
    </div>
</div>

<div class="pt-5">
    <h1><?php echo $news['title']; ?></h1>
    <p><h3><?php echo $news['body']; ?></h3></p>    
</div>



