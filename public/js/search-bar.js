const form = document.getElementById('search-form'); 

form.addEventListener('submit', function(e){
    e.preventDefault(); 

    const token = document.querySelector('meta[name="csrf-token"]').content;
    const url = this.getAttribute('action'); 
    const q = document.getElementById('q').value; 

    fetch(url, {
        headers : {
            'Content-Type' : 'application/json',
            'X-CSRF-TOKEN' : token
        },
        method: 'post', 
        body: JSON.stringify({
            q: q
        })
    }).then(response => {
        response.json().then(data => {
            const formulaire = document.getElementById('forms'); 
            formulaire.innerHTML = ''; 
            const result = Object.entries(data)[0][1]
            if((Object.keys(result).length === 0) == true){
                formulaire.innerHTML = `
                <div class="container card">
                    <div class="row">
                        <div class="col-md-12 border p-3">
                            <div class="row">
                                <div class="col-md-1 col-1 text-center"><i class="bi bi-x-circle icon-section-red"></i></div>
                                <div class="col-md-8 col-5 part-text"><p class="text-partie-dashboard text-danger">Aucun résultat ne correpond à votre recherche</p></div>
                            </div>
                        </div>
                    </div>
                </div>`
            }
            Object.entries(data)[0][1].forEach(element => {
                var date = new Date(element.created_at); 
                formulaire.innerHTML += `
                <a href="/~hadi0005/thof/public/demande/show/${element.id}">
                    <div class="container card mt-4">
                        <div class="row">
                            <div class="col-md-12 border p-3">
                                <div class="row">
                                    <div class="col-md-1 col-2 text-center"><p class="number-chat">${element.id}</p></div>
                                    <div class="col-md-8 col-5 part-text"><p class="text-partie-dashboard">${element.nom_formulaire} </p>  <p style="font-size:13px; margin-bottom : 0px; ">${element.description_formulaire}</p></div>
                                    <div class="col-md-3 col-5 part-text text-right"><p class="text-partie-demande-creation">Formulaire crée le ${date.toLocaleDateString()} </p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>`
            });
            
        })
    }).catch(error => {
        console.log(error)
    })
}); 