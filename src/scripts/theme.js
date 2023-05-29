const prefersDarkScheme = window.matchMedia("(prefers-color-scheme: dark)");

function toggleTheme() {
    if (prefersDarkScheme.matches) {
        document.body.classList.toggle("light-theme");
        //var theme = document.body.classList.contains("light-theme") ? "light" : "dark";
        if(document.body.classList.contains("light-theme")) {
            var theme = "light";
            document.getElementById("themeToggler").src = "src/images/moon.svg";
        } else {
            var theme = "dark";
            document.getElementById("themeToggler").src = "src/images/sun.svg";
        }
    } else {
        document.body.classList.toggle("dark-theme");
        //var theme = document.body.classList.contains("dark-theme") ? "dark" : "light";
        if(document.body.classList.contains("dark-theme")) {
            var theme = "dark";
            document.getElementById("themeToggler").src = "src/images/sun.svg";
        } else {
            var theme = "light";
            document.getElementById("themeToggler").src = "src/images/moon.svg";
        }
    }
    document.cookie = "theme=" + theme;
}
