<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<style>
page {
  background: white;
  display: block;
  margin: 0 auto;
  margin-bottom: 0.5cm;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
}
page[size="A4"] {  
  width: 21cm;
  height: 29.7cm; 
}
page[size="A4"][layout="landscape"] {
  width: 29.7cm;
  height: 19cm;  
}
page[size="A3"] {
  width: 29.7cm;
  height: 42cm;
}
page[size="A3"][layout="landscape"] {
  width: 42cm;
  height: 29.7cm;  
}
page[size="A5"] {
  width: 14.8cm;
  height: 21cm;
}
page[size="A5"][layout="landscape"] {
  width: 21cm;
  height: 14.8cm;  
}
@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
  }
}
</style>
<a href="#"><button type="button" id="Print" class="btn btn-dark m-1">Print me</button></a>

<page size="A4" layout="landscape">
    
  
<div style="width:1063px; height:659px; padding:20px; text-align:center; border: 10px solid #787878" id="example">
    <div  style="width:1014px; 
    height:615px; 
    padding:20px; 
    text-align:center; 
    border: 5px solid #787878;
    background-image:url('https://i.pinimg.com/736x/2d/c5/d0/2dc5d09b11787bae41f7fdb2fd85f7d4.jpg'); 
    background-size: 1049px 646px;   
    background-repeat: no-repeat;
    background-position: center;" >
           <span style="font-size:50px;font-weight:bold;margin-top: 85px;display: inline-block;">Certificate of Completion</span>
           <br><br>
           <span style="font-size:25px"><i>This is to certify that</i></span>
           <br><br>
           <span style="font-size:30px"><b>{{ Auth::user()->name }}</b></span><br/><br/>
           <span style="font-size:25px"><i>has completed the course</i></span> <br/><br/>
           <span style="font-size:30px">Laravel</span> <br/><br/>
           <span style="font-size:20px">with score of <b>{{ Auth::user()->percentage }}0%</b></span> <br/><br/><br/><br/>
           <span style="font-size:25px"><i>dated</i></span><br>
          
          <span style="font-size:30px"> {{date('d-m-Y', strtotime(Auth::user()->created_at )) }}</span>
    </div>
    </div>
</page>
    <script>
    	function printData()
{
   var divToPrint=document.getElementById("example");
   newWin= window.open("");
   newWin.document.write(divToPrint.outerHTML);
   newWin.print();
   newWin.close();
}

$('#Print').on('click',function(){
printData();
})


$('#cmd').click(function() {
  var options = {
  };
  var pdf = new jsPDF('p', 'pt', 'a4');
  pdf.addHTML($("#content"), 15, 15, options, function() {
    pdf.save('pageContent.pdf');
  });
});
    </script>