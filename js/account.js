

    document.getElementById('settings').addEventListener('submit', function() {
    event.preventDefault();
    formdata = new FormData(document.getElementById('settings'));
    fetch('../Backend/Updatesettings.php', {
        method: 'POST',
        body: formdata
    })
    .then(response => response.text())
    .then(data => {
        if (data == "success") {
            document.getElementById('settings-container').innerHTML = "<h2>Settings updated successfully!</h2><\n><p>Redirecting to search page...</p>";
            document.getElementById('logoutBtn').remove();
            setTimeout(function(){window.location.href = "../Stararchive/search.php"}, 2000);
        } else {
            alert("Error updating settings: " + data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert("An error occurred while updating settings.");
    })
    });

    document.getElementById('logoutBtn').addEventListener('click', function() {
        formdata = new FormData;
        formdata.append('action', 'logout');   
        fetch('../Backend/auth.php', {
            method: 'POST',
            body: formdata
        }).then(response => response.text())
        .then(data => {
            if (data == "success") {
                document.getElementById('settings-container').innerHTML = "<h2>Logged out successfully!</h2><\n><p>Redirecting to login page...</p>";
                setTimeout(function(){window.location.href = "../Stararchive/search.php"}, 2000);
            } else {
                alert("Error logging out: " + data);
            }
        })

    });

