// Fonction Connexion:

function test() {
    console.log('function working')
}

function Register() {
    let Email = document.querySelector('.Email').value
    let Password = document.querySelector('.Password').value

    let Login = {
        Email: Email,
        Password: Password,
    }

    const request = new XMLHttpRequest()
    request.open('POST', '/connexion', true)

    request.setRequestHeader('Content-Type', 'application/json')

    Login = JSON.stringify(Login)

    request.send(Login)

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
            console.log(request.responseTest)
            document.body.innerHTML = request.responseText
        }
    }
}

// Fonction ajouter une nouvelle promo:

function AjouterPromo() {
    let NomPromo = document.querySelector('#NomPromo').value
    let DebutPromo = document.querySelector('#DebutPromo').value
    let FinPromo = document.querySelector('#FinPromo').value
    let NbPlaces = document.querySelector('#NbPlaces').value
    let data = {
        NomPromo: NomPromo,
        DebutPromo: DebutPromo,
        FinPromo: FinPromo,
        NbPlaces: NbPlaces,
    }
    const request = new XMLHttpRequest()

    request.open('POST', '/ajouterPromo', true)

    request.setRequestHeader('Content-Type', 'application/json')

    data = JSON.stringify(data)

    request.send(data)

    request.onreadystatechange = function () {
        if (request.readyState === 4 && request.status === 200) {
        }
    }
}


//Fonction qui génére un code aléatoire:
function generateRandomCode(id) {
    let code = Math.floor(Math.random() * 90000) + 10000

    let codeDisplay = document.getElementById(id)

    codeDisplay.textContent = code

    const originalButton = document.getElementById('generateCodeBtn')

    const newButton = document.createElement('button')
    newButton.type = 'button'
    newButton.className = 'btn btn-warning'
    newButton.textContent = 'Signature en cours'

    originalButton.parentNode.replaceChild(newButton, originalButton)
}


function generateRandomCode2(id) {

    let code = Math.floor(Math.random() * 90000) + 10000

    let codeDisplay2 = document.getElementById(id)

    codeDisplay2.textContent = code
        
    const originalButton2 = document.getElementById('generateCodeBtn2')

    const newButton2 = document.createElement('button')
    newButton2.type = 'button'
    newButton2.className = 'btn btn-warning'
    newButton2.textContent = 'Signature en cours'

    originalButton2.parentNode.replaceChild(newButton2, originalButton2)

}