<?php
    require "./inc/nav.php";
    if (!empty($articles)){
        foreach($articles as $article){
            ?>
            <div class="content">
                <h3>
                    <?=$article['title']; ?>
                </h3>
                <p><?= $article['content']; ?></p>
            </div>
            <?php
        }
        
    }
    require "./inc/footer.php"
?>
