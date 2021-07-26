<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<style>
    .col-sm-8 {
    margin: 2% 20%;
    padding: 2%;
    background-color : #D6F4F8;
    border-radius: 5px;
  }

  .btn-success{
    margin-left: 80%;
  }

  .first-panel{
      padding: 2%;

  }
  #result-data{
    background-color : #fff;
    padding: 2%;
    border-radius: 5px;
    word-wrap: break-word;
  }

.hidden{
  display: none;
}
#container{
  margin: 1%;
}
</style>

</head>

<body>
    <br>
    <center>
        <h1><b>Substrate Interface</b></h1>
    </center>
    <div class="row">
        <div class="col-sm-8 first-panel">
            <form>
                <div class="alert alert-danger hidden" id="error-msg"></div>
                <div class="form-group">
                    <label for="rpc-method-name">Choose Method</label>
                    <select class="form-control" id="rpc-method-name">
                        <option value="default">Select Method</option>
                        <!-- <option value="system_name">System Name</option> -->
                    </select>
                </div>
                <button type="button" class="btn btn-primary" onclick="addFields();"><i class="fa fa-plus"></i> Add Parameter</button>
                <div id="container">

                </div>
                <button type="button" class="btn btn-success" onclick="callRpcData();">Submit Method</button>
        </div>
        <div class="col-sm-8" id="second-panel">
            <h3>Result</h3>
            <div id="result-data" class="text-success">
            </div>
        </div>
    </div>
    </form>
</body>
<script>
    getAllMethods();

    function callRpcData() {
        var resultData = '';
        var paramsVal = [];
        var methodName = $("#rpc-method-name").val();
        paramsTemp = ($("input[name=param]").val()) ? $("input[name=param]").val() : [];
        paramsVal.push(paramsTemp);
        $.ajax({
            method: "POST",
            url: "{{URL::route('rpcCall')}}",
            data: {
                method_name: methodName,
                params: paramsVal
            },
            success: function(result) {
                var data = JSON.parse(result);
                var obj = data.result;
                if (data.result) {
                    $("#error-msg").addClass('hidden');
                    if (jQuery.type(data.result) === "string") {
                        $("#result-data").text(data.result);
                    } else {

                        for (const [key, value] of Object.entries(obj)) {
                            dataVal = `${value}`.split(',');
                            if (dataVal.length > 1) {
                                resultData = resultData + `${key}` + ' : <br>';
                                jQuery.each(dataVal, function(index, item) {
                                    resultData = resultData + index + ' : ' + item + '<br>';
                                });
                            } else {
                                resultData = resultData + `${key}` + ' : ' + `${value}` + '<br>';
                            }
                        }

                        $("#result-data").html('<p style="color:#000;">-Object</p>' + resultData);
                    }
                } else {
                    $("#error-msg").removeClass('hidden');
                    $("#error-msg").html(data.error.message);

                }
            }
        });
    }

    function getAllMethods() {
        $("#rpc-method-name").html("<option value='default'>Loading...</option>");
        $.ajax({
            method: "POST",
            url: "{{URL::route('rpcCall')}}",
            success: function(result) {

                var data = JSON.parse(result);
                optionData = data.result.methods;
                // console.log(optionData[1]);

                // Add options
                $("#rpc-method-name").html("");
                for (var i in optionData) {
                    $('#rpc-method-name').append('<option value=' + optionData[i] + '>' + optionData[i] + '</option>');
                }

                // $("#rpc-method-name").val(data.result.methods);//this is what you want
            }
        });
    }

    function addFields() {
        var html = '';
        html += '<div class="form-group">';
        html += '<label for="rpc-parameter">Parameter</label>';
        html += '<input type="text" name="param" class="form-control">';
        html += '</div>';

        $('#container').append(html);
    }
</script>

</html>