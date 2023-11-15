$(window).resize(function() {
	$('.mega-menu').css('width', $(document).width() );
	$('.container.search-result .row .page-content').css('min-height', $(document).height() * .6 );
});

$(document).ready(function(){
	var wSize = $(document).width(), hSize = $(document).height();

	$('.container.search-result .row .page-content').css('min-height', hSize * .6 );
	$('.mega-menu').css('width', wSize );

	/* parallax */
	var containerHeight = $('.container').height();
	$('#parallax').parallax(0, containerHeight / (containerHeight * 20));

	if (navigator.appName == 'Microsoft Internet Explorer' ||  !!(navigator.userAgent.match(/Trident/) || navigator.userAgent.match(/rv:11/)) || (typeof $.browser !== "undefined" && $.browser.msie == 1))
	{
		console.log('client use IE.');
	}
	
	$('#parallax').lazy({
		afterLoad: function(element) { // called after an element was successfully handled
			console.log('Parallax afterLoad');
		},
        onError: function(element) {
            console.log('error loading ' + element.data('src'));
        },
        effect: 'fadeIn', //'show',
		//imageBase: 'media/uploads/images/',
		// scrollDirection: 'vertical',
        // effectTime: 5000,
        // visibleOnly: true,
	});	

	/* scrollTo */
	var rowTopHeight = $('.row.top').height(), headWidth = $('H1').width();
	$(window).scroll(function(){
	  var wScroll = $(this).scrollTop();
	  if (wScroll <= rowTopHeight) { 
	  	$('.logo').css({ 'transform' : 'translate(0px, '+ wScroll / 8 +'%)' });
	  	$('.logo-title').css({ 'transform' : 'translate(0px, '+ wScroll / 5 +'%)' });
	  }
	});

	/************************
	*	Tab Control by Hash	*
	************************/
	/*Javascript to enable link to tab*/
	var url = document.location.toString();
	if (url.match('#')) {
    	$('.nav-tabs a[href="#' + url.split('#')[1] + '"]').tab('show');
	} 


	var firsttitle = $(document).prop('title'), currHash = window.location.hash;

	//append currenthash to switcher language
	$('.lang-switch').each(function() {
		$(this).attr('href', $(this).attr('href') + currHash );
	});

	/*Change hash for page-reload*/
	$('.nav-tabs a').on('shown.bs.tab', function (e) {
		var	hashTab	= window.location.hash;
		window.location.hash = e.target.hash;

		//append currenthash to switcher language while change tab
		currHash = e.target.hash;
		$('.lang-switch').each(function() {
			currLink = $(this).attr('href').split('#')[0];
			$(this).attr('href', currLink + currHash );
		});

		var parent = $(this).parent().closest('div');
		$('html, body').animate({ scrollTop: parent.position().top - 80 }, 0);

		//change title document
		$(document).prop('title', e.target.hash.substring(1) + '-' + firsttitle);
	})

	var prefix = "tab_", hash = document.location.hash.slice(0, -1);
	$('.nav-tabs a[href="'+hash.replace(prefix,"")+'"]').tab( hash ? 'show' : '' );
	$('.nav-tabs a').on('shown', function (e) { 
		window.location.hash = e.target.hash.replace("#", "#" + prefix);
		//window.scrollTo(0, 0);
	});

	/************************
	*		MEGA Menu		*
	************************/
	function closeMenuFaded(con, mmenu){
		mmenu.addClass('animated fadeOut');
		con.addClass('animated fadeIn');

		setTimeout(function(){
			con.removeClass('animated fadeIn');
			mmenu.removeClass('animated fadeOut');

			con.css({ 'visibility' : '' });
			$('.mega-dropdown').removeClass('open');

			$('html, body').css('overflowY', 'auto');

		},500);
	}

	$('.btn.close-mega-menu').click(function() {
		var container = $('.container'), megamenu = $('.mega-dropdown').find('.mega-menu');
		closeMenuFaded(container, megamenu);
  	});

	$('.mega-dropdown').on({
		"click":function (){
			this.closable = true;
		},
		"shown.bs.dropdown": function () {
			$('html, body').css('overflowY', 'hidden'); /*hidden overflow*/

			this.closable = false;
			$(this).find('.mega-menu').addClass('animated fadeInDown');
			$('.container').addClass('animated fadeOut');
			setTimeout(function(){
				$('.mega-menu').removeClass('animated fadeInDown');
				$('.container').removeClass('animated fadeOut');
				$('.container').css({ 'visibility' : 'hidden' });
			},1000);
		},
		
		"hide.bs.dropdown":  function(e) {
			return false;
		}

	});

	/* change tab while click menu */
	$('.list-group-item.menu').click(function(){
    	var href = $(this).attr('href'), container = $('.container'), megamenu = $('.mega-dropdown').find('.mega-menu');
    	if (href.match('#')) {
	    	var pathname = document.location.pathname.toString().split('#')[0],
	    		targetname = href.split('#')[0],
	    		target = $('.nav-tabs a[href="#' + href.split('#')[1].slice(0, -1) + '"]');

	    	if(pathname == targetname){
	    		target.tab('show');
				closeMenuFaded(container, megamenu);
	    	}
			
		} else {
			return false;
		}
  	});

	/************************
	*	dropdown active		*
	************************/
	$('.dropdown.general').each(function(index){
		first = $(this).find('li').first();
		//first.addClass('active');
		btn = $(this).children('.btn');
		btn.text( first.text() );
		btn.append('<span class="caret"></span>');
	});

	/************************
	*	All Text Effects	*
	************************/
	//$('p').addClass('animated fadeIn');
	$('.highlights').addClass('animated flash');

	/**********************
	* ScrollTab on mobile *
	***********************/
	var scrollChild = $('.scroll-tab ul.tab li');
	if( scrollChild.length > 1){
		var widthTotal = 0;
		scrollChild.each(function() { widthTotal += $(this).outerWidth(); });
		$('.scroll-tab ul.tab').css({'width': widthTotal + 'px'});
	}
	
	var scrollSubChild = $('.scroll-tab ul.childtab li');
	if(scrollSubChild.length > 1){
		var widthTotal = 0;
		scrollSubChild.each(function() { widthTotal += $(this).outerWidth(); });
		$('.scroll-tab ul.childtab').css({'width': widthTotal + 'px'});
	}
	
	/*************************
	* Share Search on mobile *
	**************************/
	var share_el = $('.boxes ul');
	$('#share-mobile').click(function(){
		var showhide = $('.boxes ul:visible').length ? 'none' : 'block';
		return share_el.css({ 'display' : showhide })
	});

	var share_el_menu = $('.boxes-menu ul');
	$('#share-mobile-menu').click(function(){
		var showhide = $('.boxes-menu ul:visible').length ? 'none' : 'block';
		return share_el_menu.css({ 'display' : showhide })
	});

	$('#search-mobile').click(function(){
    	$('#input-search-mobile').toggle('slide');
  	});

	$('#search-mobile-menu').click(function(){
  		$('#input-search-mobile-menu').toggle('slide');
	});

	/*************************
	*			helper on mobile 		*
	**************************/
	$('.swipe').on('click touch', function(){
		$(this).remove();
	});

	$('.swipe').on('swipe', function(){
		$(this).remove();
	});

	$(window).on('scroll', function(){
		$('.swipe').fadeOut(5000);
	});

	$('.mega-dropdown').on('click touch', function(){
		$('.swipe').fadeOut(5000);
	});

});

// function changeTitle(txt) {
//     var title = $(document).prop('title'); 
//     $(document).prop('title', txt + ' ' + title);
//     if (title.indexOf('>>>') == -1) {
//         setTimeout(changeTitle, 3000);  
//         $(document).prop('title', '>'+title);
//     }
// }