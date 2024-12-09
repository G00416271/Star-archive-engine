<html>
<head>
<script>

function close(){
    let dropdowns = document.getElementsByClassName("dropdown");
      for (let i = 0; i < dropdowns.length; i++) {
      dropdowns[i].innerHTML = "";
      }
  }
  
  function locate(location,element){ 
    if(location && element == null){
      return location;  
    }}
  
  function getFiles(formQuestion,location){
    close();
    const formData = new FormData(document.getElementById('search_archive'));
    formData.append('formQuestion', formQuestion);
    formData.append('location', location);
    let results = [];

    fetch('gethint.php',{ 
    method: 'POST',
    body: formData
    })
    .then(response => {
      if(response.ok){
        return response.text();
      }
      throw new Error('Network response was not ok.')
    })
    .then(data =>{      
      if (data.trim() !== "") {
        document.getElementById(location).innerHTML = data;
      }else{
        document.getElementById(location).innerHTML = "";
      }
    })
    .catch((error) =>{
      console.error('Error:',error);
    });

    return formQuestion
}

function autofill(value) {
    document.getElementById('char_name').value = value;
    document.getElementById('txtHint_char_name').innerHTML = "";
}

var formQuestion = getFiles();


function submit(){
    close();
    const formData = new FormData(document.getElementById('search_archive'));
    fetch('resultShow.php',{ 
    method: 'POST',
    body: formData
    })
    .then(response => {
      if(response.ok){
        return response.text();
      }
      throw new Error('Network response was not ok.')
    })
    .then(data =>{      
      if (data.trim() !== "") {
        document.getElementById('resultShow').innerHTML = data;
      }else{
        document.getElementById('resultShow').innerHTML = "nothing was found, this might be broken";
      }
    })
    .catch((error) =>{
      console.error('Error:',error);
    });
  }
</script>


<title>Home</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--Gooogle fonts-->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inconsolata">
<link href="https://fonts.cdnfonts.com/css/star-wars" rel="stylesheet">
<!--Bootstraps-->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!--CSS-->
<link href="navbar.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="home.css">

<!--Java Script-->
<script src="navbar.js"></script>
<script src="searchArchive.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>




<div class="logo" id="logobar">
    <img src="resources/Logo/Star_logo_Cropped.gif" id="logo-gif">
    <img src="resources/Logo/Star_logo_static.jpg" id="logo-static">

    <div class="logo" id="text_star_archive">Star Archive</div>
  </div>





<body>
  <div id="hyperspace">
    <form id="search_archive" >
      <!-- name -->
      <label for="char_name">Name</label>
      <input class="formQ" autofill="off" type="text" id="char_name" name="char_name" onkeyup="getFiles('char_name' , 'txtHint_char_name')">
      <ul  class="dropdown" id="txtHint_char_name"></ul>


      <!-- planet -->
      <label for="planet_name">Planet</label>
      <input class="formQ" type="text" id="planet_name" name="planet_name" onkeyup="getFiles('planet_name','txtHint_planet_name')">

       <ul class="dropdown"   id="txtHint_planet_name"></ul>


      <!-- species -->
      <label for="species_name">Species</label>
      <input class="formQ" type="text" id="species_name" name="species_name" onkeyup="getFiles('species_name' ,'txtHint_speies_name')";>

       <ul class="dropdown"   id="txtHint_speies_name"></ul>


      <!-- religion -->
      <label for="religion_name">Religion</label>
      <select class="formQ" name="religion_name" id="religion_name">
      <option value=""></option>
      <option value="Jedi">Jedi</option>
      <option value="Sith">Sith</option>
      </select>

       <ul class="dropdown"  id="txtHint_religion_name"></ul>


      <!-- droid   -->
      <label for="droid_name">Droid</label>
      <input class="formQ" type="text" id="droid_name" name="droid_name" onkeyup="getFiles('droid_name')">

       <ul class="dropdown" id="txtHint_droid_name"></ul>


      <!-- ship_model -->
      <label for="ship_name">Ship </label>
      <input class="formQ" type="text" id="ship_name" name="ship_name" onkeyup="getFiles('pilot_name' , 'txtHint_pilot_name')">

       <ul class="dropdown"   id="txtHint_ship_name"></ul>


      <!-- pilot -->
      <label for="pilot_name">Pilot</label>
      <input class="formQ" type="text" id="pilot_name" name="pilot_name" onkeyup="getFiles('pilot_name' , 'txtHint_pilot_name')">

       <ul class="dropdown" id="txtHint_pilot_name"></ul>

      <!-- movies -->
      <label for="movie_name">Movies</label>
      <input class="formQ" type="text" id="movie_name" name="movie_name" onkeyup="getFiles('movie_name','txtHint_movie_name')">

       <ul class="dropdown"   class="dropdown"id="txtHint_movie_name"></ul>

       
    </form>

    <button type="button" onclick="submit()">submit</button>


       <div id="resultShow"></div>
  </div>


  </body>


</html>