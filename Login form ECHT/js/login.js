document.querySelector('.submit').addEventListener("click", function() {
    if (document.querySelector('.name').value === 'adam' && document.querySelector('.password').value === 'roelandt') {
        location.href = 'index.html';
    }
    else {
        alert("Inloggegevens onjuist");
    }
    
});
