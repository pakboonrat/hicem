<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<title>Register new user</title>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<link href="style/top.css" rel="stylesheet" type="text/css" />
<link href="style/menu.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="lib/prototype.js"></script>
</script>
<style type="text/css">
<!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
}
#submitholder {    color: #000000;
}
-->
</style>

<script type="text/javascript">
<!--
window.onload = function(){

	//Event.observe("login","blur",checkUser);
	Event.observe("password","blur",checkPass);
	Event.observe("repassword","blur",recheckPass);
	$('login').focus();
	}

 function checkUser(event) {
  var user = Event.element(event).id.value;
  	alert(user);
    new Ajax.Request( "checkUser.php",
               { method: "GET",
 		         parameters: $('adduser').serialize(true),
                 onComplete: showMsg
		   }
   );
}

function showMsg(result) {
    $("erruser").innerHTML= result.responseText;
 }

function checkPass(event) {
  var pass = Event.element(event).value;
  var repass = $F("repassword");
  	 if(pass.length < 4) {
	     	$("errpass").innerHTML= "<div id='Rowform'><div  id='errormsg'>Passwords must be at least 4 characters long. <br>Please choose another (longer) password.</div></div>";
       }else{
	   		if(pass != repass){
				$("errpass").innerHTML = "<div id='Rowform'><div  id='errormsg'>Passwords do not match. <br>Please go back and correct.</div></div>"
			}else{
	     		$("errpass").innerHTML= "<div id='RowTiltle'>&nbsp;</div>";
			}
	  }
}

function recheckPass(event) {
  var repass = Event.element(event).value;

  var pass = $F("password");
  	 if(pass != repass ) {
	     	$("errpass").innerHTML= "<div id='Rowform'><div id='errormsg'>Passwords do not match.<br> Please go back and correct.</div></div>";
       }else{
	   		if(repass.length < 4){
				$("errpass").innerHTML = "<div id='Rowform'><div  id='errormsg'>Passwords must be at least 4 characters long.<br> Please choose another (longer) password.</div>"
			}else{
	     		$("errpass").innerHTML= "<div id='RowTiltle'>&nbsp;</div>ok!";
			}
	  }
}


function startRequest(){
	var pass=$F("password");
	if(pass.length <4 ){
		$("errpass").innerHTML = "Passwords must be at least 4 characters long. Please choose another (longer) password.";
	}else{
		var pForm = document.forms[1];
		new Ajax.Request(pForm.action,
			{method:"POST", parameters:$("adduser").serialize(true),
				onComplete: saveResult}
				);

	}
}

	function saveResult(result){
		$("info").innerHTML = result.responseTest;
	}


//-->
</script>

<script type="text/javascript">
	var problemArray = new Array();

function dispSubmit(field,action){
    if(problemArray.length != 0){
        for(var i = 0; i < problemArray.length; i++){
            if(problemArray[i] == field){
                place = i;
                break;
            }else{
                place = -12;
            }
        }
    }else{
        place = -50;
    }
    if(action == "add" && place < 0){
        problemArray.splice(problemArray.length,0,field);
    }else if(action == "remove" && place >= 0){
        problemArray.splice(place,1);
    }
     <!--DISPLAY ERROR OR SUBMIT BUTTION-->
     if(problemArray.length != 0){
        document.getElementById('submitholder').innerHTML = ' <input type="submit" name="Submit" id="Submit" value="Submit"  disabled="disabled"/><input type="reset" name="Reset" id="Reset" value="Reset"  disabled="disabled"/> <br><span class="redStar">*  Please enter with one or more of your fields </span>';
    }else{
        document.getElementById('submitholder').innerHTML = '<input type="submit" name="Submit" id="Submit" value="Submit" /><input type="reset" name="Reset" id="Reset" value="Reset"  />';
    }
}


<!--TRIM ALL LEADING AND FOLLOWING WHITESPACE IN A STRING-->
function trimString (str) {
  return str.replace(/^s+/g, '').replace(/s+$/g, '');
}

<!--HIGHLIGHT EMPTY FIELDS THAT ARE REQUIRED-->
function hiliteRequired(startValFROM,place){
    <!--DEFINE THE ID S OF THE REQUIRED FIELDS-->
    var requiredFields = new Array()
        requiredFields[0] = "loginfield"
        requiredFields[1] = "passwordfield"
        requiredFields[2] = "repasswordfield"
        requiredFields[3] = "emailfield"
		requiredFields[4] = "namefield"
		requiredFields[5] = "lnamefield"
		requiredFields[6] = "id_nofield"
		requiredFields[7] = "addressfield"
		requiredFields[7] = "addressfield"
        requiredFields[8] = "provincefield"
		requiredFields[9] = "postalfield"
		requiredFields[10] = "telfield"
		requiredFields[11] = "mobilefield"


    var pos = requiredFields.length;
	//alert('startValFROM=>'+ startValFROM +',place => ' +place);
    for(var i = 0; i < requiredFields.length; i++){
        if(requiredFields[i] == startValFROM){
            pos = i;
        }else{
            if (pos > place){
                pos = place;
            }else{
                pos = pos;
            }
        }
    }
    <!--HIGHLIGHT EMPTY FIELDS-->
    for(var x = 0; x < pos; x++){
        if(trimString(document.getElementById(requiredFields[x]).value) == ""){
            document.getElementById(requiredFields[x]).className = 'skipped';
			//alert('set skip');
            dispSubmit(requiredFields[x],'add');
        }else if(document.getElementById(requiredFields[x]).className != "error"){
            document.getElementById(requiredFields[x]).className = 'noclass';
			//alert('set no class');
            dispSubmit(requiredFields[x],'remove');
        }
    }
    <!--FIX FOR IF THE USER WERE TO NAVIGATE THE FORM IN REVERSE-->
    for(var y = 0; y < requiredFields.length; y++){
        if(trimString (document.getElementById(requiredFields[y]).value) != "" && document.getElementById(requiredFields[y]).className != "error"){
            document.getElementById(requiredFields[y]).className = 'noclass';
            dispSubmit(requiredFields[y],'remove');
        }
    }
}


<!--AJAX-->
function createRequestObject() {
    var ro;
    var browser = navigator.appName;
    if(browser == "Microsoft Internet Explorer"){
        ro = new ActiveXObject("Microsoft.XMLHTTP");
    }else{
        ro = new XMLHttpRequest();
    }
    return ro;
}

var http = createRequestObject();

function validateForm(txtfield){
   var url = 'register_sql.php?field=';
    var url2;
    var username = document.getElementById('loginfield').value;
    var email = document.getElementById('emailfield').value;

	//alert('username = '+username);

    if (txtfield == "loginfield"){
        url2 = txtfield+unescape("%26loginfield=")+username;
    }else if(txtfield == "emailfield"){
        url2 = txtfield+unescape("%26emailfield=")+email;
    }

    url += url2;
	//alert('url => '+url);
    http.open('get', url);
    http.onreadystatechange = handleResponse;
    http.send(null);
}

function handleResponse() {
    if(http.readyState == 4){
        var response = http.responseText;
        var UPDATE = new Array();
        <!--LOOP THROUGH THE RESPONSES-->
        if(response.indexOf('|' != -1)) {
            UPDATE = response.split('|');
			//UPDATE[1] = trim(UPDATE[1]);
			//alert('UPDATE 1 >> ' + UPDATE[1]);
            if( UPDATE[1] != "!error"){
				//alert('set qerror ,  d0=>=' + UPDATE[1] +'=ddd1=>' + UPDATE[1]);
                document.getElementById(UPDATE[0]).className = 'error';
				//alert('ddd=>' + UPDATE[1]);
				//alert( 'value ='+document.getElementById(UPDATE[0]).className.value );
                document.getElementById(UPDATE[0]+'_container').innerHTML = UPDATE[1];
                dispSubmit(UPDATE[0],'add');
            }else if(UPDATE[1] == '!error'){
				//alert('2set error , 2ddd=>' + UPDATE[1]);

                if(document.getElementById(UPDATE[0]).className != 'skipped'){
                    document.getElementById(UPDATE[0]).className = 'noclass';
                }
                document.getElementById(UPDATE[0]+'_container').innerHTML = "";
                if(trimString(document.getElementById(UPDATE[0]+'_container').value) != ""){
                    dispSubmit(UPDATE[0],'remove');
                }else {
					dispSubmit(UPDATE[0],'add');
				}

            }

			//alert('free ,  G0=>=' + UPDATE[1] +'=G1=>' + UPDATE[1]);
        }
    }
}
<!--END AJAX-->


</script>
<link href="style/form.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<table width="1000" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td class="toptable">
    <? include'header.php'; ?>
    <div id="clearDiv"></div>


    <div id="topMid">
    <div id="picContainer">

      <div id="MiddleFlash"></div>
    </div>
    </div>
    <div id="clearDiv"></div>

		<div class="container">
			<div class="row">
				<div class="col-md-offset-3">
					<h3>Sign up</h3>
				</div>
				<div class="col-xs-8 col-md-offset-3">
					<form class="form-horizontal" role="form">
						<h4>Create Hicem ID</h4>
						<div class="form-group">
							<label for="txt_id" class="col-sm-3 control-label"> Hicem ID *</label>
							<div class="col-sm-5">
								<input type="text" id="hicem_id" placeholder="Username">
							</div>
						</div>
						<div class="form-group">
							<label for="txt_id" class="col-sm-3 control-label"> Password *</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" id="txt_password" placeholder="Password">
							</div>
						</div>

						<div class="form-group">
							<label for="txt_id" class="col-sm-3 control-label">Re Password *</label>
							<div class="col-sm-5">
								<input type="password" class="form-control" id="txt_re_password" placeholder="Password again">
							</div>
						</div>

						<div class="form-group">
							<label for="txt_email" class="col-sm-3 control-label">Email *</label>
							<div class="col-sm-5">
								<input type="email" class="form-control" id="txt_email" placeholder="Email">
							</div>
						</div>

						<div class="form-group">

							<div class="col-sm-5">
								<button type="submit" class="btn btn-default">Sign in</button>
							</div>
						</div>

					</form>
				</div>
			</div>
		</div>


    <table width="100%" border="0" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
      <tr>
        <td width="204" valign="top"><div></div>
            <br />
            <div id="clearDiv">
            <br />
            <br /></td>
        <td width="600" align="left" valign="top">
					<form id="adduser" name="adduser" method="post" action="register_login2.php" onsubmit="startRequest(); return false">
          <br />
          <ul  id="menulevel1">
  <li><a href="register.php" id="subcurrent">Sign up for Hicem account </a></li></ul><br />
          <div id="commentTxt">*Required fields<br />
          <? if($_GET['error']=='nofill'){  ?>
          <div style="color:#FF0000; font-weight:bold;">Please fill</div>
          <? } ?>
            <div id="splite">Create Hicem ID</div>
            <div style="height:150px; width:700px;">
              <div id="RowBox">
                <div id="Rowform">
                  <div id="RowTiltle"><span class="redStar">*</span> Hicem ID</div>
                  <div>
                    <input name="login" type="text"   id="loginfield" onblur="validateForm('loginfield');" onfocus="hiliteRequired('loginfield')" />
                  </div>
                </div>
                <div> </div>
                <div id="clearDiv2"></div>
                <div id="Rowform">
                  <div id="RowTiltle"><span class="redStar">*</span> Password</div>
                  <div>
                    <input name="password" type="password" id="passwordfield"  onblur="validateForm('passwordfield');"  onfocus="hiliteRequired('passwordfield')"  />
                  </div>
                </div>
                <div id="Rowform">
                  <div id="RowTiltle"><span class="redStar">*</span> Re-Password</div>
                  <div>
                    <input name="repassword" type="password"  id="repasswordfield"  onblur="validateForm('repasswordfield');"  onfocus="hiliteRequired('repasswordfield')"  />
                  </div>
                </div>
                <div id="clearDiv2"></div>
                <div id="Rowform">
                  <div id="RowTiltle"><span class="redStar">*</span> Email</div>
                  <div>
                    <input name="email" type="text"   id="emailfield"  onblur="validateForm('emailfield');"  onfocus="hiliteRequired('emailfield')"  />
                  </div>
                </div>
                <div id="Rowform">
                  <div id="RowTiltle"></div>
                  <div><span id="info"></span></div>
                </div>
              </div>
              <div id="RowBox2">
                <div id="loginfield_container"></div>
                <div id="erruser"></div>
                <div id="errpass"></div>
                <div id="emailfield_container"></div>
              </div>

            </div>
          </div>
          <div  style="text-align:left;">
            <div id="splite">Personal Information</div>
            <div  style="height:300px;">
              <div id="RowBox" style="width:450px;">
                <div id="Rowform">
                  <div id="RowTiltle"><span class="redStar">*</span> First name</div>
                  <div>
                    <input name="name" type="text"  id="namefield"  onblur="validateForm('namefield');"  onfocus="hiliteRequired('namefield')"  />
                  </div>
                </div>
                <div id="Rowform">
                  <div id="RowTiltle"><span class="redStar">*</span> Lastname</div>
                  <div>
                    <input name="lname" type="text"  id="lnamefield"  onblur="validateForm('lnamefield');"  onfocus="hiliteRequired('lnamefield')"  />
                  </div>
                </div>
                <div id="Rowform" style="height:45px;">
                  <div id="RowTiltle"><span class="redStar">*</span> Identification /<br />
                    Passport number</div>
                  <div>
                    <input name="id_no" type="text" maxlength="13"  id="id_nofield"  onblur="validateForm('id_nofield');"  onfocus="hiliteRequired('id_nofield')"  />
                  </div>
                </div>
                <div id="Rowform" style="width:550px;">
                  <div id="RowTiltle"><span class="redStar">*</span> Date of birth</div>
                  <div>
                    <select name="ddDay"  tabindex="16" class="fontDefault"  id="ddDayfield"  onblur="validateForm('ddDayfield');"  onfocus="hiliteRequired('ddDayfield',7)" >
                      <option selected="selected" value="-1">Day</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                      <option value="7">7</option>
                      <option value="8">8</option>
                      <option value="9">9</option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                      <option value="13">13</option>
                      <option value="14">14</option>
                      <option value="15">15</option>
                      <option value="16">16</option>
                      <option value="17">17</option>
                      <option value="18">18</option>
                      <option value="19">19</option>
                      <option value="20">20</option>
                      <option value="21">21</option>
                      <option value="22">22</option>
                      <option value="23">23</option>
                      <option value="24">24</option>
                      <option value="25">25</option>
                      <option value="26">26</option>
                      <option value="27">27</option>
                      <option value="28">28</option>
                      <option value="29">29</option>
                      <option value="30">30</option>
                      <option value="31">31</option>
                    </select>
                    -
                    <select name="ddMonth"  tabindex="17" class="fontDefault"  id="ddMonthfield"  onblur="validateForm('ddMonthfield');"  onfocus="hiliteRequired('ddMonthfield',8)" >
                      <option selected="selected" value="-1">Month</option>
                      <option value="01">January</option>
                      <option value="02">Febuary</option>
                      <option value="03">March</option>
                      <option value="04">April</option>
                      <option value="05">May</option>
                      <option value="06">June</option>
                      <option value="07">July</option>
                      <option value="08">August</option>
                      <option value="09">September</option>
                      <option value="10">Octuber</option>
                      <option value="11">November</option>
                      <option value="12">December</option>
                    </select>
                    -
                    <select name="ddYear"  tabindex="18" class="fontDefault"   id="ddYearfield"  onblur="validateForm('ddYearfield');"  onfocus="hiliteRequired('ddYearfield',9)" >
                      <option value="-1" selected="selected">Year</option>
                      <option value="2008">2551</option>
                      <option value="2007">2550</option>
                      <option value="2006">2549</option>
                      <option value="2005">2548</option>
                      <option value="2004">2547</option>
                      <option value="2003">2546</option>
                      <option value="2002">2545</option>
                      <option value="2001">2544</option>
                      <option value="2000">2543</option>
                      <option value="1999">2542</option>
                      <option value="1998">2541</option>
                      <option value="1997">2540</option>
                      <option value="1996">2539</option>
                      <option value="1995">2538</option>
                      <option value="1994">2537</option>
                      <option value="1993">2536</option>
                      <option value="1992">2535</option>
                      <option value="1991">2534</option>
                      <option value="1990">2533</option>
                      <option value="1989">2532</option>
                      <option value="1988">2531</option>
                      <option value="1987">2530</option>
                      <option value="1986">2529</option>
                      <option value="1985">2528</option>
                      <option value="1984">2527</option>
                      <option value="1983">2526</option>
                      <option value="1982">2525</option>
                      <option value="1981">2524</option>
                      <option value="1980">2523</option>
                      <option value="1979">2522</option>
                      <option value="1978">2521</option>
                      <option value="1977">2520</option>
                      <option value="1976">2519</option>
                      <option value="1975">2518</option>
                      <option value="1974">2517</option>
                      <option value="1973">2516</option>
                      <option value="1972">2515</option>
                      <option value="1971">2514</option>
                      <option value="1970">2513</option>
                      <option value="1969">2512</option>
                      <option value="1968">2511</option>
                      <option value="1967">2510</option>
                      <option value="1966">2509</option>
                      <option value="1965">2508</option>
                      <option value="1964">2507</option>
                      <option value="1963">2506</option>
                      <option value="1962">2505</option>
                      <option value="1961">2504</option>
                      <option value="1960">2503</option>
                      <option value="1959">2502</option>
                      <option value="1958">2501</option>
                      <option value="1957">2500</option>
                      <option value="1956">2499</option>
                      <option value="1955">2498</option>
                      <option value="1954">2497</option>
                      <option value="1953">2496</option>
                      <option value="1952">2495</option>
                      <option value="1951">2494</option>
                      <option value="1950">2493</option>
                      <option value="1949">2492</option>
                      <option value="1948">2491</option>
                      <option value="1947">2490</option>
                      <option value="1946">2489</option>
                      <option value="1945">2488</option>
                      <option value="1944">2487</option>
                      <option value="1943">2486</option>
                      <option value="1942">2485</option>
                      <option value="1941">2484</option>
                      <option value="1940">2483</option>
                      <option value="1939">2482</option>
                      <option value="1938">2481</option>
                      <option value="1937">2480</option>
                      <option value="1936">2479</option>
                      <option value="1935">2478</option>
                      <option value="1934">2477</option>
                      <option value="1933">2476</option>
                      <option value="1932">2475</option>
                      <option value="1931">2474</option>
                      <option value="1930">2473</option>
                      <option value="1929">2472</option>
                      <option value="1928">2471</option>
                      <option value="1927">2470</option>
                      <option value="1926">2469</option>
                      <option value="1925">2468</option>
                      <option value="1924">2467</option>
                      <option value="1923">2466</option>
                      <option value="1922">2465</option>
                      <option value="1921">2464</option>
                      <option value="1920">2463</option>
                      <option value="1919">2462</option>
                      <option value="1918">2461</option>
                      <option value="1917">2460</option>
                      <option value="1916">2459</option>
                      <option value="1915">2458</option>
                      <option value="1914">2457</option>
                      <option value="1913">2456</option>
                      <option value="1912">2455</option>
                      <option value="1911">2454</option>
                      <option value="1910">2453</option>
                    </select>
                  </div>
                </div>
                <div id="Rowform2">
                  <div id="RowTiltle"><span class="redStar">*</span> Address</div>
                  <div>
                    <textarea name="address" rows="3" id="addressfield"  onblur="validateForm('addressfield');"  onfocus="hiliteRequired('addressfield')" > </textarea>
                  </div>
                </div>
                <div id="Rowform" style="width:550px;">
                  <div id="RowTiltle"><span class="redStar">*</span> Province</div>
                  <div>
                    <select name="province" id="provincefield"  onblur="validateForm('provincefield');"  onfocus="hiliteRequired('provincefield')"  >
                      <option value="Chiang Mai">Chiang Mai</option>
                      <option value="Chiang Rai">Chiang Rai</option>
                      <option value="Lampan">Lampan</option>
                      <option value="Kamphaeng Phet">Kamphaeng Phet</option>
                      <option value="Lamphun">Lamphun</option>
                      <option value="Mae Hong Son">Mae Hong Son</option>
                      <option value="Nakhon Sawan">Nakhon Sawan</option>
                      <option value="Nan">Nan</option>
                      <option value="Phichit">Phichit</option>
                      <option value="Phrae">Phrae</option>
                      <option value="Phitsanulok">Phitsanulok</option>
                      <option value="Phayao">Phayao</option>
                      <option value="Phetchabun">Phetchabun</option>
                      <option value="Sukhothai">Sukhothai</option>
                      <option value="Tak">Tak</option>
                      <option value="Uthai Thani">Uthai Thani</option>
                      <option value="Uttaradit">Uttaradit</option>
                      <option value=" Amnat Charoen">Amnat Charoen</option>
                      <option value="Buri Ram">Buri Ram</option>
                      <option value="Chaiyaphum">Chaiyaphum</option>
                      <option value="Nong Bua Lamphu">Nong Bua Lamphu</option>
                      <option value="Khon Kaen">Khon Kaen</option>
                      <option value="Loei">Loei</option>
                      <option value="Maha Sarakham">Maha Sarakham</option>
                      <option value="Kalasin">Kalasin</option>
                      <option value="Nong Khai">Nong Khai</option>
                      <option value="Roi Et">Roi Et</option>
                      <option value="Sakon Nakhon">Sakon Nakhon</option>
                      <option value="Si Sa Ket">Si Sa Ket</option>
                      <option value="Surin">Surin</option>
                      <option value="Ubon Ratchathani">Ubon Ratchathani</option>
                      <option value="Udon Thani">Udon Thani</option>
                      <option value="Yasothon">Yasothon</option>
                      <option value="Mukdahan">Mukdahan</option>
                      <option value="Nakhon Phanom">Nakhon Phanom</option>
                      <option value="Nakhon Ratchasima">Nakhon Ratchasima</option>
                      <option value="Ang Thong">Ang Thong</option>
                      <option value="Phra Nakhon Si Ayutthaya">Phra Nakhon Si Ayutthaya</option>
                      <option value="Bangkok">Bangkok</option>
                      <option value="Chai Nat">Chai Nat</option>
                      <option value="Kanchanaburi">Kanchanaburi</option>
                      <option value="Lop Buri">Lop Buri</option>
                      <option value="Nonthaburi">Nonthaburi</option>
                      <option value="Pathum Thani">Pathum Thani</option>
                      <option value="Phetchaburi">Phetchaburi</option>
                      <option value="Prachuap Khiri Khan">Prachuap Khiri Khan</option>
                      <option value="Ratchaburi">Ratchaburi</option>
                      <option value="Samut Prakan">Samut Prakan</option>
                      <option value="Samut Sakhon">Samut Sakhon</option>
                      <option value="Nakhon Nayok">Nakhon Nayok</option>
                      <option value="Nakhon Pathom">Nakhon Pathom</option>
                      <option value="Samut Songkhram">Samut Songkhram</option>
                      <option value="Saraburi">Saraburi</option>
                      <option value="Sing Buri">Sing Buri</option>
                      <option value="Suphan Buri">Suphan Buri</option>
                      <option value="Chachoengsao">Chachoengsao</option>
                      <option value="Rayong">Rayong</option>
                      <option value="Sa Kaeo">Sa Kaeo</option>
                      <option value="Trat">Trat</option>
                      <option value="Chumphon">Chumphon</option>
                      <option value="Krabi">Krabi</option>
                      <option value="Nakhon Si Thammarat">Nakhon Si Thammarat</option>
                      <option value="Narathiwat">Narathiwat</option>
                      <option value="Pattani">Pattani</option>
                      <option value="Phang Nga">Phang Nga</option>
                      <option value="Ranong">Ranong</option>
                      <option value="Satun">Satun</option>
                      <option value="Chanthaburi">Chanthaburi</option>
                      <option value="Chon Buri">Chon Buri</option>
                      <option value="Prachin Buri">Prachin Buri</option>
                      <option value="Phatthalung ">Phatthalung</option>
                      <option value="Phuket ">Phuket </option>
                      <option value="Songkhla ">Songkhla</option>
                      <option value="Surat Thani ">Surat Thani</option>
                      <option value="Trang ">Trang</option>
                      <option value="Yala ">Yala</option>
                    </select>
                  </div>
                </div>
                <div id="Rowform">
                  <div id="RowTiltle"><span class="redStar">*</span> Postal</div>
                  <div>
                    <input name="postal" type="text" size="6" maxlength="5"  id="postalfield"  onblur="validateForm('postalfield');"  onfocus="hiliteRequired('postalfield')"  />
                  </div>
                  <div id="Rowform">
                    <div id="RowTiltle"><span class="redStar">*</span> Telephone</div>
                    <div>
                      <input name="tel" type="text"  id="telfield"  onblur="validateForm('telfield');"  onfocus="hiliteRequired('telfield')"  />
                    </div>
                  </div>
                  <div id="Rowform">
                    <div id="RowTiltle">Mobile phone</div>
                    <div>
                      <input name="mobile" type="text" id="mobilefield"  onblur="validateForm('mobilefield');"  onfocus="hiliteRequired('mobilefield')"  />
                    </div>
                  </div>
                  <div id="Rowform">
                    <div id="RowTiltle"></div>
                    <div></div>
                  </div>
                </div>
              </div>
            </div>
            <br />
          </div>
          <div style="text-align:left;">
            <div  id="splite">Company Information</div>
            <div >
              <div id="RowBox" style="height:400px;">
                <div id="Rowform">
                  <div id="RowTiltle">Company name</div>
                  <div>
                    <input name="com_name" type="text" id="com_namefield"  onblur="validateForm('com_namefield');"  onfocus="hiliteRequired('com_namefield',15)"  />
                  </div>
                </div>
                <div id="Rowform2">
                  <div id="RowTiltle">Company address</div>
                  <div>
                    <textarea name="com_add" rows="3" id="com_addfield"  onblur="validateForm('com_addfield');"  onfocus="hiliteRequired('com_addfield',16)"  /></textarea>
                    </textarea>
                    </textarea>
                  </div>
                </div>
                <div id="Rowform" style="width:550px;">
                  <div id="RowTiltle">Province</div>
                  <div>
                    <select name="com_province" id="com_provincefield" onblur="validateForm('com_provincefield');"  onfocus="hiliteRequired('com_provincefield',17)" >
                      <option value="Chiang Mai">Chiang Mai</option>
                      <option value="Chiang Rai">Chiang Rai</option>
                      <option value="Lampan">Lampan</option>
                      <option value="Kamphaeng Phet">Kamphaeng Phet</option>
                      <option value="Lamphun">Lamphun</option>
                      <option value="Mae Hong Son">Mae Hong Son</option>
                      <option value="Nakhon Sawan">Nakhon Sawan</option>
                      <option value="Nan">Nan</option>
                      <option value="Phichit">Phichit</option>
                      <option value="Phrae">Phrae</option>
                      <option value="Phitsanulok">Phitsanulok</option>
                      <option value="Phayao">Phayao</option>
                      <option value="Phetchabun">Phetchabun</option>
                      <option value="Sukhothai">Sukhothai</option>
                      <option value="Tak">Tak</option>
                      <option value="Uthai Thani">Uthai Thani</option>
                      <option value="Uttaradit">Uttaradit</option>
                      <option value=" Amnat Charoen">Amnat Charoen</option>
                      <option value="Buri Ram">Buri Ram</option>
                      <option value="Chaiyaphum">Chaiyaphum</option>
                      <option value="Nong Bua Lamphu">Nong Bua Lamphu</option>
                      <option value="Khon Kaen">Khon Kaen</option>
                      <option value="Loei">Loei</option>
                      <option value="Maha Sarakham">Maha Sarakham</option>
                      <option value="Kalasin">Kalasin</option>
                      <option value="Nong Khai">Nong Khai</option>
                      <option value="Roi Et">Roi Et</option>
                      <option value="Sakon Nakhon">Sakon Nakhon</option>
                      <option value="Si Sa Ket">Si Sa Ket</option>
                      <option value="Surin">Surin</option>
                      <option value="Ubon Ratchathani">Ubon Ratchathani</option>
                      <option value="Udon Thani">Udon Thani</option>
                      <option value="Yasothon">Yasothon</option>
                      <option value="Mukdahan">Mukdahan</option>
                      <option value="Nakhon Phanom">Nakhon Phanom</option>
                      <option value="Nakhon Ratchasima">Nakhon Ratchasima</option>
                      <option value="Ang Thong">Ang Thong</option>
                      <option value="Phra Nakhon Si Ayutthaya">Phra Nakhon Si Ayutthaya</option>
                      <option value="Bangkok">Bangkok</option>
                      <option value="Chai Nat">Chai Nat</option>
                      <option value="Kanchanaburi">Kanchanaburi</option>
                      <option value="Lop Buri">Lop Buri</option>
                      <option value="Nonthaburi">Nonthaburi</option>
                      <option value="Pathum Thani">Pathum Thani</option>
                      <option value="Phetchaburi">Phetchaburi</option>
                      <option value="Prachuap Khiri Khan">Prachuap Khiri Khan</option>
                      <option value="Ratchaburi">Ratchaburi</option>
                      <option value="Samut Prakan">Samut Prakan</option>
                      <option value="Samut Sakhon">Samut Sakhon</option>
                      <option value="Nakhon Nayok">Nakhon Nayok</option>
                      <option value="Nakhon Pathom">Nakhon Pathom</option>
                      <option value="Samut Songkhram">Samut Songkhram</option>
                      <option value="Saraburi">Saraburi</option>
                      <option value="Sing Buri">Sing Buri</option>
                      <option value="Suphan Buri">Suphan Buri</option>
                      <option value="Chachoengsao">Chachoengsao</option>
                      <option value="Rayong">Rayong</option>
                      <option value="Sa Kaeo">Sa Kaeo</option>
                      <option value="Trat">Trat</option>
                      <option value="Chumphon">Chumphon</option>
                      <option value="Krabi">Krabi</option>
                      <option value="Nakhon Si Thammarat">Nakhon Si Thammarat</option>
                      <option value="Narathiwat">Narathiwat</option>
                      <option value="Pattani">Pattani</option>
                      <option value="Phang Nga">Phang Nga</option>
                      <option value="Ranong">Ranong</option>
                      <option value="Satun">Satun</option>
                      <option value="Chanthaburi">Chanthaburi</option>
                      <option value="Chon Buri">Chon Buri</option>
                      <option value="Prachin Buri">Prachin Buri</option>
                      <option value="Phatthalung ">Phatthalung</option>
                      <option value="Phuket ">Phuket </option>
                      <option value="Songkhla ">Songkhla</option>
                      <option value="Surat Thani ">Surat Thani</option>
                      <option value="Trang ">Trang</option>
                      <option value="Yala ">Yala</option>
                    </select>
                  </div>
                </div>
                <div id="Rowform">
                  <div id="RowTiltle">Postal code</div>
                  <div>
                    <input name="com_postal" type="text"  id="com_postalfield" onblur="validateForm('com_postalfield');"  onfocus="hiliteRequired('com_postalfield',18)" />
                  </div>
                </div>
                <div id="Rowform">
                  <div id="RowTiltle">

                    Telephone</div>
                  <div>
                    <input name="com_tel" type="text" id="com_telfield" onblur="validateForm('com_telfield');"  onfocus="hiliteRequired('com_telfield',19)" />
                    <input name="MM_insert" type="hidden" id="MM_insert" value="adduser" />
                  </div>
                </div>
                <div id="Rowform">
                  <div id="RowTiltle"></div>
                  <div></div>
                </div>
                <div id="Rowform">
                  <div id="RowTiltle"></div>
                  <div>
                    <div id="submitholder"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>
            <a href="product.php#product"> <br />
            </a><br />
            <br /></td>
        <td valign="top">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td><? include'footer.php'; ?></td>
  </tr>
</table>
</center>
<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>



</body>
</html>
