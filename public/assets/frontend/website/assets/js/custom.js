 $(document).ready(function() {
    var $ww = $(window).width() / 2;
    
    $('#showSubFrm').click(function() {
        $(".overlay").fadeIn(400);
        $('#subscriptionFrm').addClass('show');
    });
    $('.overlay .close-icon').click(function(){
        $(".overlay").fadeOut(400);
        $("#subscriptionFrm").animate({ right: '-30%', opacity:0}, 350);
    })
   
    $('.dataAccordion li h5').click(function(){
        $(this).next('.expandable').slideToggle();
        $(this).toggleClass('expanded');
    });

    
    $(".view").on("click", function(){
        $(this).toggleClass("open").next(".fold").toggleClass("open");
    });


    $("#selectgear").selectize();


    $('.dropdown').hide()

    $('.showhide').click(function(e) {
        $(this).toggleClass('open');
        e.stopPropagation();
        $(this).siblings('.showhide').next('.dropdown').slideUp()
        $(this).next('.dropdown').slideToggle(100);
    });
    

    $(window).click(function(e) {
        var container = $(".dropdown");
        if (container.is(':visible') && !$(e.target).closest('.dropdown').length) {
            container.hide();
        }
    });

    $('.fld-search input').focus(function () {
        $(this).parent().addClass('srchWide');
    }).blur(function () {
        $(this).parent().removeClass('srchWide');
    });


    $('.table-dropdown').click(function() {
        $(this).toggleClass('open');
        $('.table-dropdown-list').toggleClass('open');
    });

    $("li:first-child").addClass("first");
    $("li:last-child").addClass("last");

    $('[href="#"]').attr("href", "javascript:;");

    $('.menu-Bar').click(function() {
        $(this).toggleClass('open');
        $('.menuWrap').toggleClass('open');
        $('body').toggleClass('ovr-hiddn');
    });

    $("#inputUserSrch").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".message-user-list li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

     //tabing js 

    $('[data-targetit]').on('click', function(e) {
        $(this).addClass('current');
        $(this).siblings().removeClass('current');
        var target = $(this).data('targetit');
        $('.' + target).siblings('[class^="box-"]').hide();
        $('.' + target).fadeIn();
    });

 
    $("#srchClient").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".clientList>li").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

    $('#configreset').click(function(){
        $('#configform')[0].reset();
    });

    $('.merchantService').on("click", function () {
        $(this).parents('.schedulBtn').addClass('d-none');
        $('.merchantServiceBox').addClass('d-block');
        
    });

    profileImg.onchange = evt => {
        const [file] = profileImg.files
        if (file) {
            blah.src = URL.createObjectURL(file)
        }
    }


    
    

});

$(document).ready(function() {
    upload.onchange = evt => {
        const [file] = upload.files
        if (file) {
            $("#uploadeText0, #uploadeText1, #uploadeText2, #uploadeText3, #uploadeText4, #uploadeText5, #uploadeText6, #uploadeText7, #uploadeText8").html(`File Uploaded ${file.name}` );

        }
    };
});

$(document).ready(function() {
    upload0.onchange = evt => {
        const [file] = upload0.files
        if (file) {
            $("#uploadeText0").html(`File Uploaded ${file.name}` );

        }
    };
});




$(document).ready(function() {
    upload01.onchange = evt => {
        const [file] = upload01.files
        if (file) {
            $("#uploadeText1").html(`File Uploaded ${file.name}` );
    
        }
    };
});

$(document).ready(function() {
    upload02.onchange = evt => {
        const [file] = upload02.files
        if (file) {
            $("#uploadeText2").html(`File Uploaded ${file.name}` );
    
        }
    };
});

$(document).ready(function() {
    upload03.onchange = evt => {
        const [file] = upload03.files
        if (file) {
            $("#uploadeText3").html(`File Uploaded ${file.name}` );
    
        }
    };
});

$(document).ready(function() {
    upload04.onchange = evt => {
        const [file] = upload04.files
        if (file) {
            $("#uploadeText4").html(`File Uploaded ${file.name}` );
    
        }
    };
});

$(document).ready(function() {
    upload05.onchange = evt => {
        const [file] = upload05.files
        if (file) {
            $("#uploadeText5").html(`File Uploaded ${file.name}` );
    
        }
    };
});

$(document).ready(function() {
    upload06.onchange = evt => {
        const [file] = upload06.files
        if (file) {
            $("#uploadeText6").html(`File Uploaded ${file.name}` );
    
        }
    };
});

$(document).ready(function() {
    upload07.onchange = evt => {
        const [file] = upload07.files
        if (file) {
            $("#uploadeText7").html(`File Uploaded ${file.name}` );

        }
    };
});

$(document).ready(function() {
    upload08.onchange = evt => {
        const [file] = upload08.files
        if (file) {
            $("#uploadeText8").html(`File Uploaded ${file.name}` );

        }
    };
});

$(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll >= 100) {
        $(".fixed").addClass("sticky");
    } else {
        $(".fixed").removeClass("sticky");
    }
});

$(".help-popup .header").click(function(){
   if($(".help-popup").hasClass("slide-down")){
        $(".help-popup").removeClass("slide-down").addClass("slide-up");
   }else{
        $(".help-popup").removeClass("slide-up").addClass("slide-down");
   }
})



/* RESPONSIVE JS */
// if ($(window).width() < 824) {


// }

// $(".close-btn").click(function(){
//     $(".help-popup").hide();
// })

