<div class="chapter">
   <?php
    if(!empty($chapter)){
   ?>
      <p>Chapitre N° <?= $chapter->getChapterNumber(); ?></p>
      <p>Publié le : <?= $chapter->getDateOfPublication(); ?></p>
      <h2><?= $chapter->getChapterName(); ?></h2>
      <p><?= $chapter->getAllContent(); ?></p>
   <?php
    } else {
       echo 'ce chapitre n\'existe pas';
    }
    ?>
</div>
<div class="commentaire">
    <?php foreach($commentsList as $comment): ?>
      <p><strong><?= $comment->getAuthor()?></strong> à ecrit le <em><?=$comment->getDateOfPublication();?></em>
      <?= $comment->getContent() ?></p>
    <?php endforeach;?>
</div>

