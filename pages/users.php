<style>
.page-wrap {
    min-height: 80vh;
}
</style>
<section class="page-wrap container">
<header class="col-md-6 offset-md-3">
    <h2>Usuários cadastrados no site!</h2>
</header>
        <div class="form-group">
            
        </div>
        <table class="table table-striped table-dark">
            <thead>
                <tr>
                <th scope="col">Foto</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone: (Whats)</th>
                <th class="text-center">Ações</th>
                </tr>
            </thead>
            <?php
                $sql = "SELECT * FROM `users`";
                $listar = BD::conn()->prepare($sql);
                $listar->execute();

                foreach($listar as $itens):
                  extract($itens)
            ?>
            <tbody>
                <tr>
                <th scope="row"><img class="img-thumbnail img-responsive" width="100" heigth="100" src="uploads/<?= $foto;?>"></th>
                <td><?= $fullname;?></td>
                <td><?= $email;?></td>
                <td><?= $telephone;?></td>
                <td><a href="<?= BASE;?>/user&edit=<?= $id;?>">Editar</a></td>
                <td><a href="#" id="<?= $id;?>" class="delete" data-ca='delete'>Excluir</a></td>
                </tr>
            </tbody>
            <?php
            endforeach;
            ?>
            </table>
    </section>