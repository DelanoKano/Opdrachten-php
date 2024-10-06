function showPassword () {
    let password = document.querySelector('#Password');
    if(password.type === 'password') password.type = 'text';
    else password.type = 'password';
    
}