/* Function to toggle visibility of menu on smaller screens */
		function toggleMenu(){
			$('.nav_toggle').on('click', function(){
					event.preventDefault();
					$('.nav_menu').toggleClass('visible');
				});
		}

		
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
			setStages();
			toggleMenu();
			
			
			$('.nav_menu a').on('click', function(){
				$('.nav_menu').removeClass('visible');
			});
		
			
});




