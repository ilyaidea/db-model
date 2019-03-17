window.onclick = function(event) {
    if (!event.target.matches($id)) {
        var dropdowns = document.getElementsByClassName("dropdown-content");

        var dropdownsList = document.querySelectorAll('li');

        var j;
        for (j = 0; j < dropdownsList.length; j++) {
            var openDropdown = dropdownsList[j];
            if (openDropdown.classList.contains('active-theme')) {
                openDropdown.classList.remove('active-theme');
            }
        }

        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('display-block')) {
                openDropdown.classList.remove('display-block');
            }
        }
    }
}