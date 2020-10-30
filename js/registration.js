function validation() {
	var allowed = /^[A-Za-z\s]+$/;
	var mobilepattern = /^[7-9][0-9]{9}$/;
	var fullname = document.getElementById("fullname").value;
	var mobile = document.getElementById("mobile").value;
	var altmobile = document.getElementById("altmobile").value;
	var facilities = document.getElementById("facilities").value;
	var address = document.getElementById("address").value;
	var rent = document.getElementById("rent").value;
	var deposit = document.getElementById("deposit").value;
	var town = document.getElementById("town").value;
	var pincode = document.getElementById("pincode").value;
	var district = document.getElementById("district").value;
	var state = document.getElementById("state").value;
	var image = document.getElementById("image").value;
	var extention = image.substring(image.lastIndexOf('.') + 1).toLowerCase();
	console.log("its working");
	console.log(state);
	console.log(extention);
	if (fullname.trim() == ""){
		document.getElementById("error").innerHTML="Please enter the Name.";
		return false;
	}else if(fullname.length <3 || fullname.lenght >30){
		document.getElementById("error").innerHTML="Name Must have 3 to 30 Character.";
		return false;
	}else if(!fullname.match(allowed)){
		document.getElementById("error").innerHTML="Only Alphabets are Allowed in Name.";
		return false;
	}else if (mobile.trim() == "" || altmobile.trim() == ""){
		document.getElementById("error").innerHTML="Enter Mobile Number.";
		return false;
	}else if(!mobile.match(mobilepattern) || !altmobile.match(mobilepattern)){
		document.getElementById("error").innerHTML="Invalid Mobile Number.";
		return false;
	}else if(facilities.trim() == ""){
		document.getElementById("error").innerHTML="Enter Facilities.";
		return false;
	}else if(address.trim() == ""){
		document.getElementById("error").innerHTML="Enter Facilities.";
		return false;
	}else if(facilities.length > 250 || address.length >250){
		document.getElementById("error").innerHTML="Word Limit Exceed.";
		return false;
	}else if(isNaN(rent)){
		document.getElementById("error").innerHTML="Enter Only Number In Rent.";
		return false;
	}else if(isNaN(deposit)){
		document.getElementById("error").innerHTML="Enter Only Number In Deposit.";
		return false;
	}else if(!town.match(allowed)){
		document.getElementById("error").innerHTML="Only Alphabets are Allowed in Town Name.";
		return false;
	}else if(isNaN(pincode)){
		document.getElementById("error").innerHTML="Enter a Valid Pin Code.";
		return false;
	}else if(!district.match(allowed)){
		document.getElementById("error").innerHTML="Only Alphabets are Allowed in District Name.";
		return false;
	}else if(!state.match(allowed)){
		document.getElementById("error").innerHTML="Only Alphabets are Allowed in State Name.";
		return false;
	}else if(image == ""){
		document.getElementById("error").innerHTML="Upload an Image.";
		return false;
	}else if(extention == "jpg" || extention == "jpeg"){
		document.getElementById("error").innerHTML="";
		return true;
	}else{
		document.getElementById("error").innerHTML="Only jpg and jpeg image allowed.";
		return false;
	}
}

function validate(){
	var allowed = /^[A-Za-z\s]+$/;
	var mobilepattern = /^[7-9][0-9]{9}$/;
	var fullname = document.getElementById("fullname").value;
	var mobile = document.getElementById("mobile").value;
	if (fullname.trim() == ""){
		document.getElementById("error").innerHTML="Please enter the Name.";
		return false;
	}else if(fullname.length <3 || fullname.lenght >30){
		document.getElementById("error").innerHTML="Name Must have 3 to 30 Character.";
		return false;
	}else if(!fullname.match(allowed)){
		document.getElementById("error").innerHTML="Only Alphabets are Allowed in Name.";
		return false;
	}else if (mobile.trim() == ""){
		document.getElementById("error").innerHTML="Enter Mobile Number.";
		return false;
	}else if(!mobile.match(mobilepattern)){
		document.getElementById("error").innerHTML="Invalid Mobile Number.";
		return false;
	}else {
		return true;
	}
	console.log("IN validate fun");
}
function checkPass(){
	var a = document.getElementById("password").value;
	if (a!="") {
		if (a.length>5 && a.length<15) {
			document.getElementById("message").innerHTML=" ";
			return true;
		} else {
			document.getElementById("message").innerHTML="  ** Password Length (6 to 15).";
			return false;
		}
	} else {
		document.getElementById("message").innerHTML="  ** Please Enter the Password";
		return false;
	}
}
function testPassword() {
	var a = document.getElementById("password").value;
	var b = document.getElementById("confirmpassword").value;
	if (a == b) {
		document.getElementById("confirmmsg").innerHTML="  ** Same Password.";
		return true;
	} else{
		document.getElementById("confirmmsg").innerHTML="  ** Password not Matched.";
		return false;
	}
}