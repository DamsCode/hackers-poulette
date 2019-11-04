document.addEventListener('DOMContentLoaded', function() {
    let elems = document.querySelectorAll('select');
    let instances = M.FormSelect.init(elems);
});
document.getElementById("form").addEventListener("submit",()=>{
    if (document.getElementById("website").valueOf != null){
        return false;
    }
});