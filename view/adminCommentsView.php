
<div id="adminComment">
    <h1>administration des commentaires</h1>
    <P class="errorMessage"> 
    <?php if(!empty($warningMessage)){
        echo $warningMessage;
    } ?>
    </p>
    
    <table>
            <tr>
                <th>Chapitres</th>
                <th>Commentaires</th>
                <th>Auteurs</th>
                <th>Statut du commentaire</th>
                <th>Supprimer commentaires</th>
            </tr>
    <?php foreach($allComments as $comment): ?>
            <tr class="commentLine">
                <td><?= $allChapters[$comment->getIdChapter()]->getChapterNumber(); ?></td>
                <td><?= $comment->getCommentContent(); ?></td>
                <td><?= $comment->getAuthor(); ?></td>
                <td class="reportField"><a href="index.php?page=modifyReportAction&amp;idModifyReport=<?= $comment->getId() ?>" 
                    onclick = "return(confirm('Voulez-vous supprimer le signalement ? '))" ><?= $comment->getReport(); ?></a></td>
                <td><a class="adminModifyButton" href="index.php?page=deleteCommentAction&amp;idDelComment=<?= $comment->getId() ?> " 
                    onclick = "return(confirm('Voulez-vous supprimer ce commentaire ? '))">Supprimer</a></td>
            </tr>
    <?php endforeach; ?>
        </table>
    
    
   
</div>