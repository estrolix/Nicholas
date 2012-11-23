$(function(){
	$('.registerButton').click(function(e){
		$('html,body').animate({
			scrollTop: $("#VolunteerRegisterForm").offset().top - 10
		}, 'slow', function(){
			$('#VolunteerFirstName').focus();
		});
	});
	$('.VolunteerHowfoundId').change(function(){
		var ownVarintField = $('#VolunteerHowfoundOwnVariant');
		if($(this).val() == 4) {
			ownVarintField.removeAttr('disabled');
			ownVarintField.focus();
		}
		else {
			ownVarintField.val('');
			ownVarintField.attr('disabled', 'disabled');
		}
	});
	$('div.required').find('input').addClass('required');
	$('#VolunteerRegisterForm').validate();
});