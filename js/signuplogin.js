function showForm(type) {
    document.getElementById('loginForm').classList.remove('active');
    document.getElementById('signupForm').classList.remove('active');
    document.getElementById(type + 'Form').classList.add('active');
    document.getElementById('resultShow').innerText = "";
}

function handleLogin(event) {
    event.preventDefault();
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;
    
    


    //document.getElementById('resultShow').innerText = `Logged in as ${email}`;
}

function handleSignup(event) {
    event.preventDefault();
    const username = document.getElementById('signupUsername').value;
    const email = document.getElementById('signupEmail').value;
    const password = document.getElementById('signupPassword').value;

    const signUp = new FormData();
    signUp.append('username', username);
    signUp.append('email', email);
    signUp.append('password', password);

    signUp.append('action', 'signup');
    fetch('../backend/auth.php', {
        method: 'POST',
        body: signUp
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('resultShow').innerText = data;
        console.log( data);
    })
    .catch(error => {
        document.getElementById('resultShow').innerText = 'Signup failed.';
        console.error('Error:', error);
    });
}


    function handleLogin(event) {
    event.preventDefault();
    const email = document.getElementById('loginEmail').value;
    const password = document.getElementById('loginPassword').value;

    const login = new FormData();
    login.append('email', email);
    login.append('password', password);

    login.append('action', 'login');
    fetch('../backend/auth.php', {
        method: 'POST',
        body: login
    })
    .then(response => response.text())
    .then(data => {
        document.getElementById('resultShow').innerText = data;
        window.location.href = "search.php";
    })
    .catch(error => {
        document.getElementById('resultShow').innerText = 'Signup failed.';
        console.error('Error:', error);
    });

    


    }
