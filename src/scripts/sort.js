const theads = document.querySelectorAll(".table_sort thead");
theads.forEach(thead => thead.addEventListener("click", evt => getSort(evt)));

function getSort({ target }) {
	const order = (target.dataset.order = -(target.dataset.order || -1));
	const thList = Array.from(target.parentNode.cells);
	const index = thList.indexOf(target);
	const collator = new Intl.Collator(["en", "ru"], { numeric: true });
	const comparator = (index, order) => (a, b) => {
		return order * collator.compare(a.children[index].textContent, b.children[index].textContent);
	};

	const tablesBodies = Array.from(target.closest("table").tBodies);
    // target.closest исходный вариант, но подходит только для цельной таблицы 
    // (без прокрутки, т.к. прокрутка разбивает таблицу на две)
   /*  const tablesBodies = Array.from(document.getElementById('body').tBodies); */

	tablesBodies.forEach(tBody => {
		tBody.append(...Array.from(tBody.rows).sort(comparator(index, order)));
	});

	thList.forEach( th => th.classList.toggle("sorted", th === target));
}
