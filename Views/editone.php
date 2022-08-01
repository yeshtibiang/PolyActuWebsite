<?php
require($_SERVER['DOCUMENT_ROOT'].'/polytech/inc/nav.php');
?>

<div class="container">
    <h4>Formulaire de modification de l'article</h4>

    <form action="./edit" method="post">
        <?php foreach ($article as $article) { ?>
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titre" value="<?=$article["title"]; ?>">
        </div>
        <div class="form-group">
            <label for="category">Catégorie</label>
            <select class="form-control" id="category" name="category">
                <option value="sport" <?php if ($article['category'] == "sport"){ ?> selected="selected" <?php } ?> >Sport</option>
                <option value="politique" <?php if ($article['category'] == "politique"){ ?> selected="selected" <?php } ?> >Politique</option>
                <option value="education" <?php if ($article['category'] == "education"){ ?> selected="selected" <?php } ?> >Education</option>
                <option value="sante" <?php if ($article['category'] == "sante"){ ?> selected="selected" <?php } ?> >Santé</option>
            </select>
        </div>
        <div class="form-group">
            <label for="content">Contenu</label>
            <textarea class="form-control" id="content" rows="5" name="content" ><?=$article["content"] ?></textarea>
        </div>
        <?php } ?>
        <button type="submit" class="btn btn-primary mt-3" name="submit">Modifier</button>
    </form>
</div>
