$(document).ready(function(){//page loaded
	$("#start").on("click", function(){	
		
		$(".howToPlay").fadeIn(100);//display text on how to move animals

		//Start 3-2-1-Go! Countdown to Play Game (Need to make into a proper function)
		$("#info").text("3").fadeOut(500, //writes to the display
			function(){
				$(this).text("2").show().fadeOut(500,
					function(){
						$(this).text("1").show().fadeOut(500,
							function(){
								$(this).text("Go!").show(play()); //Play/ Move on Go!
							});
					});
			});

		function play(){
			function moveRight(object){	//moves the animal to the 50px right (triggered by keyup)
				object.animate({
					left: "+=50px"
				},100, function(){
					//post-animation function - check if animal reached finish line
					if(object.position().left >= ($("#finishLine").position().left - 150)){
						$(document).off();//turn off keyup event listener
						$("#info").text("The " + object.attr('id') +" won!");
					}
				});
			}

			//animate the turtle
			$(document).on("keyup", function(event){
				if(event.which==68){ //If D key is press
					moveRight($("#turtle"));
					$("#turtlebtn").fadeOut(100); //remove to turtle how-to-move text					
				}
			});

			//animate the snail
			$(document).on("keyup", function(event){
				if(event.which==39){ //If right arrow key is press
					moveRight($("#snail"));
					$("#snailbtn").fadeOut(100);//remove the snail how-to-move text
				}
			});
		}	
	});

	$("#reset").on("click", function(){
		$(".animal").css("left","10px");//send animals back to start
		$("#info").text(""); //clear winner
		$(".howToPlay").css("display","none");//hide how-to-move text
	});
});
