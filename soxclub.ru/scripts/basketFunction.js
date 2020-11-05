var imgMass = ["../image/носки1.jpg","../image/носки2.jpg","../image/носки3.jpg","../image/носки4.jpg","../image/носки5.jpg","../image/носки6.jpg"];
var num = 0;
$('.btn-items').on('click',function(event) {
    //var btn = $(this).attr("clicked", "true");
    var count = $(this).index('.btn-items');
    for (let i = 0; i < num; i++) {
        if(i<num){
            num++;
            var cartRowContents =
      ` <div class="item border_contain">
        <span>${num}</span>
        <img class="cart-item-image" src="${imgMass[count]}" width="100" height="100">
        <span class="cart-price cart-column">100рублей</span>        
        <input type="button"
        <input class="clickMinus" type="button" value="-">
        <input type="text" id="name" value="1" disabled>
        <input class="clickPlus" type="button" value="+">  
        <input class="btn-kick" type="button" value="Удалить">  
        </div>`;
            
        }
    }
    
      // <button class="btn btn-danger" type="button">Удалить</button>            
      

      localStorage.setItem("flag",true);
	  localStorage.setItem("clik",cartRowContents);
	  localStorage.setItem("clik",cartRowContents);
});





















function plus() {
	if(document.getElementById('name').value<10)
		{
			document.getElementById('name').value=parseInt(document.getElementById('name').value)+1;
            document.getElementById('name').keyup();
		}
	else{
		document.getElementById('name').value=10;
	}
}

function minus() {
if(document.getElementById('name').value>1)
		{
			document.getElementById('name').value=parseInt(document.getElementById('name').value)-1;
            document.getElementById('name').keyup();
		}
}
