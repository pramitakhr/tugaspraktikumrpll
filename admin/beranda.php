<?php   
   if (isset($_POST['kirim'])){
         mysqli_query($GLOBALS["___mysqli_ston"], "update beranda set judul = '$_POST[judul]',isi = '$_POST[isi]' where id_beranda = '$_POST[id]'");
      } 
    //  header("location: ./modul.php?halaman=beranda");
   
?>

<style scoped>

  
  h2 {
    margin-bottom: 0;
  }
  
  small {
    display: block;
    margin-top: 40px;
    font-size: 12px;
  }
  
  small,
  small a {
    color: #000;
  }
  
  
  
  #toolbar [data-wysihtml5-action] {
    float: right;
  }
  
  #toolbar,
  textarea {
    width: 100%;
    padding: 5px;
    -webkit-box-sizing: border-box;
    -ms-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
    font-size: 12px;
  }

  #textarea1{
  	width: 100%;
  	height: 20px;
  	resize:none;
  } 
  #toolbar>a{
 color: #000;
    text-decoration: none;
    cursor: pointer;
    border: 1px solid rgb(36, 160, 218);
    padding: 2px 5px;
    margin: -10 10px 0 0;

  }
  textarea {
    height: 280px;
    border: 2px solid green;
    font-family: Verdana;
    font-size: 11px;
  }
  
  textarea:focus {
    color: black;
    border: 2px solid black;
  }
  
  .wysihtml5-command-active {
    font-weight: bold;
  }
  
  [data-wysihtml5-dialog] {
    margin: 5px 0 0;
    padding: 5px;
    border: 1px solid #666;
  }
  
  a[data-wysihtml5-command-value="red"] {
    color: red;
  }
  
  a[data-wysihtml5-command-value="green"] {
    color: green;
  }
  
  a[data-wysihtml5-command-value="blue"] {
    color: blue;
  }

  a[data-wysihtml5-command-value="black"] {
    color: black;
  }
</style>

<h3 style="color: rgb(36, 160, 218);">Selamat Datang Administrator</h3>
<hr style="border: 1px solid rgb(229, 229, 229)">
<?php
  $query = mysqli_query($GLOBALS["___mysqli_ston"], "select * from beranda order by id_beranda asc");
    	        while($data = mysqli_fetch_array($query)){
?>
<form action="?halaman=beranda" method="POST">
<input type="hidden" name="id" value="<?php echo $data['id_beranda']; ?>">
  <div class="control-group">
         <div class="controls">
            <input class="input-xxlarge" style="width: 100%; border: 1px solid rgb(36, 160, 218)"  type="text" name="judul" value="<?php echo $data['judul']; ?>">
      	</div>
  </div>
  <div id="toolbar" style="display: none;">
    <a data-wysihtml5-command="bold" title="CTRL+B">bold</a>
    <a data-wysihtml5-command="italic" title="CTRL+I">italic</a>
    <a data-wysihtml5-command="createLink">insert link</a>
    <a data-wysihtml5-command="insertImage">insert image</a>
    <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h1">h1</a>
    <a data-wysihtml5-command="formatBlock" data-wysihtml5-command-value="h2">h2</a>
    <a data-wysihtml5-command="insertUnorderedList">insertUnorderedList</a>
    <a data-wysihtml5-command="insertOrderedList">insertOrderedList</a>
    <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="black">black</a>
    <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="red">red</a>
    <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="green">green</a>
    <a data-wysihtml5-command="foreColor" data-wysihtml5-command-value="blue">blue</a>
    <a data-wysihtml5-command="undo">undo</a>
    <a data-wysihtml5-command="redo">redo</a>
    <a data-wysihtml5-command="insertSpeech">speech</a>
    <a data-wysihtml5-action="change_view" style="position: relative; margin-bottom: 5px">switch to html view</a>
    
    <div data-wysihtml5-dialog="createLink" style="display: none;">
      <label>
        Link:
        <input data-wysihtml5-dialog-field="href" value="http://">
      </label>
      <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
    </div>
    
    <div data-wysihtml5-dialog="insertImage" style="display: none;">
      <label>
        Image:
        <input data-wysihtml5-dialog-field="src" value="http://">
      </label>
      <label>
        Align:
        <select data-wysihtml5-dialog-field="className">
          <option value="">default</option>
          <option value="wysiwyg-float-left">left</option>
          <option value="wysiwyg-float-right">right</option>
        </select>
      </label>
      <a data-wysihtml5-dialog-action="save">OK</a>&nbsp;<a data-wysihtml5-dialog-action="cancel">Cancel</a>
    </div>    
  </div>
  <textarea id="textarea" name="isi" style="border: 1px solid rgb(36, 160, 218); font-size: 12px">
		<?php	
			echo $data['isi'];
		 }
		?>
  </textarea>
  <br><input name="kirim" type="submit" value="Simpan">
</form>

<script src="js/advanced.js"></script>
<script src="js/wysihtml5-0.4.0pre.js"></script>
<script>
  var editor = new wysihtml5.Editor("textarea", {
    toolbar:        "toolbar",
    stylesheets:    "css/stylesheet.css",
    parserRules:    wysihtml5ParserRules
  });
  
  var log = document.getElementById("log");
  
  editor
    .on("load", function() {
      log.innerHTML += "<div>load</div>";
    })
    .on("focus", function() {
      log.innerHTML += "<div>focus</div>";
    })
    .on("blur", function() {
      log.innerHTML += "<div>blur</div>";
    })
    .on("change", function() {
      log.innerHTML += "<div>change</div>";
    })
    .on("paste", function() {
      log.innerHTML += "<div>paste</div>";
    })
    .on("newword:composer", function() {
      log.innerHTML += "<div>newword:composer</div>";
    })
    .on("undo:composer", function() {
      log.innerHTML += "<div>undo:composer</div>";
    })
    .on("redo:composer", function() {
      log.innerHTML += "<div>redo:composer</div>";
    });
</script>
