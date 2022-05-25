function createInput(name, placeholder, type, required, value){
    let input = document.createElement("input");
    input.type = type;
    input.name = name;
    input.placeholder = placeholder;
    if(type != "hidden" && type != "checkbox"){
        input.className = "form-control form-thof form-width";
    }
    if(required === true){
        input.required = true;
    }
    input.value = value;

    return(input);
}

function createSelect(name, titre, required, options){
    let select = document.createElement("select");
    select.name = name;
    select.className = "form-select form-thof form-width";
    if(required === true){
        select.required = true;
    }

    if(titre != null){
        let option = document.createElement("option");
        option.value = "disabled";
        option.text = titre;
        option.selected = true;
        // option.disabled = true;
        select.appendChild(option);
    }

    options.forEach(element => {
        option = document.createElement("option");
        option.value = element;
        option.text = element[0].toUpperCase() + element.slice(1);
        select.appendChild(option);
    });

    return(select);
}

function createButton(text, type, className){
    var newButton = document.createElement("button");

    newButton.textContent = text;
    newButton.type = type;
    newButton.className = className;

    return newButton;
}

function addMessageError(divContent, idMsgError){
    let spanMessageErrorType = document.createElement("span");
    spanMessageErrorType.className = "text-danger";
    spanMessageErrorType.id = idMsgError;
    divContent.appendChild(spanMessageErrorType);
}