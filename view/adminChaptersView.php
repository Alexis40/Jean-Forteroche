<?php 

?>

 <script>
      tinymce.init({
        selector: '#chapterContent',
        language: 'fr_FR',
      });
</script>

<p class="warningMessage"><?php  echo $warningMessage ?></p>

<h1>Administration des chapitres</h1>
  <table>
    <tr>
        <th>Numero du chapitre</th>
		<th>Nom du chapitre</th>
		<th>Date de publication</th>
        <th>Modifier le chapitre</th>
        <th>Supprimer le chapitre</th>
    </tr>
  <?php foreach($allChapters as $chapter): ?>
    <tr>
        <td><?= $chapter->getChapterNumber() ?></td>
        <td><?= $chapter->getChapterName() ?></td>
        <td><?= $chapter->getDateOfPublicationDMY() ?></td>
        <td><a href="index.php?page=modifyChapterAction&amp;idModifyChapter=<?= $chapter->getId() ?>"><button>Modifier le chapitre</button></a></td>
        <td><a href="index.php?page=deleteChapterAction&amp;idDelChapter=<?= $chapter->getId() ?>"><button>Supprimer le chapitre</button></a></td>
    </tr>
  <?php endforeach; ?>
  </table>

<?php if(!empty($chapterToModify)){ ?>

	<?php echo 'modifier le chapitre'; ?>
<p>Vous etes en cours de travail sur le chapitre numero <?= $chapterToModify->getChapterNumber() ?> : <?= $chapterToModify->getChapterName() ?></p>
    <form action="index.php?page=updateChapterAction" method="post">
        <input type="hidden" name="id" value="<?=  $chapterToModify->getId() ?>">
        <input type="hidden" name="chapterName" value="<?=  $chapterToModify->getChapterName() ?>">
        <textarea id="chapterContent" name="chapterContent"><?= $chapterToModify->getAllChapterContent() ?></textarea>
        <input type="submit" value="Mettre à jour">
    </form>
  
  

<?php } else { ?>
<h1>Edition de chapitre</h1>
	<form action="index.php?page=addChapterAction" method="post">
		<div>
			<label for="chapterNumber">Numéro du chapitre</label></br>
			<input type="text" id="chapterNumber" name="chapterNumber">
		</div>

		<div>
			<label for="chapterName">Nom du chapitre</label></br>
			<input type="text" id="chapterName" name="chapterName">
		</div>

		<label for="chapterContent">Dans cette section vous pourrez editer vos chapitres</label></br>  
		<textarea id="chapterContent" name="chapterContent">Commencer à écrire un nouveau chapitre.</textarea>

		<input type="submit">
	</form> 
	
	<?php } ?>
