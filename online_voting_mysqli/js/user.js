function loginValidate(loginForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="Kliknij ok by kontunnuowac";

if (loginForm.myusername.value=="")
{
errorMessage+="Pole emailu nie wypelnione!\n";
validationVerified=false;
}
if(loginForm.mypassword.value=="")
{
errorMessage+="Pole hasla nie wypelnione!\n";
validationVerified=false;
}
if (!isValidEmail(loginForm.myusername.value)) {
errorMessage+="Podano nieprawidłowy adres e-mail!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

function registerValidate(registerForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="kliknij OK, aby przetworzyć rejestrację";

if (registerForm.firstname.value=="")
{
errorMessage+="Pole z imieniem nie wypelnione!\n";
validationVerified=false;
}
if(registerForm.lastname.value=="")
{
errorMessage+="Pole z nazwiskiem nie wypelnione!\n";
validationVerified=false;
}
if (registerForm.email.value=="")
{
errorMessage+="Pole emailu nie wypelnione!\n";
validationVerified=false;
}
if(registerForm.password.value=="")
{
errorMessage+="Nie podano hasla!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value=="")
{
errorMessage+="Pole z potwierdzeniem hasla nie jest wypełnione!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value!=registerForm.password.value)
{
errorMessage+="Potwierdzone nowe haslo i nowe hasło nie pasuja!\n";
validationVerified=false;
}
if (!isValidEmail(registerForm.email.value)) {
errorMessage+="Invalid email address provided!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

function updateProfile(registerForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="kliknij OK, aby przetworzyć rejestrację";

if (registerForm.firstname.value=="")
{
errorMessage+="Pole z imieniem nie wypelnione!\n";
validationVerified=false;
}
if(registerForm.lastname.value=="")
{
errorMessage+="Pole z nazwiskiem nie wypelnione!\n";
validationVerified=false;
}
if (registerForm.email.value=="")
{
errorMessage+="Pole z emailem nie wypelnione!\n";
validationVerified=false;
}
if(registerForm.password.value=="")
{
errorMessage+="Nie podano nowego hasła!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value=="")
{
errorMessage+="Pole z nowym potwierdzonym haslem nie zostało wypełnione!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value!=registerForm.password.value)
{
errorMessage+="Potwierdzone nowe haslo i nowe hasło nie pasuja!\n";
validationVerified=false;
}
if (!isValidEmail(registerForm.email.value)) {
errorMessage+="Podano nieprawidłowy adres e-mail!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

function isValidEmail(val) {
	var re = /^[\w\+\'\.-]+@[\w\'\.-]+\.[a-zA-Z]{2,}$/;
	if (!re.test(val)) {
		return false;
	}
    return true;
}

function isValidSpecialPIN(val) {
	var re = /^[0-9][0-9][A-Z][A-Z][A-Z][0-9][0-9][0-9][0-9][0-9][0-9][0-9]$/;
	if (!re.test(val)) {
		return false;
	}
	return true;
}

function isValidLength(val){
	var length = 12;
	if (!re.test(val)) {
		return false;
	}
	return true;
}

function getProductTotal(field) {
    clearErrorInfo();
    var form = field.form;
	if (field.value == "") field.value = 0;
	if ( !isPosInt(field.value) ) {
        var msg = 'Wprowadź dodatnią liczbę całkowitą dla ilości.';
        addValidationMessage(msg);
        addValidationField(field)
        displayErrorInfo( form );
        return;
	} else {
		var product = field.name.slice(0, field.name.lastIndexOf("_") ); 
        var price = form.elements[product + "_price"].value;
		var amt = field.value * price;
		form.elements[product + "_tot"].value = formatDecimal(amt);
		doTotals(form);
	}
}

function doTotals(form) {
    var total = 0;
    for (var i=0; PRODUCT_ABBRS[i]; i++) {
        var cur_field = form.elements[ PRODUCT_ABBRS[i] + "_qty" ]; 
        if ( !isPosInt(cur_field.value) ) {
            var msg = 'Wprowadź dodatnią liczbę całkowitą dla ilości.';
            addValidationMessage(msg);
            addValidationField(cur_field)
            displayErrorInfo( form );
            return;
        }
        total += parseFloat(cur_field.value) * parseFloat( form.elements[ PRODUCT_ABBRS[i] + "_price" ].value );
    }
    form.elements['total'].value = formatDecimal(total);
}


//validate updateForm
function updateValidate(updateForm) {
    var validationVerified=true;
var errorMessage="";
var okayMessage="kliknij OK, aby zmienić hasło";

if (updateForm.opassword.value=="")
{
errorMessage+="Podaj swoje stare hasło.\n";
validationVerified=false;
}
if (updateForm.npassword.value=="")
{
errorMessage+="Podaj nowe hasło.\n";
validationVerified=false;
}
if(updateForm.cpassword.value=="")
{
errorMessage+="Prosze potwierdz nowe hasło.\n";
validationVerified=false;
}
if(updateForm.cpassword.value!=updateForm.npassword.value)
{
errorMessage+="Potwierdzone nowe haslo i nowe hasło nie pasuja!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

function reserveValidate(reserveForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="Ok";

if (reserveForm.tNumber.selectedIndex==0)
{
errorMessage+="Prosze wybrać tabele według jej numeru!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}

function positionValidate(positionForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="Kliknij OK, aby zobaczyć kandydatów pod wybraną pozycja";

if (positionForm.position.selectedIndex == 0)
{
errorMessage+="Pozycja nie wybrana!\n";
validationVerified=false;
}
if(!validationVerified)
{
alert(errorMessage);
}
if(validationVerified)
{
alert(okayMessage);
}
return validationVerified;
}