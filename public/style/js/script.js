

document.getElementById('btnregister').addEventListener('click', () => {
    Register()
})

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
            console.log(request.responseTest);
            document.body.innerHTML = request.responseText;
        }
    }
}
