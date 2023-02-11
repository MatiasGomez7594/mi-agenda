function activate_item(id_contact){
    $("#edit-button").attr("disabled",false);
    $("#delete-button").attr("disabled",false);
    var id = "contact"+id_contact
    let contacts = document.getElementById("contacts-list")
    for (var i = 0,contact; contact = contacts.rows[i]; i++) {
        if(contact.id==id){
            //console.log(contact.id,id)
            $("#"+contact.id).addClass("table-active")
        }else{
            $("#"+contact.id).removeClass("table-active")

        }
    }
    $("#delete").click(function(){
        $("#id-contact-delete").val(id_contact)
    })
    $("#edit-button").click(function(){
        $("#id-contact-edit").val(id_contact)
    })

}


const nombreValido = /^([A-ZÁÉÍÓÚa-zñáéíóú]+[\s]*){3,50}$/
const emailValido = /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
const valid_addr = /\w/
const valid_phon = /^[0-9]{10}/




function validate_name(name){
    var resultado = true
    if(nombreValido.test(name)){
        resultado = true
        $('#name-error').addClass('text-error')

        
    }else{
        resultado = false
        $('#name-error').removeClass('text-error')

        
    }

    return resultado


}

function validate_lastname(lastname){
    var resultado = true
    if(nombreValido.test(lastname)){
        resultado = true
        $('#lastname-error').addClass('text-error')
        
    }else{
        resultado = false
        $('#lastname-error').removeClass('text-error')

        
    }
    return resultado

}

function validate_email(email){
    var resultado = true
    if(emailValido.test(email)){
        resultado = true
        $('#email-error').addClass('text-error')

        
    }else{
        resultado = false
        $('#email-error').removeClass('text-error')

        
    }

    return resultado
}

function validate_phone(phone){
    var resultado = true
    if(valid_phon.test(phone)){
        resultado = true
        $('#phone-error').addClass('text-error')

        
    }else{
        resultado = false
        $('#phone-error').removeClass('text-error')

        
    }

    return resultado


}
function validate_adress(adress){
    var resultado = true
    if(valid_addr.test(adress)){
        resultado = true
        $('#adress-error').addClass('text-error')

        
    }else{
        resultado = false
        $('#adress-error').removeClass('text-error')

        
    }

    return resultado


}


function validate_data_edit(id_u,id_c){
    var id_user = id_u
    var id_contact = id_c

    var name = document.getElementById("name").value;
    var lastname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var adress = document.getElementById("adress").value;
    var phone = document.getElementById("phone").value

    var valid_name = validate_name(name)
    var valid_lastname = validate_lastname(lastname)
    var valid_email= validate_email(email)
    var valid_address =validate_adress(adress)
    var valid_phone = validate_phone(phone)

    if(valid_name == true && valid_lastname == true && valid_email == true
        && valid_phone == true && valid_address == true ){
        update_contact(name,lastname,phone,email,adress,id_contact,id_user)    
    }




}


function update_contact(name,lastname,phone,email,adress,id_contact,id_user){
    console.log(name,lastname,phone,email,adress,id_contact,id_user)
    var params = {"name":name,"lastname":lastname,"email":email,"phone_number":phone,
    "adress":adress,"id_contact":id_contact,"id_user":id_user};
    $.ajax({
        data:params,
       url:"bbdd/update.php",
       type: 'post',
       success: function (response) {   
            if(response != 'ok'){
                console.log(response)
            }else{
                window.location = "my_phonebook.php"
            }
          
            
        },
    });
}
