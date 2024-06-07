const searchBar = document.querySelector(".search input"),
searchIcon = document.querySelector(".search button"),
usersList = document.querySelector(".users-list");

searchIcon.onclick = ()=>{
  searchBar.classList.toggle("show");
  searchIcon.classList.toggle("active");
  searchBar.focus();
  if(searchBar.classList.contains("active")){
    searchBar.value = "";
    searchBar.classList.remove("active");
  }
}

searchBar.onkeyup = ()=>{ //adaugam o alta clasa atunci cand cautam utilizatori si oprim setinterval(ruleaza la 0.5sec) in a mai rula, pentru a merge mai bn
  let searchTerm = searchBar.value;
  if(searchTerm != ""){
    searchBar.classList.add("active");
  }else{
    searchBar.classList.remove("active");
  }
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "php/search.php", true);
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          usersList.innerHTML = data;
        }
    }
  }
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("searchTerm=" + searchTerm); // trimitem user search to php cu ajax
}

setInterval(() =>{
  let xhr = new XMLHttpRequest();
  xhr.open("GET", "php/users.php", true); //folosim metoda get pentru ca avem nevoie sa luam date nu sa trimitem
  xhr.onload = ()=>{
    if(xhr.readyState === XMLHttpRequest.DONE){
        if(xhr.status === 200){
          let data = xhr.response;
          if(!searchBar.classList.contains("active")){ // daca activ nu contine in searchbar atunci adaugam asta ???
            usersList.innerHTML = data;
          }
        }
    }
  }
  xhr.send();
}, 500); // functia asta va rula frecvent adica dupa 500ms

/*<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?> 
<?php 
  session_start();// sesiunea va fi setata atunci cand userul se inregistreaza sau logheaza daca nu il trimite direct la login
  include_once "php/config.php";
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
users//

<?php 
  session_start();
  include_once "php/config.php";//daca userul este logat atunci este trimis pe user.php
  if(!isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>
home//
<?php 
  session_start();
  include_once "php/config.php";//daca userul este logat atunci este trimis pe user.php
  if(!isset($_SESSION['unique_id'])){
    header("location: users.php");
  }
?>

chat//
<?php 
  session_start();
  include_once "php/config.php";
  if(isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>
login//
<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?>

users//

<?php 
  session_start();
  include_once "php/config.php";
  if(!isset($_SESSION['unique_id'])){
    header("location: login.php");
  }
?> 
*/