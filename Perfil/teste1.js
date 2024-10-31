function popEmail(){

    var pupup = document.getElementById('popup-email')

    if (pupup.style.opacity === '0'){
        pupup.style.opacity = '1'
        pupup.style.pointerEvents = 'all'
    }
    else{
        pupup.style.opacity = '0'
        pupup.style.pointerEvents = 'none'
    }

}

function popSenha(){

    var pupup = document.getElementById('popup-senha')

    if (pupup.style.opacity === '0'){
        pupup.style.opacity = '1'
        pupup.style.pointerEvents = 'all'
    }
    else{
        pupup.style.opacity = '0'
        pupup.style.pointerEvents = 'none'
    }

}