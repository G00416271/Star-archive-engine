function showCart(){
    const formData = new FormData();

    fetch("cart_table.php", {
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
        console.log(data);
        document.getElementById("cart_change").innerHTML = data;
        
      })
      .catch((error) => {
        console.error("Error: " , error);
      });
  }

  function removeFromCart(id){
    const formData = new FormData();
    formData.append('remove_item',id);

    fetch("cart_table.php", {
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
        document.getElementById("cart_change").innerHTML = data;
        
      })
      .catch((error) => {
        console.error("Error: " , error);
      });
  }


  function changeCartValue(id,change){
    const formData = new FormData();
    formData.append('change_item',id);
    formData.append('change_number',change);

    fetch("cart_table.php", {
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

        document.getElementById("cart_change").innerHTML = data;
        
      })
      .catch((error) => {
        console.error("Error: " , error);
      });
  }

  function checkoutItems(total_price){
    window.location.href = "../Stararchive/confirmed.php" 
  }

  