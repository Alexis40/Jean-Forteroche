class SpaceMember {
    constructor(){
        this.animMember = document.querySelector('.menuMemberOnClick');
        this.menuMember = document.querySelector('.menuMember');
        this.logOutMember = document.querySelector('.logout');
    }

    connexionSpaceMember(){
        if(this.logOutMember==null){
            this.spaceMemberConnexionChoice(this.animMember);
        } else {
            this.spaceMemberConnexionChoice(this.logOutMember);
        }
    }

    spaceMemberConnexionChoice(classMember){
        classMember.addEventListener("click", function(){
            this.display = getComputedStyle(this.menuMember, null).display;
            if(this.display == "block"){
                this.menuMember.style.display = "none";
            } else {
                this.menuMember.style.display = "block";
                this.testdeconnexion;
            }
        }.bind(this));
        classMember.addEventListener("mouseleave", function(){
            this.menuMember.style.display = "none";
        }.bind(this));
    }
}
