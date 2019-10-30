
function cacherFormulaireA(){
    var inputs  = document.querySelectorAll("#formulaireA .texte");
    var formFull = true;
    

    inputs.forEach(function(input){
        if(input.value ==""){
            formFull = false;
        }
    });

//Vérification choix radio
    let radios = document.querySelectorAll("#formulaireA input[name=sexe]");
            
    let radioCheck = false;
    radios.forEach(function(radio){
        if(radio.checked){
            radioCheck = true;
        }
    });

    if(!radioCheck){
        formFull = false;    
    }
//----------------------------------------------
        if(formFull == true){
            document.getElementById("formA").style.display = "none";
        }
    }

function cacherFormulaireO(){
    var inputs  = document.querySelectorAll("#formulaireO .texte");
    var formFull = true;
    
    inputs.forEach(function(input){
        if(input.value ==""){
            formFull = false;
        }
    });
    
//Vérification choix radio
let radios = document.querySelectorAll("#formulaireO input[name=sexe]");
            
let radioCheck = false;
radios.forEach(function(radio){
    if(radio.checked){
        radioCheck = true;
    }
});
if(!radioCheck){
    formFull = false;    
}

//----------------------------------------------------

    if(formFull == true){
        document.getElementById("formO").style.display = "none";
    }
}

function cacherFormulaireP(){
    var inputs  = document.querySelectorAll("#formulaireP .texte");
    var formFull = true;
    
    inputs.forEach(function(input){
        if(input.value ==""){
            formFull = false;
        }
    });
    
//Vérification choix radio
let radios = document.querySelectorAll("#formulaireP input[name=sexe]");
            
let radioCheck = false;
radios.forEach(function(radio){
    if(radio.checked){
        radioCheck = true;
    }
});
if(!radioCheck){
    formFull = false;    
}
//----------------------------------------------------

    if(formFull == true){
        document.getElementById("formP").style.display = "none";
    }
}