function validationForm(e) 
{
    e.preventDefault();
    let number1 = document.getElementById('number1').value;
    let number2 = document.getElementById('number2').value;
    let formOneMessage = document.getElementById('number_one');

    if (!number1) {
        formOneMessage.innerHTML = 'This field is required.';
    } else {
        formOneMessage.style.display = 'none';
    }

    if (!number2) {
        document.getElementById('number_two').innerHTML = 'This field is required.';
    }

    if (number1 && number2) {
        document.getElementById('calcform').submit();
    }
}
 
