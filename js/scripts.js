        console.log("testt")
        var menuItem = document.querySelectorAll('.menu-item')
        var tab = document.querySelectorAll('.tab')
        var forEach = Array.prototype.forEach;
        var sel = document.getElementById("selectedTab");
        
        setActive(sel.value);
        

        forEach.call(menuItem, addListener)

        function addListener (el, i) {
            el.addEventListener('click', function () {
                setActive(i)
            })
        }

        function removeActive (el) {
            el.classList.remove('active')
        }

        function setActive(i) {
            forEach.call(menuItem, removeActive)
            forEach.call(tab, removeActive)
            menuItem[i].classList.add('active')
            tab[i].classList.add('active')
            $.ajax({    //create an ajax request to load_page.php
                type: "GET",
                url: "ajax/updateTab.php",             
                dataType: "html",   //expect html to be returned
                data: { 'tab':i },               
                success: function(response){
                }
            });
        }
        