$(document).ready(function($){
    $(".ok").on("click",function(){
        var mass1 = new Array();
        var mass2 = new Array();
        var mass3 = new Array();
        for (let i = 0; i < $('.countses').text()[0]; i++) {
            mass1.push($(".valueA" + i).val());
            mass2.push($(".valueB" + i).val());      
        }
        var tablses = "";
        var boolse = true;
        var deviationProverka = 0;
        var massText = new Array();
        var massSchetchik = new Array();
        var integ = 0;
        var deviation = $('.countses').text()[2] * 200;
        let massPer = PermutationsWithRepetition(mass1,$('.countses').text()[2]);
        let outArr1 = []; // пары
        let outArr2 = []; // коэффиценты
        massPer.each(function(v){ outArr1.push(v); });
        console.log(outArr1);
        outArr1.forEach(arr =>{
            let r = [];
            arr.forEach((elem,index) =>{
                let i = mass1.indexOf(elem);
                r.push(mass2[i]);
            })
            outArr2.push(r);
        })
        console.log(outArr1);
        function PermutationsWithRepetition(src, len){

            var K = len - 1, k = 0,
                N = src.length, n = 0,
                out = [],
                stack = [];
        
            function next(){
                while (true) {
                    while (n < src.length) {
                        out[k] = src[n++];
                        if (k == K) return out.slice(0);
                        else {
                            if (n < src.length) {
                                stack.push(k);
                                stack.push(n);
                            }
                            k++;
                            n = 0;
                        }
                    }
                    if (stack.length == 0) break;
        
                    n = stack.pop();
                    k = stack.pop();
                }
                return false;
            }
        
            function rewind(){ k = 0; n = 0; out = []; stack = []; }
        
            function each(cb) {
                rewind();
                var v;
                while (v = next()) if (cb(v) === false) return;
            }
        
            return {
                stack:stack,
                out: out,
                next: next,
                each: each,
                rewind: rewind
            };
        }

        for (let p = 0; p < outArr1.length; p++) {

            var schetchik = 1;
            mass3 = [];

            for (let l = 0; l < outArr1[p].length; l++) {

                for (let pr = 0; pr < $('.countses').text()[0]; pr++) {

                    if(mass1.indexOf(outArr1[p][l])==mass1[pr]){
    
                        
                        mass3.push(parseFloat(mass2[pr]));
    
                    }
                    
                    
                }
                console.log(mass3 + " mass3");

            }
            for (let massZnach = 0; massZnach < mass3.length; massZnach++) {
                integ = parseFloat(mass3[massZnach]);
                schetchik *= integ;
    
                if(massZnach==$('.countses').text()[2]-1){

                    massSchetchik.push(schetchik);
                }
                
            }
        }
        var sum = 0.0;
        for (let o = 0; o < mass2.length; o++) {
            sum += parseFloat(mass2[o]);
        }
        if(sum<=1){
            for (let k = 0; k < outArr1.length; k++) {

                tablses += "<input type = \"text\" name = \"valueA$i\" class = \"valueA" + k + "\" value=\"" + outArr1[k] + "\"> <input type = \"text\" name = \"valueA$i\" class = \"valueB" + k + "\" value=\"" + massSchetchik[k] + "\"><br>";
            
            }
        }else{
            alert("У вас числа в сумме больше 1");
        }
        function entoropy(data){
            let res = 0;
            let l = 0;
            console.log(data);
            for (let i = 0; i < data.length; i++) {
                if(Math.log2(data[i])==-Infinity){
                    l=1;
                }else{
                    l=Math.log2(data[i]);
                }
                let sum = -(data[i] * l);
                res+=sum;
            } 
            return res;
        }
        var lets = entoropy(massSchetchik);
        var chars = "<h3>Энтропия: " + lets + "</h3>"
        $('.vivod').html(tablses); 
        $('.vivods').html(chars); 
    });
});