

function validar(){
    // Validar que password1 sea igual a password2
	if(document.getElementById("password").value != document.getElementById("password2").value){
            document.getElementById('alertapassword').style.display = 'block';
            document.getElementById("password").value = "";
            document.getElementById("password2").value = "";
        }else{
            // Validar que el password sea al menos de 6 caracteres
            var pass = document.getElementById("password").value + "";
            if (pass.length < 6){
                document.getElementById('alertapassword2').style.display = 'block';
                document.getElementById("password").value = "";
                document.getElementById("password2").value = "";
            }
        }
            
        if((document.getElementById("password2").value != NULL) && (document.getElementById("password").value != NULL)){
            document.getElementById('alertapassword').style.display = 'none';
        }
        
        
        
               
    
}

function agregarRE(){
     document.getElementById('agregarRE').style.display = 'block';
}

window.onload = function(){/*hace que se cargue la función lo que predetermina que div estará oculto hasta llamar a la función nuevamente*/
    document.getElementById('alertapassword').style.display = 'none';/* "contenido_a_mostrar" es el nombre de la etiqueta DIV que deseamos mostrar */
    document.getElementById('alertapassword2').style.display = 'none';
    document.getElementById('h').style.display = 'none';
}

//Funcion para las tablas
function Pager(tableName, itemsPerPage) {
    this.tableName = tableName;
    this.itemsPerPage = itemsPerPage;
    this.currentPage = 1;
    this.pages = 0;
    this.inited = false;
    this.showRecords = function(from, to) {
        var rows = document.getElementById(tableName).rows;
        // i starts from 1 to skip table header row
        for (var i = 1; i < rows.length; i++) {
            if (i < from || i > to)
                rows[i].style.display = 'none';
            else
                rows[i].style.display = '';
        }
    }

    this.showPage = function(pageNumber) {
        if (! this.inited) {
            alert("not inited");
            return;
        }

        var oldPageAnchor = document.getElementById('pg'+this.currentPage);
        oldPageAnchor.className = 'pg-normal';
        this.currentPage = pageNumber;
        var newPageAnchor = document.getElementById('pg'+this.currentPage);
        newPageAnchor.className = 'pg-selected';
        var from = (pageNumber - 1) * itemsPerPage + 1;
        var to = from + itemsPerPage - 1;
        this.showRecords(from, to);

    }

    this.prev = function() {
        if (this.currentPage > 1)
            this.showPage(this.currentPage - 1);
    }

    this.next = function() {
        if (this.currentPage < this.pages) {
            this.showPage(this.currentPage + 1);
        }
    }

    this.init = function() {
        var rows = document.getElementById(tableName).rows;
        var records = (rows.length - 1);

        this.pages = Math.ceil(records / itemsPerPage);
        this.inited = true;
    }

    this.showPageNav = function(pagerName, positionId) {
        if (! this.inited) {
            alert("not inited");
            return;
        }


        var element = document.getElementById(positionId);
        var pagerHtml = '<span onclick="' + pagerName + '.prev();" class="pg-normal"> « Prev </span> ';
        for (var page = 1; page <= this.pages; page++)
            pagerHtml += '<span id="pg' + page + '" class="pg-normal" onclick="' + pagerName + '.showPage(' + page + ');">' + page + '</span> ';
        
        pagerHtml += '<span onclick="'+pagerName+'.next();" class="pg-normal"> Next »</span>';
        element.innerHTML = pagerHtml;
    }

}

    

