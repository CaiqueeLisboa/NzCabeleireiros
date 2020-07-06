function MostrarButton(id,a,c,b) {
	if(document.getElementById(id).style.display == 'block'){
		document.getElementById(id).style.display = 'none';
	}else{ 
        document.getElementById(id).style.display = 'block';
        document.getElementById(a).style.display = 'none';  
        document.getElementById(b).style.display = 'none';  
        document.getElementById(c).style.display = 'none';
    }
}

function abrirPopup(idPopup){
    const icone = document.querySelector('.icone');
    icone.addEventListener('click', function() {
        abrirPopup('servico_popup');
    })
    const popup = document.getElementById(idPopup);
    if(idPopup){
        popup.classList.add('mostrar');
        popup.addEventListener('click', (e) => {
            if(e.target.id == idPopup || e.target.className == 'fechar'){
                popup.classList.remove('mostrar');
            }
        });
    }
}