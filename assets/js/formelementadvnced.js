(function($) {
	"use strict";
	
		//MULTI
		window.asd = $('.SlectBox').SumoSelect({ csvDispCount: 3, selectAll:true, captionFormatAllSelected: "Yeah, OK, so everything." });
        window.Search = $('.search-box').SumoSelect({ csvDispCount: 3, search: true, searchText:'Enter here.' });
		window.sb = $('.SlectBox-grp-src').SumoSelect({ csvDispCount: 3, search: true, searchText:'Enter here.', selectAll:true });
		$('.testselect1').SumoSelect();
		$('.testselect2').SumoSelect();
		$('.select1').SumoSelect({ okCancelInMulti: true, selectAll: true });
		$('.select3').SumoSelect({ selectAll: true });
		$('.search_test').SumoSelect({search: true, searchText: 'Enter here.'});
		
		
		// TRANSFER
		var languages = [
			{
				"language": "Kiran",
				"value": 122
			},
			{
				"language": "Mahesh",
				"value": 132
			},
			{
				"language": "Geetha",
				"value": 422
			},
			{
				"language": "Hima",
				"value": 232
			},
			{
				"language": "Manoj",
				"value": 765
			},
			{
				"language": "Dheeraj",
				"value": 876
			}
			
		];

		var groupData = [
			{
				"groupName": "Select All",
				"groupData": [
					{
						"language": "Geetha",
						"value": 422
					},
					{
						"language": "Hima",
						"value": 232
					},
					{
						"language": "Manoj",
						"value": 765
					},
					{
						"language": "Dheeraj",
						"value": 876
					}
				]
			}
			
		];

		var settings = {
			"inputId": "languageInput",
			"data": languages,
			"groupData": groupData,
			"itemName": "language",
			"groupItemName": "groupName",
			"groupListName" : "groupData",
			"container": "transfer",
			"valueName": "value",
			"callable" : function (data, names) {
				console.log("Selected ID：" + data)
				$("#selectedItemSpan").text(names)
			}
		};
		Transfer.transfer(settings);
		
		// SELECT BOX
		var select = document.getElementById('fruit_select');
		multi(select, {
			non_selected_header: 'Fruits',
			selected_header: 'Favorite fruits'
		});
		
		var select = document.getElementById('fruit_select1');
		multi(select, {
			enable_search: true
		} );
		
		// FANCYUPLOAD
		$('#demo').FancyFileUpload({
		params : {
			 action : 'fileuploader'
			},
			maxfilesize : 1000000
		});
		
})(jQuery);