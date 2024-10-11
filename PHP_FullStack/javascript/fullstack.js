let info = document.querySelector('#info');


function showPassword () {
    let password = document.querySelector('#Password');
    if(password.type === 'password') password.type = 'text';
    else password.type = 'password';
    
}

info.addEventListener('click',  () => {
    info.innerHTML = window.confirm ("Sing for the Night: Unleash your inner superstar with Sing for the Night!, Grab the mic and enjoy a few hours of singing your heart out to your favorite tunes. Whether you're a seasoned performer or just here for fun, its the perfect way to let loose and make memories with friends." + "\n" + "\n" + "\n" + ("All in One: Why limit the fun? With All in One ,enjoy free drinks, karaoke, and singing—all in one amazing package! It's the ultimate experience to kick back, sip, and sing all night long. Get ready for a night of endless entertainment and good vibes!"));
})



