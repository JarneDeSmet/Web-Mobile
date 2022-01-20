document.querySelector('.submit').addEventListener("click", function() {
    if ( document.querySelector('.password').value === 'Veggiesucks') {
        location.href = '../meathub/index.html';
    }
    else {
        alert("Inloggegevens onjuist");
    }
    
});
