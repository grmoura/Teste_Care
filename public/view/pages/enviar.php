<div id="form-return">
  <section class="desktop-hidden" style="padding: 40px 0;"> </section>
  <section class="mobile-hidden" style="padding: 20px 0;"> </section>
  <section>
    <div class="container">
      <h3 class="title-ofert">Enviar Nota Fiscal</h3>
      <h3 class="title-ofert2">Envie seu XML da sua nota fiscal rápido e facil</h3>
    </div>
  </section>
  <div class="container card-body">
    <div class="row">
      <div class="col-md-12">
        <div class="row mobile-entrar">

          <form id="xmlForm" name="xmlForm">
            <div class="col-md-12">
              <div class="form-group form-enviar">
                <label class="ts-name">Arquivo Xml</label>
                <input class="form-control" type="file" id="xmlArquivo">
              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group form-enviar">
                <div id="form-return-error" class="infocarrinho"></div>

              </div>
            </div>


            <div class="col-md-12">
              <div class="form-group">
                <span class="title-underline"></span>

                <button class="form-control btn btn-primaryNew solid blank" id="form-return" type="submit" class="form-return">Enviar</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    </div>

  </div>
</div>
</div>

<script type="text/javascript">
  $("#xmlForm").submit(function(event) {
    event.preventDefault();
    var selectedFile = document.getElementById('xmlArquivo').files[0];


    if(selectedFile == undefined){
      $('#form-return-error').html("Selecione um arquivo para enviar.");
    }else{

    var form = new FormData();
    var reader = new FileReader();
    reader.onload = function(e) {

      form.append("file", selectedFile);
      form.append("xml", e.target.result);

      $.ajax({
        url: '../../view/pages/enviarController.php?enviar=true',
        method: 'POST',
        data: form,
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function() {
          $('#form-return-error').html("<center><img src='view/images/loading.gif' alt='' style='padding: 50px 0;' /></center>");
        },
        success: function(data) {
     
          $('#form-return-error').html(data);
        }
      });

    };


    reader.readAsText(selectedFile);
  }


  });
</script>
