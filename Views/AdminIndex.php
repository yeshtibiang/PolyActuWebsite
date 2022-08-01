<?php
if (isset($_SESSION["email"])){
    require($_SERVER['DOCUMENT_ROOT'].'/polytech/inc/nav.php') ;
    $i = 1;
    ?>
        <div class="container">
            <h4 class="mt-4 mb-4">Page d'administration des articles</h4>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Category</th>
                    <th scope="col">Contenu</th>
                    <th scope="col">Date de création</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $article['title']; ?></td>
                        <td><?= $article['category']; ?></td>
                        <td><?= substr($article['content'], 0, 50) ; ?>...</td>
                        <td><?= $article['createdDate']; ?></td>
                        <td>
                            <a href="http://localhost/polytech/admin/<?= $article['id']; ?>" class="btn">
                                <i class="bi bi-eye"></i>
                            </a>
                            <a href="http://localhost/polytech/admin/<?= $article['id']; ?>/edit" class="btn">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="http://localhost/polytech/admin/<?= $article['id']; ?>/delete" class="btn">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>

            </table>
            <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                Ajouter un article
            </button>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Ajouter un article</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="./Controller/AdminController.php" method="post">
                        <div class="modal-body">

                                <div class="form-group">
                                    <label for="title">Titre</label>
                                    <input name="title" type="text" class="form-control" id="title"  placeholder="Entrer un le titre">
                                </div>
                                <div class="form-group">
                                    <label for="category">Categorie</label>
                                    <select name="category" class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" id="category">
                                        <option selected>Ouvrez le menu de selection</option>
                                        <option value="sport">Sport</option>
                                        <option value="politique">Politique</option>
                                        <option value="education">Education</option>
                                        <option value="sante">Santé</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="content">Contenu</label>
                                    <textarea class="form-control" id="content" name="content" rows="3"></textarea>
                                </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                            <input type="submit" name="submit" class="btn btn-primary" value="Ajouter">
                        </div>
                        </form>
                    </div>
                </div>
            </div>


        </div>



<?php
    require($_SERVER['DOCUMENT_ROOT'].'/polytech/inc/footer.php') ;
}
else{
    header("location: http://localhost/polytech/login");
}

