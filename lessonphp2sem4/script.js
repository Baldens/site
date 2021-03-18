$(document).ready(function(){
    const out=document.getElementById("out");
    var per;
    $('.clickOn').on('click', function(){
        let urlGet = "http://api.openweathermap.org/data/2.5/weather?q=" + $('.city').val() + "&appid=11c0d3dc6093f7442898ee49d2430d20&units=metric";
        $.ajax({
        type:"GET",
                url: urlGet,
                dataType:"json",
                success: function(result){

                    per = "<h3>Небо</h3> "+JSON.stringify(result.weather[0].description);
                    per += "<h3>Скорость ветра(м/c)</h3> "+JSON.stringify(result.wind.speed);
                    per += "<h3>Температура воздуха</h3> "+JSON.stringify(result.main.temp);
                    per += "<h3>Атмосферное давление</h3> "+JSON.stringify(result.visibility);
        
                    out.innerHTML=per.replace(/\\r\\n/g,"");
                                
                            }
                    }); 
    });
})