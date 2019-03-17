var $id;
function setIdforShowMenu(id) {

    document.getElementById(`${id}`).querySelector('.dropdown-content').classList.toggle("display-block");
    document.getElementById(`${id}`).classList.toggle("active-theme");

    window.$id =`#${id} .dropbtn`;

    jqinput = `.dropdown-content:not(#${id} .dropdown-content)`;
    var dropdowns = $(jqinput)

    for (i = 0; i < dropdowns.length; i++) {

        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('display-block')) {
            openDropdown.classList.remove('display-block');
        }
    }

    jqinput2 = `.navbar-1row-t1__item-main:not(#${id}.navbar-1row-t1__item-main)`

    // var dropdownsList = document.querySelectorAll(jqinput2);

    var dropdownsList = $(jqinput2);

    console.log(dropdownsList);

    var j;

    for (j = 0; j < dropdownsList.length; j++) {
        var openDropdown = dropdownsList[j];
        if (openDropdown.classList.contains('active-theme')) {
            openDropdown.classList.remove('active-theme');
        }
    }

}

// function for menu

function menuColOpen(){

    $('#nav-collapsed').removeClass('none');

    $('#mute').removeClass('none');


    $('body').addClass("fixed");

}

function menuColClose(){

    $('#mute').addClass("none");

    $('#nav-collapsed').addClass('none');

    $('body').removeClass("fixed");

}