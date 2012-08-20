jQuery(document).ready(function($){
								
				$('#carousel').elastislide({
					imageW 		: 200,
					minItems	: 3,
					margin 		: 20,
					border 		: 0  
				});
				$.getJSON("http://api.flickr.com/services/feeds/photos_public.gne?ids=43570188@N06&lang=en-us&format=json&jsoncallback=?",
		        function (data) {
		            var count = 0,
		                limit = 20,
		                row_count = 0,
		                images = "";
		            $.each(data.items, function (index, item) {
		                if (count < limit) {

			                // changing the size of the flickr image size called. 
					        var sourceSquare = (item.media.m).replace("_m.jpg", "_q.jpg");

		                    var newImage = "<li><a href='"+ item.link +"' target='_blank'><img src='"+ sourceSquare +"' /></a></li>"; 
		                    images = images += newImage; 

		                }
		                count++;
		            });
		            $objectifiedString = $(images);
		            $(".es-carousel ul").append($objectifiedString);
            		$('#carousel').elastislide( 'add', $objectifiedString );

		        }
		    );
		    					
												
		});
		
