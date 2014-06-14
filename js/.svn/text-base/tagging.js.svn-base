/**
 * Version: 0.0.1
 * Deps: $jq
 * Enqueue: true
*/

 $jq = jQuery.noConflict();
   $jq(function () {

		var data = { action: 'my_action' };
		
		jQuery.post(ajaxurl, data, function(response) {
						
		var myObject = JSON.parse(response);
		
        $jq('#ngg-listimages td.column-tags textarea').tagSuggest({
            tags:myObject, separator: ', '   });
		
		});
	
	});
	
	