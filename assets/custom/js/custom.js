/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* 
 * Lazy Line Painter - Path Object 
 * Generated using 'SVG to Lazy Line Converter'
 * 
 * http://lazylinepainter.info 
 * Copyright 2013, Cam O'Connell  
 *  
 */ 
 
var pathObj = {
    "undefined": {
        "strokepath": [
            {
                "path": "M94.1,183.9c2-20.4,10.3-39.9,15.9-59.4c5.7-19.5,10.7-39.3,15-59.1c-1.6,0-3.2,0-4.8,0c10.4,44.5,23.7,88.2,39.8,130.9    c0.8,2.1,4.2,2.6,4.8,0c10.4-47.6,23.7-94.5,37-141.4c0.7-2.3-1.8-3.6-3.7-2.8c-17.8,7.5-35.5,15-53.3,22.5    c-3,1.2-0.4,5.6,2.5,4.3c17.8-7.5,35.5-15,53.3-22.5c-1.2-0.9-2.4-1.9-3.7-2.8c-13.3,46.9-26.6,93.8-37,141.4c1.6,0,3.2,0,4.8,0    C148.8,152.2,135.5,108.5,125,64c-0.6-2.4-4.3-2.4-4.8,0c-4.5,20.5-9.6,40.9-15.5,61c-5.7,19.4-13.6,38.6-15.6,58.9    C88.8,187.1,93.8,187.1,94.1,183.9L94.1,183.9z",
                "duration": 300
            },
            {
                "path": "M100.3,134.3c18.3-7.9,37.5-13.2,57.2-16c3.2-0.5,1.8-5.3-1.3-4.8c-20.2,2.9-39.7,8.5-58.4,16.5    C94.9,131.3,97.4,135.6,100.3,134.3L100.3,134.3z",
                "duration": 1000
            }
        ],
        "dimensions": {
            "width": 284,
            "height": 284
        }
    }
}; 






/**DOCUMENT READY**/
$(document).ready(function () {
    //eliminamos el scroll de la pagina
    $("body").css({"overflow-y": "hidden"});
    //guardamos en una variable el alto del que tiene tu browser que no es lo mismo que del DOM
    var alto = $(window).height();
    //agregamos en el body un div que sera que ocupe toda la pantalla y se muestra encima de todo
    $("body").append("<div id='pre-load-web'><div id='imagen-load'><img src='http://localhost/web/assets/custom/img/239.GIF' width='50' alt=''/></div></div>");
    //le damos el alto 
    $("#pre-load-web").css({height: alto + "px", position: 'fixed'});
    //esta sera la capa que esta dento de la capa que muestra un gif 
    $("#imagen-load").css({"margin-top": (alto / 2) - 30 + "px"});




    //ANIMACION MOSTRAR MENU
    $('.icon-menu-top-open').click(function () {
        $("#menu-container").fadeIn(1000);
    });
    $('.icon-menu-top-close').click(function () {
        $("#menu-container").fadeOut(1000);
    });
    //ACABA ANIMACION MOSTRAR MENU
});

/**ACABA DOCUMENT READY**/


/**WINDOW LOAD**/

$(window).load(function () {
    $('#imagen-load').fadeOut(0);
    $("#pre-load-web").fadeOut(1100, function () { //eliminamos la capa de precarga $(this).remove();
//permitimos scroll 
$("body").css({"overflow-y": "auto"},write());
});

/* 
 Setup and Paint your lazyline! 
 */ 
 function write () {
     $('#undefined').lazylinepainter( 
 {
    "svgData": pathObj,
    "strokeWidth": 6,
    "strokeColor": "#FFFFFF",
    'ease': "easeInOutExpo"
}).lazylinepainter('paint')
 }

 


});

/**ACABA WINDOW LOAD**/





