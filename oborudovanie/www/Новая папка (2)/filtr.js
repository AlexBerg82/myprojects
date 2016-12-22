function ChkState1() {
    var s1 = document.getElementById("1");
    //var s2 = document.getElementById("2");
    var s3 = document.getElementById("3");
    var s4 = document.getElementById("4");
    var s5 = document.getElementById("5");
    var s6 = document.getElementById("6");

    if (s1.checked) {
        //s2.disabled = true;
        s3.disabled = true;
        s4.disabled = true;
        s5.disabled = true;
        s6.disabled = true;
    } else {
       // s2.disabled = false;
        s3.disabled = false;
        s4.disabled = false;
        s5.disabled = false;
        s6.disabled = false;
	}
}

function ChkState2() {
    //var s1 = document.getElementById("1");
    var s2 = document.getElementById("2");
    var s3 = document.getElementById("3");
    var s4 = document.getElementById("4");
    var s5 = document.getElementById("5");
    var s6 = document.getElementById("6");

    if (s2.checked) {
        //s1.disabled = true;
        s3.disabled = true;
        s4.disabled = true;
        s5.disabled = true;
        s6.disabled = true;
    } else {
        //s1.disabled = false;
        s3.disabled = false;
        s4.disabled = false;
        s5.disabled = false;
        s6.disabled = false;
	}
}

function ChkState3() {
    var s1 = document.getElementById("1");
    var s2 = document.getElementById("2");
    var s3 = document.getElementById("3");
    var s4 = document.getElementById("4");
    var s5 = document.getElementById("5");
   // var s6 = document.getElementById("6");

    if (s5.checked) {
        s1.disabled = true;
        s2.disabled = true;
        s3.disabled = true;
        s4.disabled = true;
       // s6.disabled = true;
    } else {
        s1.disabled = false;
        s2.disabled = false;
        s3.disabled = false;
        s4.disabled = false;
       // s6.disabled = false;
	}
}

function ChkState4() {
    var s1 = document.getElementById("1");
    var s2 = document.getElementById("2");
    var s3 = document.getElementById("3");
    var s4 = document.getElementById("4");
    //var s5 = document.getElementById("5");
    var s6 = document.getElementById("6");

    if (s6.checked) {
        s1.disabled = true;
        s2.disabled = true;
        s3.disabled = true;
        s4.disabled = true;
        //s5.disabled = true;
    } else {
        s1.disabled = false;
        s2.disabled = false;
        s3.disabled = false;
        s4.disabled = false;
        //s5.disabled = false;
	}
}



function print_(){
	window.print();
}