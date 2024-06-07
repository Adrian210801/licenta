const form = document.querySelector(".signup form"),
continueBtn = form.querySelector(".button input"),
errorText = form.querySelector(".error-text");

form.onsubmit = (e)=>{
    e.preventDefault(); // prevenim form din a trimite
}

continueBtn.onclick = ()=>{
    let xhr = new XMLHttpRequest(); //creeam un obiect xml
    xhr.open("POST", "php/signup.php", true);
    xhr.onload = ()=>{
      if(xhr.readyState === XMLHttpRequest.DONE){
          if(xhr.status === 200){
              let data = xhr.response; //asta primeste din php
              if(data === "success"){
                errorText.style.display = "block";
                errorText.style.color = "green";
                errorText.textContent = "Inregistrare cu succes!";
                form.reset();
              }else{
                errorText.style.display = "block";
                errorText.textContent = data;
              }
          }
      }
    }
    //trebuie sa trimitem datele din form prin ajax in php
    let formData = new FormData(form); //creeam un new form obiect
    xhr.send(formData);//trimitem form data in php
}