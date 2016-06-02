function counter() {
	$.ajax({
		url : window.home_href + "core/c-counter.php",
		success : function(data) {
		}
	});
};

function addToCartListener() {
	$(".tocart > *[type='submit']").click(function(e) {
		e.preventDefault();
		var portionId = $( this ).parent().find( "input[name='portionId']" )[0];
		portionId = portionId.value;

		var select = document.createElement('div');
		for (var i = 1; i <= 14; i++) {
			var tmpDiv = document.createElement('div');
			tmpDiv.innerHTML = '' + i;
			select.appendChild(tmpDiv);
			tmpDiv.className = 'amt slideDown';
		}
		select.className = 'amtsel';

		var form = $( this ).parent()[0];
		form.appendChild(select);

		$(".amtsel").mouseleave(function(e) {
			var amtsel = $(".amtsel");
			var select = amtsel[0];
			var form = amtsel.parent()[0];
			$(".slideDown").removeClass("slideDown").addClass("slideUp");
			setTimeout(function() {
				form.removeChild(select);
			}, 900);
		});

		$(".amt").click(function(e) {
			var amount = $( this )[0].innerHTML;
			$(".slideDown").removeClass("slideDown").addClass("slideUp");
			setTimeout(function() {
				form.removeChild(select);
			}, 900);

			$.ajax({
				url : '../core/c-cart.php',
				data : {
					portionId : portionId,
					amount : amount,
					method : "add"
				},
				success : function(data) {
					showCartTotalSum();
				}
			});
		});
	});
};

function showCartTotalSum() {

	$.ajax({
		url : "/cart/total",
		data : {},
		success : function(data) {
			$("#cart_total").html(data);
		}
	}).fail(function(data) {
		$("#cart_total").html("0 руб.");
	});
};

function loadNews() {

	$.ajax({
		url : "/news/display",
		success : function(data) {

			if (data)
				data = data.trim();
			$("#news").html(data);
		}
	});
};

function addSearchListener() {

	$("#search-button").click(function(e) {
		e.preventDefault();

		var url = $("#search-form").serialize();
		url = window.home_href + "search?" + url;

		window.location.href = url;

	});
};

function ajaxForm(form, callback, failCallback) {
	var formData = new FormData(form[0]);
	var url = form[0].action;

	var xhr = new XMLHttpRequest();
	xhr.open("POST", url);
	xhr.setRequestHeader("X-Requested-With", "XMLHttpRequest");

	xhr.onreadystatechange = function() {
		if (xhr.readyState == 4) {
			if (xhr.status == 200) {
				data = xhr.responseText;

				if (data) {
					if ( typeof callback === 'function')
						callback(data);
				} else {
					if(console) console.log(" ERROR! ");
				}
			} else if (xhr.status == 400) {
				data = xhr.responseText;

				if (data) {
					if ( typeof callback === 'function')
						failCallback(data);
				} else {
					if(console) console.log(" ERROR! ");
				}
			}
		}
		
	};

	if(form.addClass) {
		form.addClass("active");
		setTimeout(function() {
		if(form.removeClass) {
			form.removeClass("active");
		}}, 1000);
	}
	xhr.send(formData);
}

function addAjaxLinkListener() {
	$("a.ajax").unbind('click');
	$("a.ajax").click(function(event) {
		event.preventDefault();
		var ajaxLink = $(this);
		var url = $(this)[0].href;
		var dataTarget = "#" + $(this).attr("datatarget");
		var modalTarget = $(this).attr("modal-target");
		var enable = $(this).attr("enable");
		var deactivate = $(this).attr("deactivate");
		$.ajax({
			url : url,
			success : function(data) {
				$(dataTarget).html(data);
				if(ajaxLink.hasClass("show-modal")) {
					$(dataTarget).modal('show');
				}
				if(modalTarget) {
					$( modalTarget ).modal('show');
				}
				if(!ajaxLink.hasClass("keep-news")) {
					$("#news").addClass("display-none");
				}
				if (enable) {
					ajaxLink.addClass("disabled");
					$(enable).removeClass("disabled");
				}
				if (deactivate) {
					$(deactivate).removeClass("active");
					ajaxLink.addClass("active");
					ajaxLink.closest('li').addClass("active");
				}
				if (ajaxLink.hasClass("show-cart")) {
					showCartTotalSum();
				}
				addAllListeners();
			},
			failure : function(data) {

				$(dataTarget).html(data);
				addAllListeners();
			}
		});
	});
}

function readURL(input, target) {
	if (input.files && input.files[0]) {
		var reader = new FileReader();

		reader.onload = function(e) {
			target.attr('src', e.target.result);
		};

		reader.readAsDataURL(input.files[0]);
	}
}

function addFileChangeListener() {
	$("input[name='image_url']").unbind('change');
	$("input[name='image_url']").change(function(e) {
		readURL(this, $(".image_url"));
	});
};

function addAjaxFormListener() {
	$("form.ajax").unbind('submit');
	$("form.ajax").submit(function(event) {
		event.preventDefault();
		var dataTarget = "#" + $(this).attr("datatarget");
		ajaxForm($(this), function(data) {
			$(dataTarget).html(data);
			addAllListeners();
		});
	});
}

function addSubmitValidationListener() {
	$(".edit-form").unbind('submit');
	$(".edit-form").submit(function(e) {
		e.preventDefault();

		var $form = $(this);
		var dataTarget = $(this).attr("datatarget") || 'cms_content';
		if ($form.length == 1) {
			ajaxForm($form, function(data) {
				$("#editorForm").modal('hide');
				if (dataTarget) {
					$('#' + dataTarget).html(data);
				}
				addAllListeners();
			}, function(data) {
				$("#editor").html(data);
				addAllListeners();
			});
		}
	});
};

function addEditListeners() {
	$(".edit").unbind('click');
	$(".edit").click(function(e) {
		e.preventDefault();
		var url = $( this )[0].href;

		$.ajax({
			url : url,
			success : function(data) {

				$("#editor").html(data);
				$("#editorForm").modal('show');
				if (/goods/.test(url)) {
					window.currentRefreshUrl = window.currentGoodUrl;
					window.refreshFunction = loadGoodByCategory;
				} else {
					window.currentRefreshUrl = window.currentCmsUrl;
					window.refreshFunction = reloadContent;
				}

				addAllListeners();
			}
		});

	});
};

function loadGoodByCategory(url) {
	var data = {};

	data.cms = true;

	if (!url) {
		url = '/goods/viewByCategory';
	}

	$.ajax({
		url : url,
		data : data,
		success : function(data) {
			$("#menu").html(data);

			addAllListeners();

			window.currentGoodUrl = url;
		}
	});
};

function reloadContent(url) {
	$.ajax({
		url : url,
		success : function(data) {

			$("#cms_content").html(data);
			$(".sub-category").slideUp();

			addAllListeners();
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


$(document).ready(function() {

	//counter();
	showCartTotalSum();
	addAllListeners();
	loadNews();
}); 