
     $(function () {
		 
        $('.modelButton').click(function(){
			$('#model').modal('show')
				.find('#modelvalue')
				.load($(this).attr('value'));
		});
     });