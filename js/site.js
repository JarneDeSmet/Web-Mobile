var direction = 'horizontaal';

function change_menu() {
    var elem = document.getElementById('menu');
    if (direction == 'horizontaal') {
	    elem.classList.remove('horizontaal');
	    elem.classList.add('verticaal');
	    elem.classList.add('visible');
	    direction = '';
    } else {
	    elem.classList.remove('verticaal');
	    elem.classList.remove('visible');
	    elem.classList.add('horizontaal');
	    direction = 'horizontaal';
    }
}