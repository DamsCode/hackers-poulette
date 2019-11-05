const axios = require('axios');
axios.defaults.baseURL ="http://localhost/hackers-poulette";
let tab = {
    Austria: "Austria",
    Belgium: "Belgium",
    Bulgaria: "Bulgaria",
    Croatia: "Croatia",
    Cyprus: "Cyprus",
    Czech_Republic: "Czech Republic",
    Denmark: "Denmark",
    Estonia: "Estonia",
    Finland: "Finland",
    France: "France",
    Germany: "Germany",
    Greece: "Greece",
    Hungary: "Hungary",
    Ireland: "Ireland",
    Italy: "Italy",
    Latvia: "Latvia",
    Lithuania: "Lithuania",
    Luxembourg: "Luxembourg",
    Malta: "Malta",
    Netherlands: "Netherlands",
    Poland: "Poland",
    Portugal: "Portugal",
    Romania: "Romania",
    Slovak_Republic: "Slovak_Republic",
    Slovenia: "Slovenia",
    Spain: "Spain",
    Sweden: "Sweden",
    United_Kingdom: "United Kingdom"
};

let elem = document.querySelector("#country");
for (let tabKey in tab) {
    let option = document.createElement("option");
    option.value = tabKey;
    option.innerText =tab[tabKey];
    elem.appendChild(option);
}

document.addEventListener('load', function() {

});
document.addEventListener('DOMContentLoaded', function() {
    let elems = document.querySelectorAll('select');
    M.FormSelect.init(elems);
});
document.getElementById("form").addEventListener("submit",()=>{
    if (document.getElementById("website").valueOf != null){
        return false;
    }
});

let jsparse = (tabobj,elements)=>{
    for (let i = 0; i < elements.length-1; i++) {
        if (elements[i].getAttribute("name") != null){
            if (elements[i].getAttribute("type") == "radio"){
                if (elements[i].checked ){
                    tabobj[elements[i].getAttribute("name")] = elements[i].value;
                }
            }else{
                tabobj[elements[i].getAttribute("name")] = elements[i].value;
            }
        }
    }
};
document.getElementById("block-form").addEventListener("submit",(e)=>{
    e.preventDefault();
    form = document.forms.item(0);
    let objdata ={};
    jsparse(objdata,form.elements);
    axios.post('/getaway.php',objdata)
        .then(function (response) {
            if (response.status == 200){
                console.log(response.data);
            }
        })
        .catch(function (error) {
            console.log(error);
        })
        .finally(function () {

        });
});