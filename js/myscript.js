function verifica(){
    a = document.getElementById("senha").value;
    b = document.getElementById("csenha").value;
    if(a != b){
        alert("As senhas não conferem! Por favor digite novamente!");
        document.getElementById("senha").value = "";
        document.getElementById("csenha").value = "";
	    document.getElementById("senha").focus();
    }
}

function ajustes(form){
    form.numaquina.value = form.numaquina.value.toUpperCase();
}


function masc_phone(masc){
    if(masc.value.length == 2){
        masc.value += "-";
    }
    if(masc.value.length == 7){
        masc.value += "/";
    }
}

function salto(campo,digito){
    if(campo == "numaquina"){
        if(digito.length > 8){
            document.chamado.motivo.focus();
        }
    }   
}

function confirma(go){
    nome = document.getElementById('named').value;
        
        if(confirm("Confirma a EXCLUSÂO desse usuario?")){
            alert('Usuario EXCLUÍDO com Sucesso.');
            return true;
        }
        else{
            return false;
        }
}

function confirma2(reative){
    nome = document.getElementById('named').value;
        
        if(confirm("Confirma a REATIVAÇÂO desse usuario?")){
            alert('Usuario REATIVADO com Sucesso! \n OBS: Agora esse usuario está na página de "Usuarios Ativos".');
            return true;
        }
        else{
            return false;
        }
}

function piscar(){
        var tempo = 100;
        var ob = document.getElementById("image");
        var esconder = document.getElementById("esconder");
        
        
        if (ob.style.display == "none"){
            ob.style.position = "fixed";
            ob.style.display = "block";
            esconder.style.display = "block";
            
        }else{
            ob.style.position = "relative";
            ob.style.display = "none";
            esconder.style.display = "none";
            var tempo = 25000;
        }
    
        setTimeout('piscar()', tempo)
        
}