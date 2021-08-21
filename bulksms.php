<?php include 'components/header.php'; ?>
        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5 pt-5">
        <div class="container">
          <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
              <div class="formBox" style="margin-top:10%;">
                <h5>Bulk SMS Service</h5>
                <hr />
                <form>
                  <div class="form-group">
                    <label for="inputphone">Upload Phone Number (.xls or .xlsx)*</label>
                    <input type="file" class="form-control" id="inputphone" class="file" data-browse-on-zone-click="true">
                  </div>
                  <div class="form-group">
                    <label for="inputMessage">Message*</label>
                    <textarea id="inputMessage"  style="width:100%; border:none; outline:none; padding:10px;" rows="5"></textarea>
                  </div>
                  <button type="submit" class="btn btn-primary">Send Message</button>
                </form>
              </div>
              <div class="mt-5" id="excel_data"></div>
            </div>
            <div class="col-sm-2"></div>
          </div>
		    </div>
		</div>
    <script>
      const excel_file = document.getElementById('inputphone');

      excel_file.addEventListener('change', (event) => {

if(!['application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', 'application/vnd.ms-excel'].includes(event.target.files[0].type))
{
    document.getElementById('excel_data').innerHTML = '<div class="alert alert-danger">Only .xlsx or .xls file format are allowed</div>';

    excel_file.value = '';

    return false;
}

var reader = new FileReader();

reader.readAsArrayBuffer(event.target.files[0]);

reader.onload = function(event){

    var data = new Uint8Array(reader.result);

    var work_book = XLSX.read(data, {type:'array'});

    var sheet_name = work_book.SheetNames;

    var sheet_data = XLSX.utils.sheet_to_json(work_book.Sheets[sheet_name[0]], {header:1});

    if(sheet_data.length > 0)
    {
        var table_output = '<table class="table table-striped table-bordered">';

        for(var row = 0; row < sheet_data.length; row++)
        {

            table_output += '<tr>';

            for(var cell = 0; cell < sheet_data[row].length; cell++)
            {

                if(row == 0)
                {
                    table_output += '<th>'+sheet_data[row][cell]+'</th>';

                }
                else
                {

                    table_output += '<td>'+sheet_data[row][cell]+'</td>';

                }

            }

            table_output += '</tr>';

        }

        table_output += '</table>';

        document.getElementById('excel_data').innerHTML = table_output;
    }


}

});
    </script>
<?php include 'components/footer.php'; ?>
		