
function getdata() {
    var data = "";
    $("#form1").serialize();
    $.each($("input, select, textarea"), function(i, v) {
        var theTag = v.tagName;
        var theElement = $(v);
        var theName = theElement.attr('name');
        var theValue = escape(theElement.val());
        var classname = theElement.attr('class');
        //console.log(classname);
        //alert('name : '+theName+"   value :"+theValue+"  class :"+classname);
        if (classname == 'required-text') {
            if (!check_textvalues(theElement)) data = "error";
        }
        if (classname == 'required-number') {
            if (!check_numbers(theElement)) data = "error";
        }
        if (classname == 'required-email') {
            if (!check_email(theElement)) data = "error";
        }
        if (classname == 'not-required-email') {
            if (!check_email(theElement)) data = "error";
        }
        if (classname == 'required-alphanumeric') {
            if (!check_password_aplhanumeric(theElement)) data = "error";
        }
        if (classname == 'required-password') {
            if (!check_password(theElement)) data = "error";
        }
        if (classname == 'required-captcha') {
            if (!check_captcha(theElement)) data = "error";
        }
        
        if (data != 'error') {
            data = data + theName + "=" + theValue + "&";
        }
    });
    
    return data;
}
function getdatamainvalid(formid) {
    var data = "";
    $("#"+formid).serialize();
    $.each($("input, select, textarea"), function(i, v) {
        var theTag = v.tagName;
        var theElement = $(v);
        var theName = theElement.attr('name');
        var theValue = escape(theElement.val());
        var classname = theElement.attr('class');
        //console.log(classname);
        //alert('name : '+theName+"   value :"+theValue+"  class :"+classname);
        if (classname == 'form-control required-text') {
            if (!check_textvalues(theElement)) data = "error";
        }
        if (classname == 'required-number') {
            if (!check_numbers(theElement)) data = "error";
        }
        if (classname == 'required-email') {
            if (!check_email(theElement)) data = "error";
        }
        if (classname == 'not-required-email') {
            if (!check_email(theElement)) data = "error";
        }
        if (classname == 'required-alphanumeric') {
            if (!check_password_aplhanumeric(theElement)) data = "error";
        }
        if (classname == 'required-password') {
            if (!check_password(theElement)) data = "error";
        }
        if (classname == 'required-captcha') {
            if (!check_captcha(theElement)) data = "error";
        }
        console.log('hi---- '+data);
        if (data != 'error') {
            data = data + theName + "=" + theValue + "&";
        }
    });
    if(data =="error"){
        return false;
    }else
    return true;
}

function check_textvalues(formElement) {
  
    if (triminput(formElement.val()) == '') {
        $("#display_message").html('<div class="col-lg-12 alert alert-danger">please Fill All Reqired Fields'  + "</div>");
        $("#display_message").show('fast');
        formElement.focus();
        $("#display_message").click();
        return false;
    } else return true;
}

function check_numbers(formElement) {
    if (triminput(formElement.val()) == '') {
        $("#display_message").html('<div class="alert alert-error">please enter number for : ' + formElement.attr('title') + "</div>");
        $("#display_message").show('fast');
        formElement.focus();
        $("#display_message").click();
        return false;
    }
    if (isNaN(formElement.val())) {
        $("#display_message").html('<div class="alert alert-error">please enter number for : ' + formElement.attr('title') + "</div>");
        $("#display_message").show('fast');
        formElement.focus();
        $("#display_message").click();
        return false;
    } else return true;
}

function check_email(formElement) {
    var emails = formElement.val();
    emailRegEx = /^[^@]+@[^@]+.[a-z]{2,}$/i;
    if (emails == "") return true;
    if ((formElement.val()).search(emailRegEx) == -1) {
        $("#display_message").html('<div class="alert alert-error">please enter valid email for : ' + formElement.attr('title') + "</div>");
        $("#display_message").show('fast');
        formElement.focus();
        $("#display_message").click();
        return false;
    } else return true;
}

function check_password_aplhanumeric(formElement) {
    var f1 = /[A-Z]/
    var f2 = /[a-z]/
    var f3 = /[0-9]/

    if ((f1.test(formElement.val()) || f2.test(formElement.val())) && f3.test(formElement.val())) {
        //alert('passed');
        return true;
    } else {
        $("#display_message").html('<div class="alert alert-error">please enter alphanumeric as password</div>');
        $("#display_message").show('fast');
        //alert('failed');
        formElement.focus();
        $("#display_message").click();
        return false;
    }

}

function check_password(formElement) {
    var password = formElement.val();
    var errorval = '';
    var passed = validatePassword(password, {
        length: [6, 8],
        lower: 0,
        upper: 0,
        numeric: 0,
        special: 0,
        badWords: ["password", "steven", "levithan"],
        badSequenceLength: 4
    });
    if ((!chkpassword()) || (!passed)) {
        $("#display_message").html(errorval);
        $("#display_message").show('fast');
        //alert('failed');
        formElement.focus();
        $("#display_message").click();
        return false;
    }
}

function triminput(inputString) {
    var removeChar = ' ';
    var returnString = inputString;

    if (removeChar.length) {
        while ('' + returnString.charAt(0) == removeChar) {
            returnString = returnString.substring(1, returnString.length);
        }

        while ('' + returnString.charAt(returnString.length - 1) == removeChar)

        {

            returnString = returnString.substring(0, returnString.length - 1);

        }

    }

    return returnString;
}

function checkOption(obj) {
    if (obj.checked) {
        obj.value = '1';
    } else {
        obj.value = '0';
        obj.checked = false;
        //alert(obj.value);
    }
}

function ttoggleOption() {
    $.each($('input:checkbox'), function(i, v) {
        if ($(this).is(':checked')) {
            $(this).val('1');
        } else {
            $(this).val('0');
        }
    });
}

function callpagepost(str, divid) {
     var data = getdata();

    if (data != 'error') {
        //$("#display_message").ajaxStart(function(){
        $.blockUI({ message: '<img src="assets/img/loading.gif" alt=""/><br />processing request please wait . . .' });
     
        if (str != '#') {
            //trapSession();


            $.blockUI({ message: '<img src="assets/img/loading.gif" alt=""/>&nbsp;&nbsp;loading please wait . . .' });
            //$("#display_message").html('<img src="images/loading.gif" alt="" />loading please wait . . .');

            $.ajax({
                type: "POST",
                url: str,
                data: data,
                success: function(msg) {
                    //alert( "Data Saved: " + msg );
                    //alert(msg);



                    $('#' + divid).html(msg);
                    $.unblockUI();
                    //$("#display_message").html("");
                }
            });
            /*
             $(divid).ajaxComplete(function(){
            	$(divid).html("");
             });
            */
        } // end if


    }

}
function goToUrlform(str, divid,formid,formid2) {
   
    if (str != '#') {
        $.blockUI({ message:'<img src="assets/img/loading.gif" alt=""/>&nbsp;&nbsp;loading please wait . . .'});
        //$("#display_message").html('<img src="images/loading.gif" alt="" />loading please wait . . .');

        $.ajax({
            type: "POST",
            url: str,
            data: '',
            //timeout:1000,
            error: function(x, t, m) {
                // $.unblockUI();
                $.blockUI({ message: 'Error Loading Page' });
                setTimeout(function() { $.unblockUI() }, 1000);
            },
            success: function(msg) {
                //alert( "Data Saved: " + msg );
                console.log(formid);
                 $('#'+formid).show();
                  $('#'+formid2).hide();
                $('#' + divid).html(msg).animate();
                 $.unblockUI();
                  $('#'+formid).show();
                   $('#'+formid2).hide();
                //$("#display_message").html("");
            }
        });
       
    } // end if
}
function goToUrl(str, divid) {
    
    if (str != '#') {
        $.blockUI({ message:'<img src="assets/img/loading.gif" alt=""/>&nbsp;&nbsp;loading please wait . . .'});
        //$("#display_message").html('<img src="images/loading.gif" alt="" />loading please wait . . .');

        $.ajax({
            type: "POST",
            url: str,
            data: '',
            //timeout:1000,
            error: function(x, t, m) {
                // $.unblockUI();
                $.blockUI({ message: 'Error Loading Page' });
                setTimeout(function() { $.unblockUI() }, 1000);
            },
            success: function(msg) {
                //alert( "Data Saved: " + msg );
                //alert(msg);
                $('#' + divid).html(msg).animate();
                 $.unblockUI();
                //$("#display_message").html("");
            }
        });
        /*
         $(divid).ajaxComplete(function(){
        	$(divid).html("");
         });
        */
    } // end if
}

function refreshpage(url) {
    //alert('Got here');
    //$("#form1").submit();
    var data = getdata();
    //alert("@ Search : "+data);
    //console.log("here");
    //loadpage('branch_list.php',data,'page');
    goToUrl(url + '?' + data, 'location');
    
}
function refreshform(url,formid,formid2) {
    //alert('Got here');
    //$("#form1").submit();
    var data = getdata();
    //alert("@ Search : "+data);
   
    //loadpage('branch_list.php',data,'page');
    goToUrlform(url + '?' + data, 'location',formid,formid2);
    
}
function refresh1(url, divid) {
    //alert('Got here');
    //$("#form1").submit();
    var data = getdata();
    //alert("@ Search : "+data);
    //loadpage('branch_list.php',data,'page');
    goToUrl(url + '?' + data, divid);
}


function doClickAll(form) {
    var form = document.getElementById("form1");
    for (var i = 0; i < form.elements.length; i++) {
        if (form.elements[i].type == "checkbox") {
            if (!form.elements[i].checked) {
                form.elements[i].click();
            }
        }
    }
    return true;
}

function doUnClickAll(form) {
    for (var i = 0; i < form.elements.length; i++) {
        if (form.elements[i].type == "checkbox") {
            if (form.elements[i].checked) {
                form.elements[i].checked = false;
            }
        }
    }
    return true;
}


function checkSelected(form, url) {
    //var form = document.forms[0];
    var parString = "";
    var delcount = 0;
    for (var i = 0; i < form.elements.length; ++i)
        if (form.elements[i].type == "checkbox" & form.elements[i].name == 'chkopt')
            if (form.elements[i].checked == true) {
                delcount++;
                parString = parString + "-" + form.elements[i].value + "-, ";
            }

    if (parString == "") {
        window.alert("Select record(s) to continue...");
        return (false);
    } else {
        //delcount = delcount - 1;
        form.var1.value = parString;
        form.op.value = 'del';
        ans = window.confirm("You have selected " + delcount + " record(s), Are your sure ?")
        if (ans == 1) {
            refreshpage(url);
            return false;
        } else return false;
    }
}

function checkSelected1(form, url, divid) {
    //var form = document.forms[0];
    var parString = "";
    var delcount = 0;
    for (var i = 0; i < form.elements.length; ++i)
        if (form.elements[i].type == "checkbox" & form.elements[i].name == 'chkopt')
            if (form.elements[i].checked == true) {
                delcount++;
                parString = parString + "-" + form.elements[i].value + "-, ";
            }

    if (parString == "") {
        window.alert("Check Friend(s) to continue...");
        return (false);
    } else {
        //delcount = delcount - 1;
        form.var1.value = parString;
        form.op.value = 'del';
        ans = window.confirm("You have selected " + delcount + " Friend(s), Are your sure ?")
        if (ans == 1) {
            refresh1(url, divid);
            return false;
        } else return false;
    }
}

function printDiv(seldiv) {
    var divToPrint = document.getElementById(seldiv);
    var newWin = window.open();
    newWin.document.open();
    newWin.document.write('<html><link rel="stylesheet" type="text/css" href="css/merchant.css"><body>' + divToPrint.innerHTML + '</body></html>');
    newWin.document.close();
    //setTimeout(function(){newWin.close();},20);
}

function printReceipt(seldiv) {
    var divToPrint = document.getElementById(seldiv);
    var newWin = window.open();
    /*newWin.document.open();*/
    newWin.document.write('<html><link rel="stylesheet" type="text/css" href="css/style.css"><body onload="window.print()">' + divToPrint.innerHTML + '</body></html>');
    newWin.document.close();
    //setTimeout(function(){newWin.close();},20);
}


function blockUIDiv(divid) {
    //$('#'+divid).click(function() {
    $.blockUI({ message: $('#' + divid) });

    //setTimeout($.unblockUI, 2000);
    //});
}

function calldialog(divid) {
    //$('#'+divid).dialog();
    $.blockUI({ message: $('#' + divid) });
    setTimeout($.unblockUI, 2000);
}



function Resize(imgId, division_1, division_2) {
    var img = document.getElementById(imgId);
    var w = img.width,
        h = img.height;
    w /= division_1;
    h /= division_2;
    img.width = w;
    img.height = h;
}


function selectalllist(list) {
    $("#" + list + " *").attr("selected", "selected");
}
/////////////////

function pageloader(str, divid) {
    var data = getdata();
    //alert(data);
    if (data != 'error') {
        $.ajax({
            type: "POST",
            url: str,
            data: data,
            success: function(msg) {
                //alert( "Data Saved: " + msg );
                //alert(msg);
                $('#' + divid).html(msg);
                //$("#display_message").fadeIn("slow");
            }
        });
    }
}

function validatePassword(pw, options) {
    // default options (allows any password)
    var o = {
        lower: 0,
        upper: 0,
        alpha: 0,
        /* lower + upper */
        numeric: 0,
        special: 0,
        length: [0, Infinity],
        custom: [ /* regexes and/or functions */ ],
        badWords: [],
        badSequenceLength: 0,
        noQwertySequences: false,
        noSequential: false
    };

    for (var property in options)
        o[property] = options[property];

    var re = {
            lower: /[a-z]/g,
            upper: /[A-Z]/g,
            alpha: /[A-Z]/gi,
            numeric: /[0-9]/g,
            special: /[\W_]/g
        },
        rule, i;

    // enforce min/max length
    if (pw.length < o.length[0] || pw.length > o.length[1])
        errorval = 'Password Minimum Length is ' + o.length[0] + ' While Maximum Lenght Should not exceed ' + o.length[1];
    return false;

    // enforce lower/upper/alpha/numeric/special rules
    for (rule in re) {
        if ((pw.match(re[rule]) || []).length < o[rule])
            errorval = 'Password Should contain lower/upper/alpha/numeric/';
        return false;
    }

    // enforce word ban (case insensitive)
    for (i = 0; i < o.badWords.length; i++) {
        if (pw.toLowerCase().indexOf(o.badWords[i].toLowerCase()) > -1)

            return false;
    }

    // enforce the no sequential, identical characters rule
    if (o.noSequential && /([\S\s])\1/.test(pw))
        return false;

    // enforce alphanumeric/qwerty sequence ban rules
    if (o.badSequenceLength) {
        var lower = "abcdefghijklmnopqrstuvwxyz",
            upper = lower.toUpperCase(),
            numbers = "0123456789",
            qwerty = "qwertyuiopasdfghjklzxcvbnm",
            start = o.badSequenceLength - 1,
            seq = "_" + pw.slice(0, start);
        for (i = start; i < pw.length; i++) {
            seq = seq.slice(1) + pw.charAt(i);
            if (
                lower.indexOf(seq) > -1 ||
                upper.indexOf(seq) > -1 ||
                numbers.indexOf(seq) > -1 ||
                (o.noQwertySequences && qwerty.indexOf(seq) > -1)
            ) {
                return false;
            }
        }
    }

    // enforce custom regex/function rules
    for (i = 0; i < o.custom.length; i++) {
        rule = o.custom[i];
        if (rule instanceof RegExp) {
            if (!rule.test(pw))
                return false;
        } else if (rule instanceof Function) {
            if (!rule(pw))
                return false;
        }
    }

    // great success!
    return true;
}


function callresponse(returnpage, divid, msg) {
    var resp = msg.split("/");
    if (resp[1] == '1') {
        $("#display_message").html(resp[0]);
        $("#display_message").show("fast");
        $.unblockUI();
        doSubmit(returnpage, divid);
    } else {
        $("#display_message").html(resp[0]);
        $("#display_message").show("fast");
        $.unblockUI();
    }
}

function doSubmit(url, pgdiv) {
    //alert('Got here');
    //$("#form1").submit();
    var data = getdata();
    //alert("@ Search : "+data);
    //loadpage('branch_list.php',data,'page');
    goToUrl(url + '?' + data, pgdiv);
}


function getDatta(str) {
    var data = "";
    $("#" + str).serialize();
    $.each($("input, select, textarea"), function(i, v) {
        var theTag = v.tagName;
        var theElement = $(v);
        var theName = theElement.attr('name');
        var theValue = escape(theElement.val());
        var classname = theElement.attr('class');
        //alert('name : '+theName+"   value :"+theValue+"  class :"+classname);
        if (classname == 'required-text') {
            if (!check_textvalues(theElement)) data = "error";
        }
        if (classname == 'required-number') {
            if (!check_numbers(theElement)) data = "error";
        }
        if (classname == 'required-email') {
            if (!check_email(theElement)) data = "error";
        }
        if (classname == 'not-required-email') {
            if (!check_email(theElement)) data = "error";
        }
        if (classname == 'required-alphanumeric') {
            if (!check_password_aplhanumeric(theElement)) data = "error";
        }
        if (classname == 'required-password') {
            if (!check_password(theElement)) data = "error";
        }
        if (classname == 'required-captcha') {
            if (!check_captcha(theElement)) data = "error";
        }
        if (data != 'error') {
            data = data + theName + "=" + theValue + "&";
        }else{
        data =data;    
        }
    });
    //alert(data);
    console.log("hello akor");
    console.log(data);
    if(data =="error")
        {return false; }else{ 
    return true;
}
}


function getDatta(str) {
    var data = "";
    $("#" + str).serialize();
    $.each($("input, select, textarea"), function(i, v) {
        var theTag = v.tagName;
        var theElement = $(v);
        var theName = theElement.attr('name');
        var theValue = escape(theElement.val());
        var classname = theElement.attr('class');
        //alert('name : '+theName+"   value :"+theValue+"  class :"+classname);
        if (classname == 'required-text') {
            if (!check_textvalues(theElement)) data = "error";
        }
        if (classname == 'required-number') {
            if (!check_numbers(theElement)) data = "error";
        }
        if (classname == 'required-email') {
            if (!check_email(theElement)) data = "error";
        }
        if (classname == 'not-required-email') {
            if (!check_email(theElement)) data = "error";
        }
        if (classname == 'required-alphanumeric') {
            if (!check_password_aplhanumeric(theElement)) data = "error";
        }
        if (classname == 'required-password') {
            if (!check_password(theElement)) data = "error";
        }
        if (classname == 'required-captcha') {
            if (!check_captcha(theElement)) data = "error";
        }
        if (data != 'error') {
            data = data + theName + "=" + theValue + "&";
        }
    });
    //alert(data);
    return data;
}


