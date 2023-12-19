function open_box(target){

    if(target == "question-rent"){
        document.getElementById("question-rent").style.display = '';
        document.getElementById("question-rent").style = 'animation-duration: 1s;display: block;margin: auto;';
        document.getElementById("question-volunteer").style.display = 'none';
    }else{
        document.getElementById("question-rent").style.display = 'none';
        document.getElementById("question-volunteer").style = 'animation-duration: 1s;display: block;margin: auto;';
        document.getElementById("question-volunteer").style.display = '';
    }
}
