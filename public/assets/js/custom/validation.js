
function form_validation(form_name) {
    var isvalid = true;
    $('#'+form_name+' :input[required], select[required]').each(function (){
        if (this.value.trim() === '') {
            $(this).parent('div .input-group').css('border', '1px solid red');
            isvalid = false;
        }else if(this.value.trim() === '' && this.id == 'cus_phone' && this.value.length <2 || this.value.length > 11){
            $(this).parent('div .input-group').css('border', '1px solid red');
            isvalid = false;
        }else{
            $(this).css('border','1px solid #ccc');
            $(this).parent('div .input-group').css('border','1px solid #ccc');
        }
    });
    return isvalid;
}


function ajax_form_validation() {
    var isvalid = true;
    $('form .required').each(function (){

        if (this.value.trim() === '') {
            $(this).css('border','1px solid red');
            $(this).parent('div .input-group').css('border','1px solid red');
            isvalid = false;
        }else{
            $(this).css('border','1px solid #ccc');
            $(this).parent('div .input-group').css('border','1px solid #ccc');
        }
    });
    return isvalid;
}

