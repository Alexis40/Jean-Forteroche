<div id=showChapterBook>
   <div class="chapter">
      <?php
      if(!empty($chapter)){
      ?>
         <p>Chapitre <?= $chapter->getChapterNumber(); ?></p>
         <h1><?= $chapter->getChapterName(); ?></h1>
         <p class='completText'><?= $chapter->getAllContent(); ?></p>
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
         <a href="index.php?page=book&amp;id=<?=$chaptershow->getId();?>">
            <h4>Chapitre <?= $chaptershow->getChapterNumber()?></br>
               <?= $chaptershow->getChapterName()?>
            </h4>
            <p><?=$chaptershow->getShortContent100()?></p>
         </a>
      <?php endforeach;?>
   </div>
</div>

<?php if(!empty($message)){
   echo $message;
} ?>
<div id="commentaire">
    <?php foreach($commentsList as $comment): ?>
      <p><strong><?= $comment->getAuthor()?></strong> à ecrit le <em><?=$comment->getDateOfPublicationDMYHIS();?></em>
      <?= $comment->getContent() ?></p>
    <?php endforeach;?>
</div>
<div>
   <h2>Laisser un commentaire</h2>
   <form action="index.php?page=addComment&amp;id=<?=$chapter->getId() ?>" method="post">
   <input type="hidden" name="idChapter" value="<?=$chapter->getId() ?>">
      <div>
         <label for="author">Auteur</label></br>
         <input type="text" id="author" name="author">
      </div>
      <div>
         <label for="content">Commentaire</label></br>
         <textarea name="content" id="content" cols="30" rows="10"></textarea>
      </div>
      <div>
         <input type="submit">
      </div>

   </form>
</div>