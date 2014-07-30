/* Function to toggle visibility of menu on smaller screens */
		function toggleMenu(){
			$('.nav_toggle').on('click', function(){
					event.preventDefault();
					$('.nav_menu').toggleClass('visible');
				});
		}


/* Function to add the generative logo on each page  */

		function generateLogo() {
			
			if($(window).width() < 768){
				return
			} else {
				
				var target = $('figure#nav_logo'),
				targetSize = target.outerWidth();
				
				target.empty();
				
				var paper = new Raphael('nav_logo', targetSize, targetSize);
	
				function getRandom(min, max) {
				    return Math.random() * (max - min) + min;
				}
				
				// Make random lines
				function makeLines() {
				    
				    var x1 = getRandom(-100,targetSize + 100);
				    var y1 = getRandom(-100,targetSize - 50);
				    var x2 = getRandom(-100,targetSize + 100);
				    var y2 = getRandom(-100,targetSize);
				    var thick = getRandom(1,8);
				    var r = getRandom(0,255);
				    var g = getRandom(0,255);
				    var b = getRandom(0,255);
				    var a = getRandom(0,1);
				    
				    // set up polygon coordinates
				    var line = "M" + x1 + "," + y1 + "L" + x2 + "," + y2;
				    paper.path(line)
				        .attr('stroke-width',thick)
				        .attr('stroke', 'rgba('+r+','+g+','+b+','+a+')')
				
				};
				
				// Make random circles
				function makeCircles() {
	    
				    var x = getRandom(-100,targetSize + 100);
				    var y = getRandom(-100,targetSize / 2 );
				    var rad = getRandom(20,targetSize / 2 );
				    var thick = getRandom(1,8);
				    var r = getRandom(0,255);
				    var g = getRandom(0,255);
				    var b = getRandom(0,255);
				    var a = getRandom(0,1);
				    
				    
				    var circle = paper.circle(x,y,rad);
				        circle.attr('stroke-width',thick);
				        circle.attr('stroke', 'rgba('+r+','+g+','+b+','+a+')');
				};
				
				// Make random rectangles
				function makeRectangles() {
	    
				    var x = getRandom(-100,400);
				    var y = getRandom(-100,150);
				    var w = getRandom(20, 255);
				    var h = getRandom(20, 150);
				    var thick = getRandom(1,8);
				    var r = getRandom(0,255);
				    var g = getRandom(0,255);
				    var b = getRandom(0,255);
				    var a = getRandom(0,1);
				    
				    
				    var rectangle = paper.rect(x,y,w,h);
				        rectangle.attr('stroke-width',thick);
				        rectangle.attr('stroke', 'rgba('+r+','+g+','+b+','+a+')');
				};
				
				// Make random triangles
				// Raphael extension to make triangular shapes				
				Raphael.fn.triangle = function(x, y, size) {
				  var path = ["M", x, y];
				  path = path.concat(["L", (x + size / 2), (y + size)]);
				  path = path.concat(["L", (x - size / 2), (y + size)]);
				  return this.path(path.concat(["z"]).join(" "));
				};
				
				function makeTriangles() {
					
					var x = getRandom(-100,400);
			    var y = getRandom(-100,150);
			    var size = getRandom(20, targetSize / 2.4);
			    var angle = getRandom(0,180);
			    var thick = getRandom(1,8);
			    var r = getRandom(0,255);
			    var g = getRandom(0,255);
			    var b = getRandom(0,255);
			    var a = getRandom(0,1);
					
					var triangle = paper.triangle(x,y,size);
							triangle.attr('stroke-width',thick);
							triangle.attr('stroke', 'rgba('+r+','+g+','+b+','+a+')');
							triangle.rotate(angle + 'deg');
				};
				
							
				// Decide how many shapes to draw
				var num = getRandom(25,255);
				
				// Depending on which "Vertical" we're in, decide which logo to draw
				for(var i = 0; i < num; i++){
					var body = $('body');				
					if(body.hasClass('single-experiment') || body.hasClass('page-id-93')){
						makeRectangles();
					} else if (body.hasClass('page-id-29')) {				
						makeCircles();
					} else if (body.hasClass('single-commission') || body.hasClass('page-id-23')) {
						makeTriangles();
					} else {
						makeLines();
					}
				}
				
				
				
			} /* End of generateLogo() */
		} /* End If */
		
/* Function to make sure each .stage section at least fills the height of the screen */
		function setStages(){
			var theStages = $('.stage'), // get all the .stages
					viewport = $(window).height(); // get the viewport height
			
			$.each(theStages, function(){
				var stage = $(this),
						stageHeight = stage.height();
				
				if(stageHeight < viewport) {
					//if the stage is shorter than the viewport, increase its height to match the viewport height.
					//stage.height(viewport);
					stage.css({minHeight:viewport});
				} else {
					// otherwise do nothing
				}
			});	
		};
		
	
		head.ready(function(){
			generateLogo();
			setStages();
			toggleMenu();
			
			$(window).on("resize", function(){
				generateLogo();
			});
			
			
			$('.nav_menu a').on('click', function(){
				$('.nav_menu').removeClass('visible');
			});
			
			
			// Ajax form submission so that Autotune calls your phone when you submit your phone number
			$('.autotune_callee').mask('(999) 999-9999',{placeholder: " "});
						
			$('.autotune_submit').on("click", function(e){
				e.preventDefault();
	
				// local variables
				var callee = $('#autotune_phone_call').serialize();
				
				$.ajax({
					url: 'http://spiderwebshow.ca/wp-content/themes/spiderwebshow/inc/twilio_make_call.php',
					type: 'post',
					data: callee
				});
				
				// disable the button and input
				$('.autotune_submit').addClass('pure-button-disabled');
				$('.autotune_callee').prop('disabled', true);
				
			});	// end Autotune call form
						
			
			$('.scene').parallax({frictionX:0.2,frictionY:0.7});
		
		/* Function to add the generative logo on each page  */

		function generateLogo1() {
			
			if($(window).width() < 768){
				return
			} else {
				
				var target = $('#web1'),
				targetSize = target.outerWidth();
				
				target.empty();
				
				var paper = new Raphael('web1', targetSize *1.2, targetSize*1.2);
	
				function getRandom(min, max) {
				    return Math.random() * (max - min) + min;
				}
				
				// Make random lines
				function makeLines() {
				    
				    var x1 = getRandom(-100,targetSize + 100);
				    var y1 = getRandom(-100,targetSize - 50);
				    var x2 = getRandom(-100,targetSize + 100);
				    var y2 = getRandom(-100,targetSize);
				    var thick = getRandom(1,1);
				    var r = getRandom(155,255);
				    var g = getRandom(155,255);
				    var b = getRandom(155,255);
				    var a = getRandom(0,0.4);
				    
				    // set up polygon coordinates
				    var line = "M" + x1 + "," + y1 + "L" + x2 + "," + y2;
				    paper.path(line)
				        .attr('stroke-width',thick)
				        .attr('stroke', 'rgba('+r+','+g+','+b+','+a+')')
				
				};
							
				// Decide how many shapes to draw
				var num = getRandom(25,255);
				
				// Depending on which "Vertical" we're in, decide which logo to draw
				for(var i = 0; i < num; i++){
					var body = $('body');				
					if(body.hasClass('single-commission') || body.hasClass('page-id-23')){
						makeRectangles();
					} else {				
					makeLines();
					}
				}
				
				
				
			} /* End of generateLogo() */
		} /* End If */
		
		/* Function to add the generative logo on each page  */

		function generateLogo2() {
			
			if($(window).width() < 768){
				return
			} else {
				
				var target = $('#web2'),
				targetSize = target.outerWidth();
				
				target.empty();
				
				var paper = new Raphael('web2', targetSize *1.2, targetSize*1.2);
	
				function getRandom(min, max) {
				    return Math.random() * (max - min) + min;
				}
				
				// Make random lines
				function makeLines() {
				    
				    var x1 = getRandom(-100,targetSize + 100);
				    var y1 = getRandom(-100,targetSize - 50);
				    var x2 = getRandom(-100,targetSize + 100);
				    var y2 = getRandom(-100,targetSize);
				    var thick = getRandom(1,1);
				    var r = getRandom(0,255);
				    var g = getRandom(0,255);
				    var b = getRandom(0,255);
				    var a = getRandom(0,0.4);
				    
				    // set up polygon coordinates
				    var line = "M" + x1 + "," + y1 + "L" + x2 + "," + y2;
				    paper.path(line)
				        .attr('stroke-width',thick)
				        .attr('stroke', 'rgba('+r+','+g+','+b+','+a+')')
				
				};
							
				// Decide how many shapes to draw
				var num = getRandom(25,255);
				
				// Depending on which "Vertical" we're in, decide which logo to draw
				for(var i = 0; i < num; i++){
					var body = $('body');				
					if(body.hasClass('single-commission') || body.hasClass('page-id-23')){
						makeRectangles();
					} else {				
					makeLines();
					}
				}
				
				
				
			} /* End of generateLogo() */
		} /* End If */
		
		/* Function to add the generative logo on each page  */

		function generateLogo3() {
			
			if($(window).width() < 768){
				return
			} else {
				
				var target = $('#web3'),
				targetSize = target.outerWidth();
				
				target.empty();
				
				var paper = new Raphael('web3', targetSize *1.2, targetSize*1.2);
	
				function getRandom(min, max) {
				    return Math.random() * (max - min) + min;
				}
				
				// Make random lines
				function makeLines() {
				    
				    var x1 = getRandom(-100,targetSize + 100);
				    var y1 = getRandom(-100,targetSize - 50);
				    var x2 = getRandom(-100,targetSize + 100);
				    var y2 = getRandom(-100,targetSize);
				    var thick = getRandom(1,1);
				    var r = getRandom(0,155);
				    var g = getRandom(0,155);
				    var b = getRandom(0,155);
				    var a = getRandom(0,0.3);
				    
				    // set up polygon coordinates
				    var line = "M" + x1 + "," + y1 + "L" + x2 + "," + y2;
				    paper.path(line)
				        .attr('stroke-width',thick)
				        .attr('stroke', 'rgba('+r+','+g+','+b+','+a+')')
				
				};
							
				// Decide how many shapes to draw
				var num = getRandom(25,255);
				
				// Depending on which "Vertical" we're in, decide which logo to draw
				for(var i = 0; i < num; i++){
					var body = $('body');				
					if(body.hasClass('single-commission') || body.hasClass('page-id-23')){
						makeRectangles();
					} else {				
					makeLines();
					}
				}
				
				
				
			} /* End of generateLogo() */
		} /* End If */
		
		generateLogo1();
		generateLogo2();
		generateLogo3();
		
		
		
		
			
});




