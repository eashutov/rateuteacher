function isTaken(query) {
    var formData = new FormData();
        formData.append('query', query);
        
        var request = new XMLHttpRequest();
        request.open('POST', 'src/scripts/php/check_login.php');
        request.send(formData);
        
        request.onreadystatechange = () => {
            var response = request.responseText;
            const warn = document.getElementById('login-warn');
            const btn = document.getElementById('create-moder');
            if(response > 0) {
                warn.style.display = "block";
                btn.disabled = true;
            } else if(response == 0) {
                warn.style.display = "none";
                btn.disabled = false;
            }
        }
}