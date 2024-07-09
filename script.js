const selectDropdown = document.getElementById("srole");
selectDropdown.addEventListener('change', function (e) {   
    var optionValue = document.getElementById("srole").value;
    if(optionValue.localeCompare("student") == 0){
        document.getElementById('acode').style.display='none';
    }
    else{
        document.getElementById('acode').style.display='block';
    }
});