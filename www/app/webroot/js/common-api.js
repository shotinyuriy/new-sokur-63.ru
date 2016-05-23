function counter() {
	$.ajax( {
		url: window.home_href+"core/c-counter.php",
		success: function( data ) {
			console.log( data );
		}
	} );
};

function addToCartListener() {
	$( ".tocart > *[type='submit']" ).click( function( e ) {
		e.preventDefault();
		var portionId = $( this ).parent().find( "input[name='portionId']" )[ 0 ];
		portionId = portionId.value;
		
		var select = document.createElement( 'div' );
		for( var i = 1 ; i <= 14 ; i++ ) {
			var tmpDiv = document.createElement( 'div' );
			tmpDiv.innerHTML = ''+i;
			select.appendChild( tmpDiv );
			tmpDiv.className = 'amt slideDown';
		}
		select.className = 'amtsel';
		
		var form = $( this ).parent()[ 0 ];
		form.appendChild( select );
		
		$( ".amtsel" ).mouseleave( function( e ) {
			var amtsel = $( ".amtsel" );
			var select = amtsel[ 0 ];
			var form = amtsel.parent()[ 0 ];
			$( ".slideDown").removeClass("slideDown").addClass("slideUp");
			setTimeout(function(){form.removeChild( select );}, 900);
		} );
		
		$( ".amt" ).click( function( e ) {
			var amount = $( this )[ 0 ].innerHTML;
			$( ".slideDown").removeClass("slideDown").addClass("slideUp");
			setTimeout(function(){form.removeChild( select );}, 900);
			
				$.ajax( {
					url: '../core/c-cart.php',
					data: {
						portionId: portionId,
						amount: amount,
						method: "add"
					},
					success: function( data ) {
						showCartTotalSum();
					}
			} );
		} );
	} );
};

function showCartTotalSum() {

	$.ajax({
		url: "/cart/total",
		data: {},
		success: function( data ) {
			$( "#cart_total" ).html( data );
		}
	})
		.fail( function( data ) {
			$( "#cart_total" ).html( "0 руб." );
		});
};

function loadNews() {
	
	$.ajax( {
		url: window.home_href+"core/c-news.php",
		success: function( data ) {
		
			if( data ) data = data.trim();
			$( "#news" ).html( data );
			
	 		//addNewsScrollListener();
		}
	} );
};

function addSearchListener() {
	
	$( "#search-button" ).click( function( e ) {
		e.preventDefault();
		
		var url = $( "#search-form" ).serialize();
		url = window.home_href+"search?"+url;
		
		window.location.href = url;
		
	} );
};


function ajaxForm(form, callback) {
	var formData = new FormData(form[0]);
	var url = form[0].action;
	console.log("URL = ", url);  

	var xhr = new XMLHttpRequest();
	xhr.open("POST", url);

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4) {
			if(xhr.status == 200) {
				data = xhr.responseText;
				
				if(data) {
					if(typeof callback === 'function') callback(data);
				} else {
					console.log(" ERROR! ");
				}
			}
		}
	};
	
	xhr.send(formData);	
}

function addAjaxLinkListener() {
	$("a.ajax").unbind('click');
	$("a.ajax").click(function(event){
		event.preventDefault();
		var ajaxLink = $(this);
		var url = $(this)[0].href;
		var dataTarget = "#"+$(this).attr("datatarget");
		var enable = $(this).attr("enable");
		var deactivate = $(this).attr("deactivate");
		console.log("dataTarget ", dataTarget);
		console.log("deactivate ", deactivate);
		$.ajax({
			url: url,
			success: function( data ) {
				$( dataTarget ).html( data );			
				if(enable) {
					ajaxLink.addClass("disabled");
					$(enable).removeClass("disabled");
				}
				if(deactivate) {
					$(deactivate).removeClass("active");
					ajaxLink.addClass("active");
				}
				addAllListeners();
			},
			failure: function( data ) {
			
				$( dataTarget ).html( data );
				addAllListeners(); 
			}
		});
	});
}


function addFileChangeListener() {
	$( "input[name='image_url']" ).unbind('change');
	$( "input[name='image_url']" ).change( function( e ) {
		console.log("IMAGE_URL ", $( this ));
		var image_url = $( this ).val();
		console.log( $( ".image_url" ) );
		$( ".image_url" ).attr("src", "" );
		$( ".image_url" ).attr("height", "100px" );
		$( ".image_url" ).attr("alt", "Новое изображение "+image_url );
	} );
};


function addAjaxFormListener() {
	$("form.ajax").unbind('submit');
	$("form.ajax").submit(function(event){
		event.preventDefault();
		var dataTarget = "#"+$(this).attr("datatarget");
		console.log("dataTarget ", dataTarget);
		ajaxForm($(this), function(data) {
			$(dataTarget).html(data);
			addAllListeners();
		});
	});
}

function addSubmitValidationListener() {
	$( ".edit-form" ).unbind('submit');
	$( ".edit-form" ).submit( function( e ) {
		e.preventDefault();
		
		var $form = $( this );
		
		if( $form.length == 1 ) {
			ajaxForm($form, function() {
				window.refreshFunction(window.currentRefreshUrl);
				$( "#editorForm").modal('hide'); 
			});
		}
	} );
};

function addEditListeners() {
		$( ".edit" ).unbind('click');			
		$( ".edit" ).click( function( e ) {
			e.preventDefault();
			$( "#editorForm").modal('show');
			
			var url = $( this )[ 0 ].href;
			
			$.ajax( {
				url: url,
				success: function( data ) {
						
					$( "#editor" ).html( data );
					if(/goods/.test(url)) {
						window.currentRefreshUrl = window.currentGoodUrl;
						window.refreshFunction = loadGoodByCategory; 
					} else {
						window.currentRefreshUrl = window.currentCmsUrl;
						window.refreshFunction = reloadContent;
					}
					
					addAllListeners();
					addPortionEditListener();
				}
			} );
			
		} );
};

function loadGoodByCategory( url ) {
	var data = {};
	
	data.cms = true;
	
	if( !url ) {
		url = '/goods/viewByCategory';
	}
	
	$.ajax( {
		url: url,
		data: data,
		success: function( data ) {
			$( "#menu" ).html( data );
			
			addAllListeners();
			
			window.currentGoodUrl = url;
		}
	} );
};

function reloadContent(url) {
	$.ajax({
			url: url,
			success: function( data ) {
			
				$( "#cms_content" ).html( data ); 
				$( ".sub-category" ).slideUp();
				
				addOnclickListener();
				addEditListeners();
				window.currentCmsUrl = url;
			}
		});
};


function addAllListeners() {
	addAjaxLinkListener();
	addAjaxFormListener();
	addEditListeners();
	addSubmitValidationListener();
	addFileChangeListener();
}

$( document ).ready( function() {
	
	//counter();
	showCartTotalSum();
	addAllListeners();
	//loadNews();
} );