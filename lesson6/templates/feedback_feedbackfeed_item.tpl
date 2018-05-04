  <script>
  $( function() {
    var dialog, form,
 
      name = $( "#name" ),
      text = $( "#text" );
  
    function EditFeedback() {
        dialog.dialog( "close" );
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 400,
      width: 350,
      modal: true,
      buttons: 
      {
        // "Edit FEEDBACK": EditFeedback,
        // Cancel: function() { dialog.dialog( "close" ); }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      EditFeedback();
    });
 
    $( "#edit" ).button().on( "click", function() {
      dialog.dialog( "open" );
      /*if document.getElementById("dialog-form " + {{ID_MSG}}) {
      display = document.getElementById("dialog-form").style.display;
        alert("dialog-form " + {{ID_MSG}});
        if (display == 'none') {
            document.getElementById('dialog-form').style.display = 'block';
        } else {
            document.getElementById('dialog-form').style.display = 'none';
        }
    //}*/
	});
  } );
</script>

<script>
	function disp(form) {
		
        if (form.style.display == "none") {
            form.style.display = "block";
        } else {
            form.style.display = "none";
        }
    }	
</script>

<div style="border: 1px solid black; width: 500px; margin-bottom: 10px; padding-left: 10px;">
<p alig="right" style="text-align:  right; padding-right: 10px;">Сообщение № {{ID_MSG}}</p>
<h4>Автор: {{FEEDBACK_USER}}</h4>
<p>Текст: {{FEEDBACK_BODY}}</p>
<form method="post">
	<input type="hidden" name="ID_MSG" value = {{ID_MSG}} />
	<input type="submit" name="del" value="Уничтожить FEEDBACK" />
</form>
<form method="post">
	<p><input type="hidden" name="ID_MSG_EDIT" value = {{ID_MSG}} /></p>
	<!-- <p><input type="submit" name="read" value="Выбрать" /> -->
	<!--<button onclick="makeField('block')">Make a field</button></p> -->
</form>
<button onclick="disp(document.getElementById({{ID_MSG}}))">Редактировать</button>
<form id= {{ID_MSG}} style="display: none;" method="post">

	<p><input type="hidden" name="ID_MSG_EDITx" value = {{ID_MSG}} /></p>
	<p><input type="text" name="retext" value = {{FEEDBACK_BODY}} /></p>
	<p><input type="submit" name="edit" value="Редактировать" /></p>
</form>

<!--<button id="edit" name= {{ID_MSG}} >РЕДАКТИРОВАТЬ</button>-->

</div>
<!--<div id="dialog-form" title="Редактировать FEEDBACK">
  <form method="post">
      <p><input type="hidden" name="ID_MSG_EDITx" value= {{ID_MSG}} /></p>
      <p>Сообщение № {{ID_MSG}}</p>
      <p><label for="retext">Text</label>
      <input type="text" name="retext" value= {{FEEDBACK_BODY}} /></p>
       
      <p><input type="submit" name="edit" value="Редактировать" /></p>
  </form>
</div>-->