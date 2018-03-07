// JavaScript Document

function register(){
	var login = encodeURI(document.getElementById('login').value);
	var password = encodeURI(document.getElementById('password').value);
	var rememberme = encodeURI(document.getElementById('rememberme').checked);
	var rememberme2 = encodeURI(document.getElementById('rememberme').checked);
          $.ajax({ type: 'POST', url: '/index.php', data: { metod: 'ajax', PageAjax: 'register', var3: rememberme2, login: login, password: password, rememberme: rememberme}, success: function(response){
                    $('#autorize').html(response);
                 },
				 dataType:"json"
          });
};


function add_basket(var3) { 
 var var4 = $(var3).attr("data-product-guid");
          $.ajax({ type: 'POST', url: '/index.php', data: { metod: 'ajax', PageAjax: 'basket', var4: var4}, success: function(response){
                    $('#basket_count_good').html(response.basket_count_good), $('#basket_count').html(response.basket_count), $('#basket_price').html(response.basket_price);
                 },
				 dataType:"json"
          });
   }

function clear_basket() { 
          $.ajax({ type: 'POST', url: '/index.php', data: { metod: 'ajax', PageAjax: 'clear_basket'}, success: function(response){
                    $('#basket_count_good').html(response.basket_count_good), $('#basket_count').html(response.basket_count), $('#basket_price').html(response.basket_price);
                 },
				 dataType:"json"
          });
   }

