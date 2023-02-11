const nombreValido = /^([A-ZÁÉÍÓÚa-zñáéíóú]+[\s]*){3,50}$/
const emailValido = /^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/
const valid_addr = /\w/
const valid_phon = /^[0-9]{10}/

function validate_login(){
    var email = document.getElementById("email").value;
    var password1 = document.getElementById("password").value;
    var valid_email= validate_email(email)
    var valid_password = validate_password(password1,password1)

    if(valid_email == true && valid_password == true){
        login(email,password1)    }

}


function login(email,password){
    //console.log(email,password)
    var params = {"email":email,"password":password};
    $.ajax({
       data:params,
       url:"bbdd/new_session.php",
       type: 'post',
       success: function (response) {   
        if(response == "Usuario y/o contraseña incorrectos"){
            console.log("no pudo loggearse")
            $('#login-error').removeClass('text-error')

        }else{
            window.location = "my_phonebook.php"
        }
       },
    });
}

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
function validate_password(password1,password2){
    var resultado = true
    if(password1.length >= 4 && password1 === password2){
        resultado = true
        $('#password-error').addClass('text-error')
        $('#password2-error').addClass('text-error')

        
        
    }else{
        resultado = false
        $('#password-error').removeClass('text-error')
        $('#password2-error').removeClass('text-error')


    }

    return resultado
}function validate_phone(phone){
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
function show_password(){
    var show_password = document.getElementById('show-password')
    var input_password = document.getElementById('password')
    if (show_password.checked){
        input_password.type = "text"
    }else{
        input_password.type = "password"
    }
}


function not_robot(){
    var resultado = false
    var not_robot = document.getElementById('not-robot')
    if (not_robot.checked){
        resultado = true
        $('#error-robot').addClass('text-error')
    }else{
        $('#error-robot').removeClass('text-error')

    }

    return resultado
}




function validate_form(){
    var name = document.getElementById("name").value;
    var lastname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var password1 = document.getElementById("password").value;
    var password2 = document.getElementById("password2").value;
    var no_robot = not_robot()

    var valid_name = validate_name(name)
    var valid_lastname = validate_lastname(lastname)
    var valid_email= validate_email(email)
    var valid_password = validate_password(password1,password2)

    if(valid_name == true && valid_lastname == true && valid_email == true 
        && valid_password == true && no_robot == true){
        add_user(name,lastname,password1,password2,email)    }




}


function validate_contact(id_user){
    var name = document.getElementById("name").value;
    var lastname = document.getElementById("lastname").value;
    var email = document.getElementById("email").value;
    var adress = document.getElementById("adress").value;
    var phone = document.getElementById("phone").value;

    var valid_name = validate_name(name)
    var valid_lastname = validate_lastname(lastname)
    var valid_email= validate_email(email)
    var valid_adress = validate_adress(adress)
    var valid_phone = validate_phone(phone)

    

    if(valid_name == true && valid_lastname == true && valid_email == true 
        && valid_adress == true && valid_phone == true){
        add_contact(name,lastname,phone,email,adress,id_user)    }


}

function add_contact(name,lastname,phone,email,adress,id_user){
    //console.log(name,lastname,phone,email,adress,id_user)
    var params = {"name":name,"lastname":lastname,"email":email,"phone":phone,
    "adress":adress,"id_user":id_user};
    $.ajax({
        data:params,
       url:"bbdd/new_contact.php",
       type: 'post',
       success: function (response) {   
            if(response != 'ok'){
                console.log(response)
            }else{
                $("#name").val('')
                $("#email").val('')
                $("#phone").val('')
                $("#adress").val('')
                $("#lastname").val('')
                $('#contact-add-message').removeClass('contact-add')




            }
          
            
        },
    });
}

function add_user(name,lastname,password1,password2,email){
    //console.log(name,lastname,email,password1)
    var params = {"name":name,"lastname":lastname,"email":email,"password":password1,
    "password2":password2};
    $.ajax({
       data:params,
       url:"bbdd/new_user.php",
       type: 'post',
       success: function (response) {   
        if(response != "Se registró exitosamente"){
            $('#error-signup').removeClass('text-error')
            $('#message-signup').addClass('text-ok')


        }else{
            console.log(response)
            $("#name").val('')
            $("#email").val('')
            $("#lastname").val('')
            $("#password").val('')
            $("#password2").val('')
            $('#message-signup').removeClass('text-ok')
            $('#error-signup').addClass('text-error')





        }
          
            
       },
    });
}



