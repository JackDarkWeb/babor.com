$(function(){
    let error_email = false;

    const alertMessage = (id, errorClass, text) => {
        return $(id).next(errorClass).html(text).show('slow');
    };

    const deleteMessage = (errorClass) => {
        return $(errorClass).hide();
    };
    const requiredMessage = (errorClass, text) => {
        return $(errorClass).html(text).show('slow');
    };

    $(document).on('keyup', '#email', function () {
        let string = $(this).val();
        let filter = /^[0-9 +]+$/;
        let number = /^(\+)[0-9]{11,12}/;
        let email = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

        if(string === ''){
            alertMessage(this, '.error-email', 'Field email or phone is required');
            error_email = false;
        }else{
            if(string.match(filter)){

                if(!string.match(number)){
                    alertMessage(this, '.error-email', 'Your number is incorrect. Ex +380633471236');
                    error_email = false;
                }else{
                    deleteMessage('.error-email');
                    error_email = true;
                }
            }else{

                if(!string.match(email)){
                    alertMessage(this, '.error-email', 'Your email is incorrect');
                    error_email = false;
                }else {
                    deleteMessage('.error-email');
                    error_email = true;
                }
            }
        }

    });
});