document.querySelector('.submit').addEventListener("click", function() {
    if ( document.querySelector('.password').value === 'Veggiesucks') {
        location.href = 'index.html';
    }
    else {
        alert("Inloggegevens onjuist");
    }
    
});
