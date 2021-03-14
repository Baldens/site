$(document).ready(function($){
    $(".ok").on("click",function(){
        var mass1 = new Array();
        var mass2 = new Array();
        var mass3 = new Array();
        for (let i = 0; i < $('.countses').text()[0]; i++) {
            mass1 += $(".valueA" + i).val();
            mass2.push($(".valueB" + i).val());      
        }
        var tablses = "";
        var boolse = true;
        var deviationProverka = 0;
        var massText = new Array();
        var massSchetchik = new Array();
        var integ = 0;
        var deviation = $('.countses').text()[2] * 20;
        while(boolse){
            var words = "";

            if(deviationProverka < deviation){

                for (let index = 0; index < $('.countses').text()[2]; index++) {

                    var rand = Math.floor(Math.random() * $('.countses').text()[0]);
                    words += mass1[rand]; 
                    console.log((massText.indexOf(words)<0) + " Проверка на наличие");
                    if((massText.indexOf(words)<0)&&(words.length==$('.countses').text()[2])){

                        massText.push(words);
                        console.log(massText + " <<-");

                        
                    }else if((massText.indexOf(words)>0)){
                        console.log(deviationProverka + " выход из условия ");

                        deviationProverka++;
                        break;
                    }
                    console.log(deviationProverka + " выход из 2 ");
                    console.log(words.length==$('.countses').text()[2] + " Проверка на количественность");
                    
                }

                

            }else{
                boolse=false;
                console.log(" умер ");

            }
            
            console.log(deviationProverka + " выход из 1 " + deviation);

        }

        for (let p = 0; p < massText.length; p++) {
            console.log(massText[p] + " - 1 цикл - " + p);

            var schetchik = 1;
            mass3 = [];

            for (let l = 0; l < massText[p].length; l++) {
                console.log(massText[p][l] + " - 2 цикл - " + l + "/// длина слова -" + massText[p].length);

                for (let pr = 0; pr < $('.countses').text()[0]; pr++) {
                    console.log(massText[p][l] + " - 2 цикл - " + l);

                    if(mass1.indexOf(massText[p][l])==mass1[pr]){
                        console.log(massText[p][l].length + " Число");
    
                        
                        mass3.push(parseFloat(mass2[pr]));
    
                    }
                    
                    
                }
                console.log(mass3 + " mass3");
                console.log("//======================================");

            }
            for (let massZnach = 0; massZnach < mass3.length; massZnach++) {
                integ = parseFloat(mass3[massZnach]);
                schetchik *= integ;
    
                if(massZnach==$('.countses').text()[2]-1){
                console.log("Счётчик: " + schetchik + " " + massZnach);

                    massSchetchik.push(schetchik);
                }
                
            }
            console.log("//======================================");

        }


        console.log(massSchetchik);
        var sum = 0.0;
        for (let o = 0; o < mass2.length; o++) {
            sum += parseFloat(mass2[o]);
            console.log(sum);
        }
        if(sum<=1){
            for (let k = 0; k < massText.length; k++) {

                tablses += "<input type = \"text\" name = \"valueA$i\" class = \"valueA" + k + "\" value=\"" + massText[k] + "\"> <input type = \"text\" name = \"valueA$i\" class = \"valueB" + k + "\" value=\"" + massSchetchik[k].toFixed(4) + "\"><br>";
            
            }
        }else{
            alert("У вас числа в сумме больше 1");
        }
        $('.vivod').html(tablses); 
    });
});