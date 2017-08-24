        console.log("testt")
        var menuItem = document.querySelectorAll('.menu-item')
        var tab = document.querySelectorAll('.tab')
        var forEach = Array.prototype.forEach;
        localStorage.lastTab = 0;
        if(typeof(Storage) !== "undefined"){
            if(!localStorage.lastTab){
                localStorage.lastTab = 0;
            }
            console.log("last tab: " + localStorage.lastTab);
            setActive(localStorage.lastTab);
        }

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
            if(typeof(Storage) !== "undefined"){
                localStorage.lastTab = i;
                console.log("last tab: " + localStorage.lastTab);
            }
        }
        