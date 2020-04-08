
let space = new SpaceMember();
space.connexionSpaceMember();

let slider = new Slider("slider");
slider.addImage("public/images/image1.jpg", "photo nmr 1", "Découvrez le nouveau livre de Jean Forteroche.");
slider.addImage("public/images/image2.jpg", "photo nmr 2", "Dans une nouvelle expérience exceptionnelle de lecture.");
slider.addImage("public/images/image3.jpg", "photo nmr 3", "Chaque mois un nouveau chapitre en ligne.");
slider.shiftImage();

//let comments = new Comments();
//comments.changeColorLine();