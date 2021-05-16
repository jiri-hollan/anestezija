var visina;
var teza;
var BMI;

function bmiFunction()
{
    teza = document. getElementById('teza').value;
    visina = document. getElementById('visina').value;

    teza = validacija(teza);
    visina = validacija(visina);

    document.getElementById('teza').value = teza;
    document.getElementById('visina').value = visina;

     //window.alert ("1teža" + teza);
     //window.alert ("1višina" + visina);
    if (visina!=0 && teza!=0) {
        //window.alert ("2teža" + teza);
        //window.alert ("2višina" + visina);
        BMI = Math.round(teza/(visina*visina));
        //window.alert ("BMI= " + BMI);
        document.getElementById('bmi').value=BMI;
    } else {
        // window.alert ("BMI2= " + BMI);
        document.getElementById('bmi').value="";
    }
}

function validacija(input) {
    if (input < 0) {
        return 0;
    }

    if (input == "NaN") {
        return 0;
    }

    return input.replace(",", ".");
}