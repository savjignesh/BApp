
     $(function () {
		 
        $('.modelButton').click(function(){
			$('#model').modal('show')
				.find('#modelvalue')
				.load($(this).attr('value'));
		}); 
		$('.modelButton1').click(function(){
			$('#model1').modal('show')
				.find('#modelvalue1')
				.load($(this).attr('value'));
		});
		$('#customer').click(function(){
			$('#customer-model').modal('show')
				.find('#customervalue')
				.load($(this).attr('value'));
		});
     });