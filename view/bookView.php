<div id=showChapterBook>
   <div class="chapter">
      <?php
      if(!empty($chapter)){
      ?>
         <p>Chapitre <?= $chapter->getChapterNumber(); ?></p>
         <h1><?= $chapter->getChapterName(); ?></h1>
         <p class='completText'><?= $chapter->getAllChapterContent(); ?></p>
         <p>Publié le : <?= $chapter->getDateOfPublicationDMY(); ?></p>
      <?php
      } else {
         echo 'ce chapitre n\'existe pas';
      }
      ?>
   </div>
   <div class='navChapter'>
      <h1>Choisir votre chapitre</h1>
      <?php foreach($allChapter as $chaptershow):?>
         <a href="index.php?page=book&amp;id=<?= $chaptershow->getId(); ?>">
            <h4>Chapitre <?= $chaptershow->getChapterNumber()?></br>
               <?= $chaptershow->getChapterName()?>
            </h4>
            <p><?=$chaptershow->getShortChapterContent100()?></p>
         </a>
      <?php endforeach;?>
   </div>
</div>

<?php if(!empty($message)){
   echo $message;
} ?>
<div id="commentaire">
    <?php foreach($commentsList as $comment): ?>
      <p class="containsComments"><strong><?= $comment->getAuthor()?></strong> à ecrit le <em><?=$comment->getDateOfPublicationDMYHIS();?></em></br>
      <?= $comment->getCommentContent() ?></p>
     
      <?php if($comment->getReport() == 'Signalé'){ ?>
            <p>Ce commentaire à été signalé</p>
      <?php } else { ?>
            <p><a href="index.php?page=reportAction&amp;reportId=<?= $comment->getId(); ?>&amp;id=<?= $chapter->getId(); ?>">Signaler ce commentaire</a></p>
      <?php } ?>
    <?php endforeach;?>
</div>
<div>
   <h2>Laisser un commentaire</h2>
   <form action="index.php?page=addCommentAction&amp;id=<?= $chapter->getId() ?>" method="post">
   <input type="hidden" name="idChapter" value="<?= $chapter->getId() ?>">
      <div>
         <label for="author">Auteur</label></br>
         <input type="text" id="author" name="author" <?php if(!empty($_SESSION)): ?>value="<?= $member->getPseudo() ?>" <?php else : ?> value="Invité" <?php endif; ?> readonly >
      </div>
      <div>
         <label for="commentContent">Commentaire</label></br>
         <textarea name="commentContent" id="commentContent" cols="30" rows="10"></textarea>
      </div>
      <div>
         <input type="submit">
      </div>

   </form>
</div>