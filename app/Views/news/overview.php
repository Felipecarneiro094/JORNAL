<h1>Noticias</h1>
<div class="text-right my-5">
    <a href="<?php echo base_url('/news/create'); ?>" class="btn btn-primary">Cadastrar</a>
</div>
<script>
    function confirma() {
        if (confirm("Deseja realmente excluir a notícia?")) {
            return true;
        }
            return false;
    }
</script>
<table class="table">
    <thead>
        <tr>
            <th>Titulo</th>
            <th>Ação</th>
        </tr>
    </thead>
    <tbody>
        <?php if (!empty($news) && is_array($news)) : ?>
            <?php foreach ($news as $news_item) : ?>
                <tr>                   
                    <td><a href="<?php echo base_url('news/seeNews/'.$news_item['id']); ?>"><?php echo $news_item['title']; ?></a></td>
                    <td>
                        <a href="<?php echo base_url('news/edit/'.$news_item['id']);?>">Editar</a><br>
                        <a href="<?php echo base_url('news/delete/'.$news_item['id']);?>"onclick="return confirma()">Excluir</a><br>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>        
</table>

