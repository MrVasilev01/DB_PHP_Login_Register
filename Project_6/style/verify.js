document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('form')
    const username = document.getElementById('username');
    const email = document.getElementById('email');
    const phone = document.getElementById('phone');
    const password = document.getElementById('password');

    form.addEventListener('submit',validateInputs);


    function setError(element,message){
        const inputControl = element;
        const errorDisplay = inputControl.querySelectorAll('.error');

        console.log(errorDisplay);
        errorDisplay.innerText = message;
        inputControl.classList.add('error');
        inputControl.classList.remove('success');
    };

    function setSuccess(element){
        const inputControl = element;
        const errorDisplay = inputControl.querySelectorAll('.error');

        errorDisplay.innerText = '';
        inputControl.classList.add('success');
        inputControl.classList.remove('error');
    };

    function isValidEmail(email){
        const re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

        return re.test(String(email).toLowerCase());
    }

    function validateInputs(){
        event.preventDefault();
        const usernameValue = username.value.trim();
        const emailValue = email.value.trim();
        const phoneValue = phone.value.trim();
        const passwordValue = password.value.trim();

        if(usernameValue === ''){
            setError(username, 'Username is required!');
        }
        else{
            setSuccess(username);
        }   

        if(emailValue === ''){
            setError(email, 'Email is required!');
        }
        else if (!isValidEmail(emailValue)){
            setError(email, 'Provide a valid email address!');
        }
        else{
            setSuccess(email);
        }

        if(phoneValue === ''){
            setError(phone, 'Phone is required!');
        }
        else if(phoneValue.length < 9){
            setError(phone, 'Phone number must be at least 9 character!')
        }else{
            setSuccess(phone);
        }

        if(passwordValue === ''){
            setError(password, 'Password is required!');
        }else if(passwordValue.length < 8){
                setError(password, 'Password must be at least 8 character!')
        }else{
            setSuccess(password);
        }

    };
});