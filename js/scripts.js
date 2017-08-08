        console.log("test")
        var menuItem = document.querySelectorAll('.menu-item')
        var tab = document.querySelectorAll('.tab')
        var selectors = document.querySelectorAll('.ACselectorLI')
        var acTab = document.querySelectorAll('.ACTab')
        var forEach = Array.prototype.forEach;
        setActive(0)
        console.log(menuItem)

        forEach.call(menuItem, addListener)
        forEach.call(selectors, ACaddListener)

        function addListener (el, i) {
            el.addEventListener('click', function () {
                setActive(i)
            })
        }

        function removeActive (el) {
            console.log(el)
            el.classList.remove('active')
        }

        function setActive(i) {
        	console.log(i)
            forEach.call(menuItem, removeActive)
            forEach.call(tab, removeActive)
            menuItem[i].classList.add('active')
            tab[i].classList.add('active')
            if(i==2){
            	ACsetActive(0)
            }
        }

        function ACaddListener (el, i) {
            el.addEventListener('click', function () {
                ACsetActive(i)
            })
        }

        function ACremoveActive (el) {
            console.log(el)
            el.classList.remove('active')
        }

        function ACsetActive(i) {
        	console.log(i)
            forEach.call(selectors, ACremoveActive)
            forEach.call(acTab, ACremoveActive)
            selectors[i].classList.add('active')
            acTab[i].classList.add('active')
        }

        function searchBuku() {
        	console.log("test");
        	var input, filter, table, tr, td, i;
        	input = document.getElementById("DBsearch");
        	filter = input.value.toUpperCase();
        	table = document.getElementById("DBTable");
        	tr = table.getElementsByTagName("tr");

        	for (i = 0; i < tr.length; i++) {
        		td = tr[i].getElementsByTagName("td")[1];
        		if(td){
        			if(td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        				tr[i].style.display = "";
        			} else {
        				tr[i].style.display = "none";
        			}
        		}
        	}
        }

        function selectCategory(cat) {
        	console.log(cat)
        	var table, tr, td, i;
        	table = document.getElementById("DBTable");
        	tr = table.getElementsByTagName("tr");

        	if( cat != 'Semua'){
	        	for (i = 0; i < tr.length; i++) {
	        		td = tr[i].getElementsByTagName("td")[8];
	        		if(td){
	        			if(td.innerHTML.indexOf(cat) > -1) {
	        				tr[i].style.display = "";
	        			} else {
	        				tr[i].style.display = "none";
	        			}
	        		}
	        	}
	        } else {
	        	for (i = 0; i < tr.length; i++) {
	        		tr[i].style.display = "";
	        	}
	        }
        }