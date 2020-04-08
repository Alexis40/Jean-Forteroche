class Comments{
    constructor(){
        this.report = document.querySelector('.reportField');
        this.commentLine = document.querySelector('.commentLine');
    }

    changeColorLine(){
        if(this.report.innerHTML=="Signalé"){
            this.commentLine.style.color='red';
        }
    }
}