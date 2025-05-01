<html>
<script>
        function updateSockList() {
            const formData = new FormData(document.getElementById('sock_form'));

            fetch('sockshow7.php', { // Change to your PHP script
                method: 'POST',
                body: formData,
            })
            .then(response => {
                if (response.ok) {
                    return response.text(); // or response.json() based on your response type
                }
                throw new Error('Network response was not ok.');
            })
            .then(data => {
                document.getElementById('sock_response').innerHTML = data; // Display the response
            })
            .catch((error) => {
                console.error('Error:', error);
            });
        }
</script>
    <head>
        <title>Star Archive Search</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--Gooogle fonts-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
        <link href="https://fonts.cdnfonts.com/css/star-wars" rel="stylesheet">
        <!--Bootstraps-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!--CSS-->
        <link href="../css/navbar.css" rel="stylesheet">
        <!--Java Script-->
        <script src="../js/navbar.js"></script>
        <script src="searchArchive.js"></script>
    </head>

    
<div class="logo" id="logobar">
    <img src="resources/Logo/Star_logo_Cropped.gif" id="logo-gif">
    <img src="resources/Logo/Star_logo_static.jpg" id="logo-static">

    <div class="logo" id="text_star_archive">Star Archive</div>
</div>

    <body>
        <p class="search_result" id="name"></p>

    <body>
</html>