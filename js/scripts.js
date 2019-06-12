var i=0
$(document).ready(function(){
    $('#eye').click(function(){
        if(i==0){
            $('#pass').attr('type', 'text');
            $('#eye').css('opacity', '0.4');
            $('#mostrar').css('opacity', '0.4');
            i++;
        }else{
            $('#pass').attr('type', 'password');
            $('#eye').css('opacity', '0.5');
            $('#mostrar').css('opacity', '0.5');
            i=0;
        }
    });
});

$(document).ready(function(){
    $('#mostrar').click(function(){
        if(i==0){
            $('#pass').attr('type', 'text');
            $('#mostrar').css('opacity', '0.4');
            $('#eye').css('opacity', '0.4');
            i++;
        }else{
            $('#pass').attr('type', 'password');
            $('#eye').css('opacity', '0.5');
            $('#mostrar').css('opacity', '0.5');
            i=0;
        }
    });
});

$(document).ready(function(){
    $('#eye1').click(function(){
        if(i==0){
            $('#pass1').attr('type', 'text');
            $('#repass').attr('type', 'text');
            $('#eye1').css('opacity', '0.4');
            $('#mostrar1').css('opacity', '0.4');
            i++;
        }else{
            $('#pass1').attr('type', 'password');
            $('#repass').attr('type', 'password');
            $('#eye1').css('opacity', '0.5');
            $('#mostrar1').css('opacity', '0.5');
            i=0;
        }
    });
});

$(document).ready(function(){
    $('#mostrar1').click(function(){
        if(i==0){
            $('#pass1').attr('type', 'text');
            $('#repass').attr('type', 'text');
            $('#mostrar1').css('opacity', '0.4');
            $('#eye1').css('opacity', '0.4');
            i++;
        }else{
            $('#pass1').attr('type', 'password');
            $('#repass').attr('type', 'password');
            $('#eye1').css('opacity', '0.5');
            $('#mostrar1').css('opacity', '0.5');
            i=0;
        }
    });
});

function noVolver() {
    window.location.hash="no-back-button";
    window.location.hash="Again-No-back-button" //chrome
    window.onhashchange=function(){window.location.hash="";}
}

$(document).ready(function () {
    (function () {
        var login = {
            init: function () {
                this.cacheDom();
                this.addEvents();
            },
            cacheDom: function () {
                this.$loginBtn    = $('#login');
                this.$loginPopup  = $('.login-popup');
                this.$closePopup  = $('.close-icon');
            },
            addEvents: function () {
                this.$loginBtn.on('click', this.showLogin.bind(this));
                this.$closePopup.on('click', this.hideLogin.bind(this));
            },
            showLogin: function (e) {
                e.preventDefault();
                this.$loginPopup.fadeIn('fast');
            },
            hideLogin: function () {
                this.$loginPopup.fadeOut('fast');
            }
        }
        login.init();


    })();

    $(document).on('keyup',function(evt) {
        if (evt.keyCode == 27) {
            $('.login-popup').fadeOut('fast');
        }
    });

});

function sinLogueo() {
    $('.login-popup').fadeIn('fast');
};

function arriba() {
    window.scroll(0,0);
}


$(document).ready(main);

var contador = 1;

function main(){
    $('.menu_bar').click(function(){
        // $('nav').toggle();

        if(contador == 1){
            $('nav').animate({
                left: '0%'
            });
            contador = 0;
        } else {
            contador = 1;
            $('nav').animate({
                left: '-110%'
            });
        }

    });

};

var check = function() {
    if (document.getElementById('pass1').value ==
        document.getElementById('repass').value) {
        document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Coinciden';
    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'No Coinciden';
    }
}

var check1 = function() {
    if (document.getElementById('usuario').value.indexOf(' ')==-1) {
        document.getElementById('message1').style.color = 'green';
        document.getElementById('message1').innerHTML = '<br>';
    } else {
        document.getElementById('message1').style.color = 'red';
        document.getElementById('message1').innerHTML = 'Sin Espacios';
    }
}
var i=0;
$(document).ready(function(){
    $('#site12').click(function(){
        if(i == 0) {
            $('#curso').css('display', 'block');
            $('#copa').css('display', 'none');
            i++;
        }else {
            $('#curso').css('display', 'block');
            $('#copa').css('display', 'none');
        }
    });
});
$(document).ready(function(){
    $('#redirect22').click(function(){
        if(i == 1) {
            $('#curso').css('display', 'none');
            $('#copa').css('display', 'block');
            i--;
        }else {
            $('#curso').css('display', 'none');
            $('#copa').css('display', 'block');
        }
    });
});


