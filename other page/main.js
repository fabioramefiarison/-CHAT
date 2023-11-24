function get(id){
     return document.getElementById(id)
}

const bullesBcp = ()=>{
let bulles = document.createElement("span");
bulles.classList.add("bulles");
const apparitionBulle = document.body.appendChild(bulles)

const tailleBulles = Math.random() * 200 + 100 + "px";
bulles.style.width = tailleBulles
bulles.style.height = tailleBulles
bulles.style.cursor = "grab"
bulles.innerHTML = "hafatra";


bulles.style.top = Math.random() * 100 + 50  + "%"
bulles.style.left = Math.random() * 100 + "%"

bulles.style.setProperty("--left",Math.random() * 100 +"%");
bulles.addEventListener('click',()=>{
     bulles.style.display = "none"
     bulles.style.transition = "0.2s ease"
})
}
setInterval(bullesBcp,800);

const mailCheck = (value)=>{
     const erreurDisplay = get("alerte-email")
     if(!value.match(/^[\w_-]+@[\w-]+\.[a-z]{2,4}$/i)){
     erreurDisplay.innerHTML = "L'@mail n'est pas valide !"
     erreurDisplay.style.visibility = "visible"
     }
     else
     erreurDisplay.style.visibility = "hidden"
     
}
const mdpCheck = (value)=>{
     const barMdp = get("bar-mdp");
     const alerteMdp = get("alerte-mdp")
    /* if (!value.match(/^(?=.*?[A-Z])(?=(.*[a-z]){1,})(?=(.*[\d]){1,})(?=(.*[\W]){1,})(?!.*\s).{8,}$/)) {
          console.log("if");
          barMdp.style.visibility = "visible"
          alerteMdp.textContent = "Minimum 8 caractéres ,une majuscule , et ne peut pas contenir des caractères spéciaux !"   
     }
     else */if(value.length < 6){
          barMdp.style.visibility = "visible"
          alerteMdp.textContent = "Minimum 6 caractéres !"
     }
     else{
          alerteMdp.style.visibility = "hidden"
          barMdp.style.border = "2px solid blue"
          barMdp.style.width = "90%"
          barMdp.style.visibility = "visible"    
     }
}
const inputs = document.querySelectorAll('input[type="email"],input[type="password"]');
inputs.forEach((input) =>{
input.addEventListener('input',(e)=>{
switch (e.target.id) {
     case "email":
          mailCheck(e.target.value);
          break;
      case "password":
           mdpCheck(e.target.value);
           break;
     default:null
          break;
}
})
})
