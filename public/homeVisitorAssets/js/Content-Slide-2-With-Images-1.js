$("document").ready(function(){
		var supports3DTransforms = document.body.style['webkitPerspective'] !== undefined || document.body.style['MozPerspective'] !== undefined;
		
		function linkify(selector,char_crossfade) { 
			
			var cc = (char_crossfade!=null)?char_crossfade:"150"; 
			var ad=0;
			
			if (supports3DTransforms) {  
				$.each(selector, function() { 
					var nodes = $(this);
					var char_count=$.trim( nodes.text()).length;
					var char_at=$.trim( nodes.text()); 
					nodes.empty();
					for(var i=0;i<char_count;i++ ){ 
						var node = char_at[i];
						if (node!=" "){
							nodes.append('<span  class="letter"  data-letter="' + node + '">' + 
							'<span class="char2" style="-webkit-animation-delay:' + ((i*cc)+ad) + 
							'ms;-moz-animation-delay:' + ((i*cc)+ad) + 'ms;'+
							'ms;-ms-animation-delay:' + ((i*cc)+ad) + 'ms;'+
							'ms;-o-animation-delay:' + ((i*cc)+ad) + 'ms;'+
							'ms;animation-delay:' + ((i*cc)+ad) + 'ms;" >'+
							node+'</span>'+ 
							node +  
							'<span class="char1" style="-webkit-animation-delay:' + ((i*cc)+ad) + 
							'ms;-moz-animation-delay:' + ((i*cc)+ad) + 'ms;'+
							'ms;-ms-animation-delay:' + ((i*cc)+ad) + 'ms;'+
							'ms;-o-animation-delay:' + ((i*cc)+ad) + 'ms;'+
							'ms;animation-delay:' + ((i*cc)+ad) + 'ms;" >'+
							node+'</span>'+ 
							'</span>'); 
						}else{
							nodes.append('<span class="letter"> &nbsp </span>');
						} 
					}
					ad+=(char_count*char_crossfade);
				});  
			}else{
				selector.addClass("letter");
			}
		} 
		
		//Add class name here followed by crossfade charactor animation delay in millisecond
		linkify($(".foo"),200);  
	}); 