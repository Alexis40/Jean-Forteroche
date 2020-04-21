<script>
      tinymce.init({
        selector: '#chapterContent',
        language: 'fr_FR',
        height: 1000,
        mobile: {
            menubar: true
  }
      });
</script>

<div id="editChapter">
    
    <?php if(!empty($chapterToModify)){ ?>
        <h1>Modifier le chapitre</h1>          
        <form class="createChapterForm" action="index.php?page=updateChapterAction&amp;chapterId=<?=  $chapterToModify->getId() ?>" method="post">
            <input type="hidden" name="id" value="<?=  $chapterToModify->getId() ?>">
            <div class="createChapter_fieldForm">
                <div class="createChapter_chapterNumber">
                    <label for="chapterNumber">Numéro du chapitre : </label>
                    <input type="text" id="chapterNumber" name="chapterNumber" value="<?=  $chapterToModify->getChapterNumber() ?>" >
                </div>
                <div class="createChapter_chapterName">
                    <label for="chapterName">Nom du chapitre : </label>
                    <input type="text" id="chapterName" name="chapterName" value="<?=  $chapterToModify->getChapterName() ?>" >
                </div>
            </div>
            <div class="createChapter_chapterContent">
                <textarea id="chapterContent" name="chapterContent"><?= $chapterToModify->getAllChapterContent() ?></textarea>
            </div>
            <div class="createChapter_submitButton" >
                    <input class="submitButton" type="submit" value="Mettre à jour !" onclick = "return(confirm('Voulez-vous mettre à jour ce chapitre ?'))" >
            </div>
        </form>
    <?php } else { ?>
        <h1>Création d'un chapitre</h1>
        <div class="errorMessage"><?= $warningMessage ?></div>
        <form class="createChapterForm" action="index.php?page=addChapterAction" method="post">
            <div class="createChapter_fieldForm">
                <div class="createChapter_chapterNumber">
                    <label for="chapterNumber">Numéro du chapitre : </label>
                    <input type="text" id="chapterNumber" name="chapterNumber">
                </div>
                <div class="createChapter_chapterName">
                    <label for="chapterName">Nom du chapitre : </label>
                    <input type="text" id="chapterName" name="chapterName">
                </div>
            </div>
                <div class="createChapter_chapterContent">
                    <textarea id="chapterContent" name="chapterContent">Commencer à écrire un nouveau chapitre.</textarea>
                </div>
                <div class="createChapter_submitButton">
                    <input class="submitButton" type="submit" value="Créer !" onclick = "return(confirm('Voulez-vous créer ce chapitre ?'))" >
                </div>
        </form> 
        
    <?php } ?>
</div>