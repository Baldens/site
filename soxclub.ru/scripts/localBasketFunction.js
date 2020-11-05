window.onload = function(){
	//var addButtons = document.getElementsByClassName('btn-danger1');
    if(localStorage.getItem("flag")){
        document.getElementById("addGoodsBTN").innerHTML=localStorage.getItem("clik");
	}
}

$('btn-kick').on('click',function(){ 
    //alert("hjvjgjg");
    $('.btn').innerHTML=localStorage.removeItem("clik");
});

window.localStorage.clear()

//$('.btn-danger').on('click',function())