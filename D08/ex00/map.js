

function clickableGrid( rows, cols, array, callback ){
	var i=0;
	var grid = document.createElement('table');
	grid.className = 'grid';
	for (var r=0;r<rows;++r){
		var tr = grid.appendChild(document.createElement('tr'));
		for (var c=0;c<cols;++c){
			var cell = tr.appendChild(document.createElement('td'));
			cell.style.width = 15;
			cell.style.height = 15;
           // cell.style.width = '200px';
           if (array[r][c])
              cell.innerHTML = array[r][c];
          cell.addEventListener('click',(function(el,r,c,i){
          	return function(){
          		callback(el,r,c,i);
          	}
          })(cell,r,c,i),false);
      }
  }
  return grid;
}