$(document).ready(function(){

var $form = $('#commentForm');
$form.submit( function(e) {
    
    e.preventDefault();

    $.ajax({
        url:"http://localhost/webprogca4/includes/addComment.php",
        data: $form.serialize(),
        type: 'POST'
        
     
     
          
      });
      
   $('#newestComment').html(document.getElementById('comment').value+"<br>");
      
      
    });
});