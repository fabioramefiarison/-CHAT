function  get(id) {
    return document.getElementById(id)
}
let Recherche = get("recherche");

Recherche.addEventListener("input" , ()=>{
    var messageUsers = document.querySelectorAll('#message-users')
var filter = recherche.value.toUpperCase();
var ul = get("myUl")
var li = ul.getElementsByTagName("li");
for (i = 0 ; i < li.length; i++) {
    a = li[i].getElementsByTagName("a")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
        messageUsers[i].style.display = "";
    } else {
        messageUsers[i].style.display = "none";
    }
}
});





