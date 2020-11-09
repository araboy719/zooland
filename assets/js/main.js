/*========================================================
Функционал Показать еще
============================================================*/
//выбираем по селектору
var btnShowMore = document.querySelector("#show-more");
//указываем в переменной адрес  сайта  
var siteURL = "http://zooland.local/";
//делаем клик по кнопке
if(btnShowMore){
	btnShowMore.onclick = function () {
		var currentPageInput = document.querySelector("#current-page");
		
		//создаем обьект 
		var ajax = new XMLHttpRequest();	
		//открываем запрос и передаем данные (метод передачи данных, путь к файлу запроса, )
		ajax.open( "GET", siteURL + "modules/animals/get_more_animals.php?page=" + currentPageInput.value, false );
		//отправить запрос
		ajax.send();		
		//счетчик страниц
		currentPageInput.value = + currentPageInput.value + 1;
		//если отсутствуют значения в ajax.response то скрываем кнопку
		if(ajax.response == ""){
	    btnShowMore.style.display = "none";	  
	    }
		// Получаем в переменную animalsBlock
		var animalsBlock = document.querySelector("#animals-block");
		animalsBlock.innerHTML = animalsBlock.innerHTML + ajax.response;		
	}
}
/*=================================================
 Функция для пагинации страниц
====================================================*/

//выбираем по селектору элемент 
var btnPag = document.querySelectorAll("#pagButton");

function paginPage(element) {
	// создаем переменную и присваиваем ей значение,
	var linkbtnPag = element.dataset.link;
	// создаем новый объект ajax-запроса
	
	var ajax = new XMLHttpRequest();
		// открываем ajax-запрос
		ajax.open("GET", linkbtnPag , false);
		// посылаем ajax-запрос
		ajax.send();		
		// Получаем в переменную productsBlock
		var animalsBlock = document.querySelector("#animals-block");
		animalsBlock.innerHTML = ajax.response;
		
}




