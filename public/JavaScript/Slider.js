//CRÉATION DE L'OBJET SLIDER
class Slider {
    constructor(tagId){
        this.tagId = this.tagId;
        this.listImage = [];
        this.slider = document.getElementById(tagId);
        this.indexImage = 0;
        this.intervalId = null;
        this.play = false;
    }

//CRÉATION DES IMAGES
    addImage(pathImage, altImage, instruct){
        this.listImage.push([pathImage, altImage, instruct]);
    }

//REMISE A ZERO DES CONTENEURS
    contZero(){
        document.getElementById("image").innerHTML="";
        document.getElementById("instruction").innerHTML="";
    }
    
//AFFICHAGE DES IMAGES
    showImage(){
        let image = document.createElement("img");
        image.src = this.listImage[this.indexImage][0];
        image.alt = this.listImage[this.indexImage][1];
        image.style.width = "100%";
        //image.style.height = "100%";
        document.getElementById("image").appendChild(image);
        let insElts = document.getElementById("instruction");
        let insElt = document.createElement("p");
        insElt.textContent = this.listImage[this.indexImage][2];
        insElt.style.color = "#b22e3b";
        insElts.appendChild(insElt);
    }

//DEFILEMENT DES IMAGES EN AVANT
    nextImage(){
        this.contZero();
        this.indexImage++;
        if (this.indexImage >= this.listImage.length){
            this.indexImage = 0;
        }
        this.showImage();
    }     

//DEFILEMENT DES IMAGES EN ARRIÈRE
    prevImage(){
        this.contZero();
        this.indexImage--;
        if (this.indexImage < 0){
            this.indexImage = this.listImage.length-1;
        }
        this.showImage();
    }        

//CHANGEMENT AUTOMATIQUE DES IMAGES.
   shiftImage(){
        this.contZero();   
        this.showImage();
        if(this.play === false){
            this.intervalId = setInterval(function(){
                this.nextImage();
            }.bind(this), 5000);
            this.play = true;
        } 
   }

}
