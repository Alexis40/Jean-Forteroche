/*CE CODE PERMET DE FAIRE L'ANIMATION SUR LE MENU ESPACE MEMBRE QUI S ETROUVE DANS LE TEMPLATE.*/
let animMember = document.querySelector('.menuMemberOnClick');
let menuMember = document.querySelector('.menuMember');


animMember.addEventListener("click", function(){
    display = getComputedStyle(menuMember, null).display;
    if(display == "block"){
        menuMember.style.display = "none";
    } else {
        menuMember.style.display = "block";
    }
});