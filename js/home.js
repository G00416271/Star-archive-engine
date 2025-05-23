function close(){
    let dropdowns = document.getElementsByClassName("dropdown");
      for (let i = 0; i < dropdowns.length; i++) {
      dropdowns[i].innerHTML = "";
      }
  }
  
  let set_location = "";
  let set_value = "";


  function locate(location , value){ 
      set_location = location; 
      set_value = value;
    }
  
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

function autofill(valueOfAutofill) {
  close();
  
  let location_of_element = (set_location.split("," )[1]);
  
  document.getElementById(location_of_element).value = valueOfAutofill;

}

var formQuestion = getFiles();


function submit(){
    close();
    event.preventDefault()
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

  function addToCart(id){
    const formData = new FormData();
    formData.append("id",id);
    console.log('formdata' + formData.get("id"));

    fetch("cartcount.php", {
      method:"POST",
      body:formData,
    })

      .then((response) =>{
        if (response.ok){
          return response.text();
        }
        throw new Error("Network response was not ok.")
      })
      .then((data) => {
        document.getElementById("cart_response").innerHTML = data;
        
      })
      .catch((error) => {
        console.error("Error: " , error);
      });
  }


  document.addEventListener('click', function(event) {
    if (event.target.classList.contains('addToCartBtn')) {

      info = new FormData();
      info.append('action' , 'count')
      
      fetch('../Stararchive/search.php', {
        method: 'POST',
        body: info
      })
      .then(response => {
        if (response.ok) {
          return response.text();
        }
        throw new Error('Network response was not ok.');
      })
      .then(data => {
        //console.log('Count:', data);
        document.getElementById('countnum').innerHTML = '(' + data + ')';
      })
      .catch(error => {
        console.error('Error:', error);
      });
    }
  });

const isActive = false;


const accountBtn = document.getElementById('account');
accountBtn.addEventListener('click', function(event) {
  event.preventDefault();
  const formdata = new FormData();
  formdata.append('action', 'checkActive');

  fetch('../backend/checkUser.php', {
    method: 'POST',
    body: formdata
  })
  .then(response => response.text())
  .then(data => {
    if (data.trim() === 'true'){
      console.log('User is logged in', data);
      window.location.href = "account.php";
    } else {
      console.log('User is not logged in', data);
      window.location.href = "signuplogin.php";
    }
  })
  .catch(error => {
    console.error('Fetch error:', error);
  });
});
