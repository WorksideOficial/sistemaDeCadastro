<?php
    $filter = filter_input(INPUT_GET, 'edit', FILTER_VALIDATE_INT);
    $sql = "SELECT * FROM `users` WHERE id = {$filter}";
    $listar = BD::conn()->prepare($sql);
    $listar->execute();

    foreach($listar as $itens);
    extract($itens);
?>
<style>
.page-wrap {
    min-height: 80vh;
}
</style>
<article class="page-wrap form-group d-flex justify-content-center">
      <div class="container">
          <header class="col-md-6 offset-md-3">
              <h2 class="text-center">Atualize seu perfil <?=$fullname;?></h2>
          </header>
          <div class="form-group d-flex justify-content-center">
              <img src="uploads/<?=$foto;?>" width="100px" alt="foto"
          class="img-thumbnail img-responsive"  >
          </div>
          <div class="form-group">
                <div class="col-md-6 offset-md-3">
                    <div class="retorno"></div>
                </div>
           </div>
          <form action="" name="user" method="post">
          <input type="hidden" name="id" value="<?= $id;?>"/>
              <div class="form-group">
                  <div class="col-md-6 offset-md-3">
                      <label>Foto</label>
                      <input class="form-control-file" type="file" name="foto" id="foto" placeholder="Escolha uma foto:" require="require"/>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-6 offset-md-3">
                      <label>Nome</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">Nome</span>
                      </div>
                          <input class="form-control" type="text" name="fullname" value="<?=$fullname;?>" require="require"/>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-6 offset-md-3">
                      <label>Email</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">Email</span>
                      </div>
                          <input class="form-control" type="email" name="email" value="<?=$email;?>" require="require"/>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-6 offset-md-3">
                      <label>Telefone: (Whats)</label>
                      <div class="input-group">
                          <div class="input-group-prepend">
                          <span class="input-group-text">Telefone: (Whats)</span>
                      </div>
                          <input class="form-control" type="tel" name="telephone" value="<?=$telephone;?>" require="require"/>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                  <div class="col-md-6 offset-md-3">
                      <input type="submit" value="CADASTRAR AGORA!" class="btn btn-primary" name="">
                          <div class="resposta"></div>
                  </div>
              </div>                    
          </form>
      </div>
</article>