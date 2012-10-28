$(function(){
    
    $('#ChildAddForm').bind('submit', findSimilarChildrenFunc);
    
    $('.childDeleteLink').click(function(){
       $('#childDeleteSelectReasonBox').insertAfter($(this).parents('tr:first')).hide().show('fast');
       return false; 
    });
    
    $('.childDeleteLinkInDiv').click(function(){
        if($(this).hasClass('delete_totally')) {
            return confirm('Ви дійсно хочете видалити цю дитину зі списку ?');
        }
        
       $('#childDeleteSelectReasonBox').slideDown('fast');
       return false; 
    });
    
    
    $('#childrenSearch .search_btn').click(function(){
        $('#SearchIndexForm').slideToggle(); 
    });
    
    //moved to childrenSearch element to support prePopulate
    /*$("#children_search_street").tokenInput("/streets/autosuggest", {
        theme: "facebook",
        hintText: "Почніть вводити назву вулиці",
        noResultsText: "Нічого не знайдено",
        searchingText: "Пошук...",
        minChars: 3,
        preventDuplicates: true,
        method: 'POST',
        queryParam: 'data[search]'
    });*/

    //dual boxes for volunteers selection
    $.configureBoxes();

    var teamMembersChanged = function(){
        var oldTeamLeaderId = $('#TeamLeaderId').val();

        $('#TeamLeaderId option:not(:first)').remove();
        $('#TeamLeaderId option:not(:first)').remove();
        $('#box2View option').clone().appendTo($('#TeamLeaderId'));

        $("#TeamLeaderId").val(oldTeamLeaderId);
    }

    $('#box1View option, #box2View option').live('dblclick', teamMembersChanged);
    $('#to1, #to2, #allTo1, #allTo2').click(teamMembersChanged);

    $('.currentActionSelector .change').click(function(){
        var parentForm = $(this).parents('.currentActionSelector');

        $(this).hide();
        parentForm.find('.actionName').hide();
        
        parentForm.find('#SettingActionId').show();
        parentForm.find('.saveSet').show();
    });

    $('.currentActionSelector .cancel').click(function(){
        var parentForm = $(this).parents('.currentActionSelector');

        parentForm.find('#SettingActionId').hide();
        parentForm.find('.saveSet').hide();
        
        parentForm.find('.change').show();
        parentForm.find('.actionName').show();

        parentForm[0].reset();
    });

    $('.currentActionSelector .save').click(function(){
        $(this).parents('.currentActionSelector').submit();
    });

    $('#TeamAddForm').submit(function(event){
       
        if(!$('#box2View option').size()) {
            $('#emptyTeamError').show();
            event.preventDefault();
            return false;
        }

        if($('#TeamLeaderId').val() == 0) {
            $('#teamLeaderError').show();
            event.preventDefault();
            return false;
        }

    });
    
});

var findSimilarChildrenFunc = function findSimilarChildren()
{
    var data = $('#ChildAddForm').serializeArray();
    
    $('#similarChildrenInsertPlace').html('');
    $('#submit_div').hide();
    
    $('#similarChildrenBox').fadeIn();
    $('#similarChildrenLoader').fadeIn();
    
    $('#ChildAddForm').unbind('submit', findSimilarChildrenFunc);
    
    $.post('/children/findSimilar', data, function(response){
        
        if(response == 'success') {
            $('#ChildAddForm').submit();
            return;
        }
        
        $('#similarChildrenLoader').fadeOut(function(){            
            $('#similarChildrenInsertPlace').html(response);
            $('#submit_div').show();                
        });
        
    });
    
    return false;
}

function backToChildrenList()
{
    if(confirm('Ви дійсно бажаєте повернутися назад? Введені дані будуть втрачені.')){
        location.href = '/children';
    }
}

function backToVolunteersList()
{
    if(confirm('Ви дійсно бажаєте повернутися назад? Введені дані будуть втрачені.')){
        location.href = '/volunteers';
    }
}

function backToWithConfirm(url)
{
    if(confirm('Ви дійсно бажаєте повернутися назад? Введені дані будуть втрачені.')){
        location.href = url;
    }   
}

function cancelChildDeleting()
{
    $('#childDeleteSelectReasonBox').hide('fast', function(){
        $(this).find('select').val('1');
    });
}

function deleteChild(button)
{
    var blockForDeleting = $(button).parents('tr:first').prev('tr'); 
    var url = blockForDeleting.find('a.childDeleteLink').attr('href') + '/' + $('#delete_reason_id').val();
    
    //hide deleting reason row
    $('#childDeleteSelectReasonBox').hide('fast', function(){
        $(this).find('select').val('1');
    });
    
    blockForDeleting.hide('fast');
    
    $.post(url, function(response){
         if(response != 'success') {
            alert('Помилка видалення. Перезавантажте сторінку і спробуйте ще раз.');
            blockForDeleting.show('fast');
         }
    });

}

function deleteChildFromDiv(button)
{
    location.href = $('.childDeleteLinkInDiv:first').attr('href') + '/' + $('#delete_reason_id').val();
}

function checkTeam()
{
    if(!$('#box2View option').size()) {
        $('#emptyTeamError').show();
        return false;
    }

    if($('#TeamLeaderId').val() == 0) {
        $('#teamLeaderError').show();
        return false;
    }
    
    $('#TeamAddForm').submit();
}