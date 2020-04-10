<div id="slider">
    <div id ="image"></div>
    <div id ="instruction"></div>
</div>

<div id="bio">
    <h1>Jean Forteroche</h1>
    <p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce rhoncus, lorem in vestibulum suscipit, dui ex vulputate justo, in aliquam sapien ipsum cursus quam. Sed eget magna non quam volutpat pellentesque. Vestibulum at faucibus urna, quis mollis sem. Morbi nec rutrum nisl. Mauris mauris turpis, elementum in tellus in, sodales venenatis elit. Etiam non vehicula est, quis posuere ante. Sed accumsan velit in facilisis feugiat. Integer et malesuada est, ac pharetra est. Mauris lectus mauris, hendrerit molestie vestibulum faucibus, auctor a tellus. Suspendisse vulputate dui in ligula varius, sed faucibus metus tincidunt. Proin tincidunt diam vel dolor lacinia, vitae ultrices eros cursus. Maecenas semper quam felis, eget fermentum sem pharetra sed. Curabitur justo elit, dictum id tellus eu, mattis laoreet metus. Pellentesque elementum velit arcu, ac semper leo accumsan ut. Nulla volutpat lacinia diam sed consectetur. 
        Suspendisse condimentum massa a erat convallis convallis. </p>
    <p>Curabitur tempus ut tortor et volutpat. Sed vulputate, ipsum at facilisis elementum, lorem turpis convallis metus, non sollicitudin elit elit vitae odio. Proin vel odio nec turpis interdum fermentum non at metus. Donec consequat tellus odio, sed convallis dui pulvinar in. In condimentum augue enim, quis blandit magna accumsan ac. Integer vitae feugiat felis, vel ullamcorper nisl. Vivamus varius est at efficitur interdum. Praesent orci risus, volutpat eget eros quis, congue interdum felis. Nulla dictum tortor et tortor pharetra feugiat. Vestibulum finibus risus eget maximus condimentum. Sed risus risus, varius vitae nibh ut, euismod ornare diam. Sed tincidunt enim nec cursus dictum. Ut cursus dui ac dignissim posuere. Cras dolor dolor, egestas eget diam eget, commodo posuere urna. Quisque ultricies ultrices ultrices. 
        Suspendisse id tincidunt nisl. </p>
</div>
<div id='lastChapitre'>
    <h1>les trois derniers chapitres</h1>
        <div id="showChapter">
            <?php foreach($chaptersList as $chapter): ?>
                <div class="partOfChapter">
                    <h3>
                        Chapitre <?= $chapter->getChapterNumber();?> : <?= $chapter->getChapterName(); ?>
                    </h3>
                    <p><?= $chapter->getShortChapterContent500(); ?> ... </p>
                    <p><em>Publier le : <?= $chapter->getDateOfPublicationDMY(); ?></em></p>

                    <button><a href="index.php?page=book&amp;id=<?=$chapter->getId();?>"> Lire la suite ...</a></button>
                </div>
            <?php endforeach;?>
        </div>
</div>

  
