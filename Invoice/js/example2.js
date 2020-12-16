function print_today() {
    // ***********************************************
    // AUTHOR: WWW.CGISCRIPT.NET, LLC
    // URL: http://www.cgiscript.net
    // Use the script, just leave this message intact.
    // Download your FREE CGI/Perl Scripts today!
    // ( http://www.cgiscript.net/scripts.htm )
    // ***********************************************
    var now = new Date();
    var months = new Array('January','February','March','April','May','June','July','August','September','October','November','December');
    var date = ((now.getDate()<10) ? "0" : "")+ now.getDate();
    function fourdigits(number) {
      return (number < 1000) ? number + 1900 : number;
    }
    var today =  months[now.getMonth()] + " " + date + ", " + (fourdigits(now.getYear()));
    return today;
  }
  
  // from http://www.mediacollege.com/internet/javascript/number/round.html
  function roundNumber(number,decimals) {
    var newString;// The new rounded number
    decimals = Number(decimals);
    if (decimals < 1) {
      newString = (Math.round(number)).toString();
    } else {
      var numString = number.toString();
      if (numString.lastIndexOf(".") == -1) {// If there is no decimal point
        numString += ".";// give it one at the end
      }
      var cutoff = numString.lastIndexOf(".") + decimals;// The point at which to truncate the number
      var d1 = Number(numString.substring(cutoff,cutoff+1));// The value of the last decimal place that we'll end up with
      var d2 = Number(numString.substring(cutoff+1,cutoff+2));// The next decimal, after the last one we want
      if (d2 >= 5) {// Do we need to round up at all? If not, the string will just be truncated
        if (d1 == 9 && cutoff > 0) {// If the last digit is 9, find a new cutoff point
          while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
            if (d1 != ".") {
              cutoff -= 1;
              d1 = Number(numString.substring(cutoff,cutoff+1));
            } else {
              cutoff -= 1;
            }
          }
        }
        d1 += 1;
      } 
      if (d1 == 10) {
        numString = numString.substring(0, numString.lastIndexOf("."));
        var roundedNum = Number(numString) + 1;
        newString = roundedNum.toString() + '.';
      } else {
        newString = numString.substring(0,cutoff) + d1.toString();
      }
    }
    if (newString.lastIndexOf(".") == -1) {// Do this again, to the new string
      newString += ".";
    }
    var decs = (newString.substring(newString.lastIndexOf(".")+1)).length;
    for(var i=0;i<decimals-decs;i++) newString += "0";
    //var newNumber = Number(newString);// make it a number if you like
    return newString; // Output the result to the form field (change for your purposes)
  }
  
  function update_total() {
    var total = 0;
    var total_tax = 0;
    $('.price').each(function(i){
      price = $(this).html().replace("$","");
      if (!isNaN(price)) total += Number(price);
    });
  
    $('.tax').each(function(i){
      tax = $(this).html().replace("$","");
      var quantity = $(".qty").val();
      tax = tax * quantity;
      if (!isNaN(tax)) total_tax += Number(tax);
    });
  
    total_tax = roundNumber(total_tax,2);
    total = roundNumber(total,2);
    
  
    $('#taxtotal').html(total_tax);
    $('#total').html(+total);
    
    update_balance();
  }
  
  function update_balance() {
    var due = $("#total").html().replace("$","") - $("#paid").val().replace("$","");
    due = roundNumber(due,2);
    
    $('.due').html(due);
  }
  
  function update_price() {
    var row = $(this).parents('.item-row');
    var tax = row.find('.cost').val().replace("$","") * row.find('.qty').val() * 0.14;
    var unit_tax = row.find('.cost').val().replace("$","") * 0.14;
    var price = row.find('.cost').val().replace("$","") * row.find('.qty').val() + tax;
    var cost = row.find('.cost').val().replace("$","");
    tax = roundNumber(tax,2);
    unit_tax = roundNumber(unit_tax,2);
    price = roundNumber(price,2);
    isNaN(unit_tax) ? row.find('.tax').html("N/A") : row.find('.tax').html(unit_tax);
    isNaN(price) ? row.find('.price').html("N/A") : row.find('.price').html(price);
    isNaN(cost) ? $('#sutotal').html("N/A") : $('#subtotal').html(cost);
    update_total();
  }
  
  function bind() {
    $(".cost").blur(update_price);
    $(".qty").blur(update_price);
    $(".tax").blur(update_price);
  }
  
  $(document).ready(function() {
  
    $('input').click(function(){
      $(this).select();
    });
  
    $("#paid").blur(update_balance);
     
    $("#addrow").click(function(){
      $(".item-row:last").after('<tr class="item-row"><td class="description"><div class="delete-wpr"><textarea>New online digital Speed governor (Certificate Renewal) &#13;&#10; Data (Transmission NTSA) &#13;&#10;Server Maintenance &#13;&#10; Administrative costs &#13;&#10; Administrative costs &#13;&#10; KBF 496N</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td><td><textarea class="cost">5000</textarea></td><td><textarea class="qty">1</textarea></td><td><textarea class="tax">700</textarea></td><td><span class="price">5700</span></td></tr>');
      if ($(".delete").length > 0) $(".delete").show();
      bind();
    });
    
    bind();
    
    $(".delete").live('click',function(){
      $(this).parents('.item-row').remove();
      update_total();
      if ($(".delete").length < 2) $(".delete").hide();
    });
    
    $("#cancel-logo").click(function(){
      $("#logo").removeClass('edit');
    });
    $("#delete-logo").click(function(){
      $("#logo").remove();
    });
    $("#change-logo").click(function(){
      $("#logo").addClass('edit');
      $("#imageloc").val($("#image").attr('src'));
      $("#image").select();
    });
    $("#save-logo").click(function(){
      $("#image").attr('src',$("#imageloc").val());
      $("#logo").removeClass('edit');
    });
    
    $("#date").val(print_today());
    
  });