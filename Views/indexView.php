<?php
    require './inc/nav.php';
    if (!empty($articles)){
        foreach($articles as $article){
            ?>
            <div class="content">
                <h3>
                    <a href="http://localhost/polytech/<?= $article['category'] ?>/<?= $article['id'];?>">
                        <?=$article['title']; ?>
                    </a>
                </h3>
                <p><?= substr($article['content'], 0, 200) ; ?>...</p>
            </div>

            <?php
        }

    }
    else{
        ?>
            <div class="content">
                <p>Pas d'articles pour le moment!!!</p>
            </div>

        <?php

    }
    require './inc/footer.php';
?>