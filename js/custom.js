// --------------------------------------------------------
// Pretty Photo for Lightbox Image
// -------------------------------------------------------- 
$(document).ready(function() {	
    $("a[data-gal^='prettyPhoto']").prettyPhoto(); 
});

// --------------------------------------------------------
//	Scroll Up
// -------------------------------------------------------- 	
$(window).scroll(function() {
	if ($(this).scrollTop() > 100) {
		$('.scroll-up').fadeIn();
	} else {
		$('.scroll-up').fadeOut();
	}
});

$('.scroll-up').click(function() {
	$("html, body").animate({
		scrollTop: 0
	}, 600);
	return false;
});

// --------------------------------------------------------
//	Navigation Bar
// -------------------------------------------------------- 	
$(window).scroll(function(){	
	"use strict";	
	var scroll = $(window).scrollTop();
	if( scroll > 60 ){		
		$(".navbar").addClass("scroll-fixed-navbar");				
	} else {
		$(".navbar").removeClass("scroll-fixed-navbar");
	}
});

// --------------------------------------------------------
//	Smooth Scrolling
// -------------------------------------------------------- 	
$(".navbar-nav li a[href^='#']").on('click', function(e) {
    e.preventDefault();
    $('html, body').animate({
        scrollTop: $(this.hash).offset().top
    }, 1000);
});

// --------------------------------------------------------
//	Accordion (FAQ)
// -------------------------------------------------------- 
function toggleIcon(e) {
	$(e.target)
		.prev('.panel-heading')
		.find('.panel-title a')
		.toggleClass('active')
		.find("i.fa")
		.toggleClass('fa-plus-square fa-minus-square');
}
$('.panel').on('hidden.bs.collapse', toggleIcon);
$('.panel').on('shown.bs.collapse', toggleIcon);




function sendMsg(name, email, phone, msg, form) {

    console.log(name);
    console.log(email);
    console.log(phone);
    console.log(msg);

    $.ajax(
    {

        type: "POST",
        url: "https://mandrillapp.com/api/1.0/messages/send.json",
        data: {
            'key': 'yf0HWszs9JLKcCOaB24Jmw',
            'message': {
                'from_email': 'contact@instantview.co',
                'from_name': 'ExpoFlyer Website',
                'headers': {
                    'Reply-To': email
                },
                'subject': 'Website Contact Form Submission',
                'text': 'name: ' + name + ' email: ' + email + ' phone: ' + phone + ' msg: ' + msg,
                'to': [
                {
                    'email': 'e.w.mellor@gmail.com',
                    'name': 'Edward Mellor',
                    'type': 'to'
                }]
            }
        }
    })
    .done(function (response) {

        alert('Your message has been sent and will will contact you shortly. Thank you!'); // show success message

        $(form).fadeOut(500, function () {
            form.html(msg).fadeIn();
        });

        name = "";
        email = "";
        phone = "";
        msg = "";

    })
    .fail(function (response) {
        alert('Error sending message.');
    });
    return false; // prevent page refresh
}


// --------------------------------------------------------
//	Banner Form
// -------------------------------------------------------- 
$('#banner-form').on('submit', function (e) {
    e.preventDefault(); //Prevents default submit
    var form = $(this);
    var post_url = form.attr('action');
    var post_data = form.serialize(); //Serialized the form data for process.php
    $('.form-process').html('<p><i class="fa fa-spinner fa-spin fa-2x"></i> Please Wait...</p>');

  //  console.log("2");
  //  $('#contactUsBanner').click(function () {

        sendMsg($("#banner-name").val(), $("#banner-email").val(), $("#banner-phone").val(), 'Get More Info', form);
  //  });

});

// --------------------------------------------------------
//	Middle Form
// -------------------------------------------------------- 
$('#middle-form').on('submit', function(e) {
    e.preventDefault(); //Prevents default submit
    var form = $(this);
    var post_url = form.attr('action');
    var post_data = form.serialize(); //Serialized the form data for process.php
    $('.form-process-middle').html('<p><i class="fa fa-spinner fa-spin fa-2x"></i> Please Wait...</p>');
    console.log("dsagfhfjhk");
    sendMsg($("#middle-optin-name").val(), $("#middle-optin-email").val(), $("#middle-optin-phone").val(), 'Subscribe to Newsletter', form);
        
});

// --------------------------------------------------------
//	Contact Form
// -------------------------------------------------------- 
$('#contact-form').on('submit', function(e) {
    e.preventDefault(); //Prevents default submit
    var form = $(this);
    var post_url = form.attr('action');
    var post_data = form.serialize(); //Serialized the form data for process.php
    $('.form-process-contact').html('<p><i class="fa fa-spinner fa-spin fa-2x"></i> Please Wait...</p>');

    sendMsg($("#contact-name").val(), $("#contact-email").val(), $("#contact-phone").val(), $("#contact-message").val(), form);

    //$.ajax({
    //    type: 'POST',
    //    url: 'contact-form.php', // Your form script
    //    data: post_data,
    //    success: function(msg) {
    //        $(form).fadeOut(500, function() {
    //            form.html(msg).fadeIn();
    //        });
    //    }
    //});
});