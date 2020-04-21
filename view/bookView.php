<div id=showChapterBook>
   <div class="chapter">
      <?php
      if(!empty($chapter)){
      ?>
         <p class="chapterNumber">Chapitre <?= $chapter->getChapterNumber(); ?></p>
         <h1><?= $chapter->getChapterName(); ?></h1>
         <div class='completText'>aaaaa<?= $chapter->getAllChapterContent(); ?>bbbbbb</div>
         
         <p class="publicationDate">Publié le : <?= $chapter->getDateOfPublicationDMY(); ?></p>
      <?php
      } else {
         echo 'ce chapitre n\'existe pas';
      }
      ?>
   </div>
   <div class='navChapter'>
      <h1>Choisir votre chapitre</h1>
      <?php foreach($allChapter as $chaptershow):?>
         <a href="index.php?page=bookPage&amp;id=<?= $chaptershow->getId(); ?>">
            <h4>Chapitre <?= $chaptershow->getChapterNumber()?></br>
               <?= $chaptershow->getChapterName()?>
            </h4>
            <p><?=$chaptershow->getShortChapterContent100()?></p>
         </a>
      <?php endforeach;?>
   </div>
</div>


<div id="commentaire">
   <h1>Commentaires</h1>
<?php if(!empty($warningMessage)){ ?>
   <h4><?= $warningMessage ?></h4> 
<?php } ?>
   
    <?php foreach($commentsList as $comment): ?>
      <div class="oneComment">
         <p class="containsComments"><strong><?= $comment->getAuthor()?></strong> a écrit le <em><?=$comment->getDateOfPublicationDMYHIS();?></em></p>
         <p class="comment"><?= $comment->getCommentContent() ?></p>
      
         <?php if($comment->getReport() == 'Signalé'){ ?>
               <p class="report">Ce commentaire à été signalé</p>
         <?php } else { ?>
               <p class="report"><a href="index.php?page=reportAction&amp;reportId=<?= $comment->getId(); ?>&amp;id=<?= $chapter->getId(); ?>#commentaire">Signaler ce commentaire</a></p>
         <?php } ?>
      </div>
   <?php endforeach;?>
      
</div>
<div id="commentWrite">
   <h1>Laisser un commentaire</h1>
   <form class="commentForm" action="index.php?page=addCommentAction&amp;id=<?= $chapter->getId() ?>#commentaire" method="post">
   <input type="hidden" name="idChapter" value="<?= $chapter->getId() ?>">
      <div class="commentAuthor">
         <label for="author">Auteur : </label></br>
         <input type="text" id="author" name="author" <?php if(!empty($_SESSION)): ?>value="<?= $member->getPseudo() ?>" <?php else : ?> value="Invité" <?php endif; ?> readonly >
      </div>
      <div class="commentContent">
         <label for="commentContent">Commentaire : </label></br>
         <textarea name="commentContent" id="commentContent" required></textarea>
      </div>
      <div>
         <input class="submitButton" type="submit" >
      </div>

   </form>
</div>