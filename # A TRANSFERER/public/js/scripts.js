

function rotateTeam1(){
    // var rotate = $('.col-md-2').children('#rotate');
    $('#rotate-1').transition({
        perspective: '0px',
        rotateY: '0deg',
        opacity: '1'
    }, 2000);
    
    setTimeout(function(){
    $('#rotate-1').transition({
        perspective: '0px',
        rotateY: '180deg',
        
        opacity: '0'
    }, 2000);
    });
}

function rotateTeam2(){
    // var rotate = $('.col-md-2').children('#rotate');
    $('#rotate-2').transition({
        perspective: '0px',
        rotateY: '0deg',
        opacity: '1'
    }, 3100);
    
    setTimeout(function(){
    $('#rotate-2').transition({
        perspective: '0px',
        rotateY: '180deg',
        
        opacity: '0'
    }, 3100);
    });
}

function rotateTeam3(){
    // var rotate = $('.col-md-2').children('#rotate');
    $('#rotate-3').transition({
        perspective: '0px',
        rotateY: '0deg',
        opacity: '1'
    }, 3000);
    
    setTimeout(function(){
    $('#rotate-3').transition({
        perspective: '0px',
        rotateY: '180deg',
        
        opacity: '0'
    }, 3000);
    });
}

function rotateTeam4(){
    // var rotate = $('.col-md-2').children('#rotate');
    $('#rotate-4').transition({
        perspective: '0px',
        rotateY: '0deg',
        opacity: '1'
    }, 2150);
    
    setTimeout(function(){
    $('#rotate-4').transition({
        perspective: '0px',
        rotateY: '180deg',
        
        opacity: '0'
    }, 2150);
    });
}

function rotateTeam5(){
    // var rotate = $('.col-md-2').children('#rotate');
    $('#rotate-5').transition({
        perspective: '0px',
        rotateY: '0deg',
        opacity: '1'
    }, 2070);
    
    setTimeout(function(){
    $('#rotate-5').transition({
        perspective: '0px',
        rotateY: '180deg',
        
        opacity: '0'
    }, 2070);
    });
}

function rotateTeam6(){
    // var rotate = $('.col-md-2').children('#rotate');
    $('#rotate-6').transition({
        perspective: '0px',
        rotateY: '0deg',
        opacity: '1'
    }, 2300);
    
    setTimeout(function(){
    $('#rotate-6').transition({
        perspective: '0px',
        rotateY: '180deg',
        
        opacity: '0'
    }, 2300);
    });
}

function rotateTeam7(){
    // var rotate = $('.col-md-2').children('#rotate');
    $('#rotate-7').transition({
        perspective: '0px',
        rotateY: '0deg',
        opacity: '1'
    }, 1800);
    
    setTimeout(function(){
    $('#rotate-7').transition({
        perspective: '0px',
        rotateY: '180deg',
        
        opacity: '0'
    }, 1800);
    });
}

function rotateTeam8(){
    // var rotate = $('.col-md-2').children('#rotate');
    $('#rotate-8').transition({
        perspective: '0px',
        rotateY: '0deg',
        opacity: '1'
    }, 1900);
    
    setTimeout(function(){
    $('#rotate-8').transition({
        perspective: '0px',
        rotateY: '180deg',
        
        opacity: '0'
    }, 1900);
    });
}

function rotateTeam9(){
    // var rotate = $('.col-md-2').children('#rotate');
    $('#rotate-9').transition({
        perspective: '0px',
        rotateY: '0deg',
        opacity: '1'
    }, 2300);
    
    setTimeout(function(){
    $('#rotate-9').transition({
        perspective: '0px',
        rotateY: '180deg',
        
        opacity: '0'
    }, 2300);
    });
}

function rotateTeam10(){
    // var rotate = $('.col-md-2').children('#rotate');
    $('#rotate-10').transition({
        perspective: '0px',
        rotateY: '0deg',
        opacity: '1'
    }, 2200);
    
    setTimeout(function(){
    $('#rotate-10').transition({
        perspective: '0px',
        rotateY: '180deg',
        
        opacity: '0'
    }, 2200);
    });
}
$(document).ready(function(){ 
    setInterval('rotateTeam1();', 0); 
    setInterval('rotateTeam2();', 0); 
    setInterval('rotateTeam3();', 0);
    setInterval('rotateTeam4();', 0);
    setInterval('rotateTeam5();', 0);
    setInterval('rotateTeam6();', 0);
    setInterval('rotateTeam7();', 0);
    setInterval('rotateTeam8();', 0);
    setInterval('rotateTeam9();', 0);
    setInterval('rotateTeam10();', 0);
}); 
