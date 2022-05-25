/**Permet de voir le mot de passe saisi */
function afficherCurrentPassword()
{ 
    var input = document.getElementById("current_password"); 
    if (input.type === "password"){ 
        input.type = "text";
        document.getElementById("eyes").className="bi bi-eye-slash-fill";
    } else{ 
        input.type = "password"; 
        document.getElementById("eyes").className="bi bi-eye-fill";
    } 
} 

function afficherNewPassword()
{ 
    var input = document.getElementById("password"); 
    if (input.type === "password"){ 
        input.type = "text";
        document.getElementById("eyes").className="bi bi-eye-slash-fill";
    } else{ 
        input.type = "password"; 
        document.getElementById("eyes").className="bi bi-eye-fill";
    } 
} 

function afficherConfirmationPassword()
{ 
    var input = document.getElementById("password_confirmation"); 
    if (input.type === "password"){ 
        input.type = "text";
        document.getElementById("eyes").className="bi bi-eye-slash-fill";
    } else{ 
        input.type = "password"; 
        document.getElementById("eyes").className="bi bi-eye-fill";
    } 
}

