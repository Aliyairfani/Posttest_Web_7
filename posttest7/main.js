if(localStorage.getItem('preferredTheme') == 'dark') {
    setDarkMode(true)
}

function setDarkMode(isDark) {
    var darkBtn = document.getElementById('darkBtn')
    var lightBtn = document.getElementById('lightBtn')

    if(isDark) {
        lightBtn.style.display = "block"
        darkBtn.style.display = "none" 
        localStorage.setItem('preferredTheme', 'dark');
    } else {
        lightBtn.style.display = "none"
        darkBtn.style.display = "block"
        localStorage.removeItem('preferredTheme');
    }
    document.body.classList.toggle("darkmode");
}

const konfir = confirm('Ini website review perfume, apakah anda butuh bantuan?');
console.log(konfir)

if(konfir == true){
    console.log('berhasil');
} else{
    console.log('gagal');
}

const heder   = document.getElementsByClassName('pembuka');

heder[0].addEventListener('mouseenter', function(){
    heder[0].style.color = '#748DA6';
});

heder[0].addEventListener('mouseleave', function(){
    heder[0].style.color = 'aliceblue';
});

