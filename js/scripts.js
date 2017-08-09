        console.log("test")
        var menuItem = document.querySelectorAll('.menu-item')
        var tab = document.querySelectorAll('.tab')
        var forEach = Array.prototype.forEach;
        setActive(0)

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
        }
        