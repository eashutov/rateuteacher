var codeButton = document.getElementById('btn');
var input = document.getElementById('code');
const re = new RegExp('^[А-Яа-яЁё]{2,5}-[0-9]{3}-[0-9]{1,3}-[0-9]{3}$');

codeButton.disabled = true;

input.addEventListener("input", function(){
    console.log(input.value);
    if(re.test(input.value)) {
        codeButton.disabled = false;
    } else {
        codeButton.disabled = true;
    }
});
