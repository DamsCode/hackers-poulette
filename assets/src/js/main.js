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

jsparse = (tabobj,elements)=>{
    for (let i = 0; i < elements.length; i++) {
        if (elements[i].getAttribute("name") != null){
            if (elements[i].checked ){
                console.log(elements[i].value);
            }else
                console.log(elements[i].getAttribute("name")+elements[i].value);
        }

    }
};
document.getElementById("block-form").addEventListener("submit",(e)=>{
    e.preventDefault();
    form = document.forms.item(0);
    let objdata ={};
    jsparse(objdata,form.elements);

    axios.post('/getaway.php')
        .then(function (response) {
            // handle success

        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .finally(function () {

        });
});