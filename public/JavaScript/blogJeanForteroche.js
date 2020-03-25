/*CE CODE PERMET DE FAIRE L'ANIMATION SUR LE MENU ESPACE MEMBRE QUI S ETROUVE DANS LE TEMPLATE.*/
let animMember = document.querySelector('.menuMemberOnClick');
let menuMember = document.querySelector('.menuMember');
let logOutMember = document.querySelector('.logout');

animMember.addEventListener("click", function(){
    display = getComputedStyle(menuMember, null).display;
    if(display == "block"){
        menuMember.style.display = "none";
    } else {
        menuMember.style.display = "block";
    }
});

logOutMember.addEventListener("click", function(){
    if(confirm("Voulez-vous quitter votre espace membre ?")){
        document.location.href="index.php?page=deconnexion"
    } else {
        console.log('je ne veux pas quitter mon espace membre');
    }
});