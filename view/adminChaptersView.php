<div id="adminChapter">
    <h1>Administration des chapitres</h1>
    <table>
        <tr>
            <th>Numéro du chapitre</th>
            <th>Nom du chapitre</th>
            <th>Date de publication</th>
            <th>Modifier le chapitre</th>
            <th>Supprimer le chapitre</th>
        </tr>
    <?php foreach($allChapters as $chapter): ?>
        <tr>
            <td><?= $chapter->getChapterNumber() ?></a></td>
            <td><a class="adminDisplayChapter" href="index.php?page=adminChaptersPage&amp;chapterId=<?= $chapter->getId() ?>"><?= $chapter->getChapterName() ?></td>
            <td><?= $chapter->getDateOfPublicationDMY() ?></td>
            <td><a class="adminModifyButton" href="index.php?page=adminCreateChapterPage&amp;idModifyChapter=<?= $chapter->getId() ?>">Modifier</a></td>
            <td><a class="adminDeletedButton" href="index.php?page=deleteChapterAction&amp;idDelChapter=<?= $chapter->getId() ?>" 
                onclick = "return(confirm('Voulez-vous supprimer le chapitre : <?=  $chapter->getChapterName() ?>'))" >Supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>
    <p class="warningMessage"><?php  echo $warningMessage ?></p>
</div>

<div id="vueChapter">
    <?php
        if(!empty($seeChapter)){
        ?>
            <h1><?= $seeChapter->getChapterName(); ?></h1>
            <p class='completText'><?= $seeChapter->getAllChapterContent(); ?></p>
        <?php
        } else {
            echo 'ce chapitre n\'existe pas';
        }
        ?>
</div>




