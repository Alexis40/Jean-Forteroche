
<div id="administration">
    <table>
            <tr>
                <th>Chapitres</th>
                <th>Commentaires</th>
                <th>Auteurs</th>
                <th>Status du commentaire</th>
                <th>Supprimer commentaires</th>
            </tr>
    <?php foreach($allComments as $comment): ?>
            <tr class="commentLine">
                <td><?= $allChapters[$comment->getIdChapter()]->getChapterNumber(); ?></td>
                <td><?= $comment->getCommentContent(); ?></td>
                <td><?= $comment->getAuthor(); ?></td>
                <td class="reportField"><a href="index.php?page=modifyReportAction&amp;idModifyReport=<?= $comment->getId() ?>"><?= $comment->getReport(); ?></a></td>
                <td><button><a href="index.php?page=deleteCommentAction&amp;idDelComment=<?= $comment->getId() ?>">Supprimer le commentaire</a></button></td>
            </tr>
    <?php endforeach; ?>
        </table>
    
    <P class="errorMessage"> 
    <?php if(!empty($warningMessage)){
        echo $warningMessage;
    } ?>
    </p>
   
</div>