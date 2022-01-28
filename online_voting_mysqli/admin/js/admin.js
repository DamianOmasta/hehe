//function to handle login-form validation
function loginValidate(loginForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="Kliknij ok by kontunnowac";

if (loginForm.myusername.value=="")
{
errorMessage+="Pole emailu nie uzupelnione!\n";
validationVerified=false;
}
if(loginForm.mypassword.value=="")
{
errorMessage+="Pole hasla nie uzupelnione!\n";
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
errorMessage+="Pole imienia nie uzupenione!\n";
validationVerified=false;
}
if(registerForm.lastname.value=="")
{
errorMessage+="Pole nazwiska nie uzupenione!\n";
validationVerified=false;
}
if (registerForm.email.value=="")
{
errorMessage+="Pole emaila nie uzupenione!\n";
validationVerified=false;
}
if(registerForm.password.value=="")
{
errorMessage+="Nie podano hasła!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value=="")
{
errorMessage+="Pole hasla nie uzupelnione!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value!=registerForm.password.value)
{
errorMessage+="Potwierdź hasło i hasło nie pasują!\n";
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

//function to handle update-form validation
function updateProfile(registerForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="kliknij OK, aby zaktualizować swoje konto";

if (registerForm.firstname.value=="")
{
errorMessage+="Pole imienia nie uzupenione!\n";
validationVerified=false;
}
if(registerForm.lastname.value=="")
{
errorMessage+="Pole nazwiska nie uzupenione!\n";
validationVerified=false;
}
if (registerForm.email.value=="")
{
errorMessage+="Pole emailu nie uzupenione!\n";
validationVerified=false;
}
if(registerForm.password.value=="")
{
errorMessage+="New password not provided!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value=="")
{
errorMessage+="Nie podano nowego hasła!\n";
validationVerified=false;
}
if(registerForm.ConfirmPassword.value!=registerForm.password.value)
{
errorMessage+="Potwierdź hasło i nowe hasło nie pasują!\n";
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

function isValidPosition(val) {
    var re = /[-]/;
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
errorMessage+="Potwierdz nowe hasło.\n";
validationVerified=false;
}
if(updateForm.cpassword.value!=updateForm.npassword.value)
{
errorMessage+="Potwierdz hasło i nowe hasło nie pasuja!\n";
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
var okayMessage="kliknij OK, aby dodać nową pozycję";

if (positionForm.position.value == "")
{
errorMessage+="Proszę podać nazwę popzycji!\n";
validationVerified=false;
}
if (!isValidPosition(positionForm.position.value)) {
errorMessage+="Podano nieprawidłową pozycję! Nie zostawiaj spacji między słowami.\n";
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

function candidateValidate(candidateForm){

var validationVerified=true;
var errorMessage="";
var okayMessage="kliknij OK, aby dodać nowego kandydata";

if (candidateForm.name.value == "")
{
errorMessage+="Proszę podać dane kandydata!\n";
validationVerified=false;
}
if (candidateForm.position.selectedIndex == 0)
{
errorMessage+="Nie ustawiono pozycji kandydata!\n";
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
var okayMessage="Kliknij OK, aby zobaczyć wyniki ankiety pod wybraną pozycją.";

if (positionForm.position.selectedIndex == 0)
{
errorMessage+="Pozycja nie została ustawiona! Wybierz pozycję, aby pobrać odpowiednie wyniki ankiety.\n";
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