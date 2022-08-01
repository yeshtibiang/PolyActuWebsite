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
        } ?>
            <?php if (isset($url) and $url[0] == ''){ ?>
        <div class="container">
            <ul class="pagination" >
                <li class="pagination-li">
                    <a href="http://localhost/polytech/?page=1">Premier</a>
                </li>
                <li class="pagination-li <?php if($page <= 1){ echo 'disabled'; } ?>">
                    <a href="http://localhost/polytech/<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1); } ?>">Précédent</a>
                </li>
                <li class="pagination-li <?php if($page >= $total_pages){ echo 'disabled'; } ?>">
                    <a href="http://localhost/polytech/<?php if($page >= $total_pages){ echo '#'; } else { echo "?page=".($page + 1); } ?>">Suivant</a>
                </li>
                <li class="pagination-li">
                    <a href="http://localhost/polytech/?page=<?php echo $total_pages; ?>">Dernier</a>
                </li>
            </ul>
        </div>
        <?php } ?>
        <?php
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