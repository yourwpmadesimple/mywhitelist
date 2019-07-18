var j = jQuery.noConflict() 
j(document).ready(function() {
    j("#mywl-visual").hide();
    j("button.visual").click(function(){
        j("#mywl-visual").slideToggle();
    });
    j("#mywl-visual").change(function()
{

    var test= time_slot.value;

j.ajax({
        type: 'GET',
        url: mywhitelist.php,
        data: {
            action: 'ajax_ajaxhandler',
            test : test   
        },
        success: function(data) {
            alert(data);
        },
        error: function(XMLHttpRequest, textStatus, errorThrown) {
            alert("Error");
        }
    });

    return false;
  });
});