$(document).ready(function($){
    function entoropy(data){
        // фиксануть приходит массив массивов а так быть не должно 
        let res = 0;
        console.log(data);
        for (let i = 0; i < data.length; i++) {
            let sum = -(data[i] * Math.log2(data[i]));
            res+=sum;
        } 
        res = res.toFixed(3);
        return res;
    }
    var table = `
        <input type = \"text\" name = \"valueA$i\" class = \"valueA$i\">
        <input type = \"text\" name = \"valueB$i\" class = \"valueB$i\">
    `;
    $(".ok").on("click",function(){
        var mass1 = new Array();
        var mass2 = new Array();

        for (let i = 0; i < $('.countses').text(); i++) {
            mass1 += $(".valueA" + i).val();
            mass2.push($(".valueB" + i).val());      
        }
        var tablses = "";
        var boolse = true;
        var boolseProverka = true;
        var massText = new Array();
        var massSchetchik = new Array();

        while(boolse){
            var words = "";
            if(massText.length<=3){

                for (let index = 0; index < 2; index++) {

                    var rand = Math.round(Math.random());
                    words += mass1[rand]; 
    
                    if((massText.indexOf(words)<0)&&(words.length==2)){
                        massText.push(words);
                        var schetchik = 1;
                        for (let p = 0; p < 2; p++) {

                            var integ = 0;
                            if(mass1.indexOf(words[p])==0){
                                integ = parseFloat(mass2[0]);

                            }else if(mass1.indexOf(words[p])==1){
                                integ = parseFloat(mass2[1]);

                            }
                            schetchik *= integ;
                            if(p==1){
                                massSchetchik.push(schetchik);
                            }
                        }

                    }else if(massText.length==4){
                        break;
                    }
                    
                }
            }else{
                boolse=false;
            }
        }
        var sum = 0.0;
        for (let o = 0; o < 4; o++) {
            sum += massSchetchik[o];
        }
        massSchetchikses = entoropy(massSchetchik);
        var chars = "<h3>Энтропия: " + massSchetchikses + "</h3>"

        if(sum<=1){
            for (let k = 0; k < 4; k++) {
            
                tablses += "<input type = \"text\" name = \"valueA$i\" class = \"valueA" + k + "\" value=\"" + massText[k] + "\"> <input type = \"text\" name = \"valueA$i\" class = \"valueB" + k + "\" value=\"" + massSchetchik[k] + "\"><br>";
            
            }
        }else{
            alert("У вас числа в сумме больше 1");
        }
        $('.vivod').html(tablses); 
        $('.vivods').html(chars); 

    });
});