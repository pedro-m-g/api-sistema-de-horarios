function post(url, vars, headers, callback) {
    fetch(url, { cache: 'no-store', headers, method: 'POST', body: JSON.stringify(vars) })
        .then(response => response.json())
        .then(callback);
}

function findById(id) {
    return document.getElementById(id);
}

function display(id) {
    var output = findById(id);
    return function(json) {
        output.innerHTML = JSON.stringify(json, null, 4);
    };
}

function login(event) {
    event.preventDefault();
    var email = findById('login_email').value;
    var password = findById('login_password').value;
    post('/login', { email, password }, {}, display('login_output'));
}