<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
<script>
    function addMorePhone(){
        let phoneFields = document.getElementsByClassName('clonePhone');
        let count = phoneFields[0].children.length - 1;
        let newCount = parseInt(phoneFields[0].children[count].classList[1]) + 1;
        var clonePhone = '<div class="row '+newCount+'" id="phoneNumber'+newCount+'"><div class="col-4">\
                        <label for="phone" class="form-label">Phone Number</label>\
                        <input type="number" class="form-control phoneNumber" placeholder="Enter Phone Number" aria-describedby="button-addon1">\
                    </div>\
                    <div class="col-4">\
                        <label for="phone" class="form-label">Phone Type</label>\
                        <select class="form-select phoneType" id="Suffix">\
                            <option value="Home">Home</option>\
                            <option value="Office">Office</option>\
                            <option value="Mobile">Mobile</option>\
                            <option value="Fax">Fax</option>\
                        </select>\
                    </div>\
                    <div class="col-3">\
                        <div class="form-check mt-4">\
                            <input class="form-check-input setDefault" type="radio" name="setDefault" id="phoneDefault'+newCount+'" value="'+newCount+'">\
                            <label class="form-check-label" for="phoneDefault'+newCount+'">\
                                Set Default\
                            </label>\
                        </div>\
                    </div>\
                    <div class="col-1">\
                        <div>\
                            <span class="btn btn-danger" onclick="removeNumber(event, '+newCount+')">Remove</span>\
                        </div>\
                    </div></div>';
        // phoneFields.children
        $(phoneFields).append(clonePhone);
        console.log(newCount);
    }

    function removeNumber(e, value){
        console.log(e.target);
        $("#phoneNumber"+value).remove();
    }

    function saveContact (e){
        e.preventDefault();
        var phoneCheck = 0;
        e.target.innerText = "Submitting";
        e.target.className = "btn btn-warning w-100";
        let firstName = document.getElementById('firstName');
        let firstNameMessage = document.getElementById('firstNameMessage');
        let lastName = document.getElementById('lastName');
        let lastNameMessage = document.getElementById('lastNameMessage');
        let email = document.getElementById('email');
        let emailMessage = document.getElementById('emailMessage');
        let phoneMessage = document.getElementById('phoneMessage');
        let middleName = document.getElementById('middleName');
        let title = document.getElementById('title');
        let prefix = document.getElementById('prefix');
        let suffix = document.getElementById('Suffix');
        let phoneNumberDOM = document.getElementsByClassName('phoneNumber');
        let phoneTypeDOM = document.getElementsByClassName('phoneType');
        let setDefaultDOM = document.getElementsByClassName('setDefault');
        let phoneNumber = [];
        let phoneType = [];
        let setDefault = [];
        $( phoneNumberDOM ).each(function( index ) {
            phoneNumber[index] = this.value;
        });
        console.log(phoneNumber);
        $( phoneTypeDOM ).each(function( index ) {
            phoneType[index] = this.value;
        });
        console.log(phoneType);
        $( setDefaultDOM ).each(function( index ) {
            setDefault[index] = this.checked;
        });
        console.log(setDefault);
        // console.log(setDefault[0].checked);
        if(firstName.value == ""){
            firstNameMessage.style.display = "block";
            firstNameMessage.children[0].innerHTML = "<strong>Error!</strong> Please Insert First Name";
            console.log(firstNameMessage.children[0]);
        }
        else if(firstName.value.length > 50){
            firstNameMessage.style.display = "block";
            firstNameMessage.children[0].innerHTML = "<strong>Error!</strong> You Excced the 50 Character limit";
            console.log(firstNameMessage.children[0]);
        }
        else{
            firstNameMessage.style.display = "none";
        }

        if(lastName.value == ""){
            lastNameMessage.style.display = "block";
            lastNameMessage.children[0].innerHTML = "<strong>Error!</strong> Please Insert Last Name";
            console.log(lastNameMessage.children[0]);
        }
        else if(lastName.value.length > 50){
            lastNameMessage.style.display = "block";
            lastNameMessage.children[0].innerHTML = "<strong>Error!</strong> You Excced the 50 Character limit";
            console.log(lastNameMessage.children[0]);
        }
        else{
            lastNameMessage.style.display = "none";
        }
        
        console.log("Email");
        console.log(email.value);
        if( email.value != " " ){
            let checkEmail = email.value.search('@');
            if( checkEmail == -1 ){
                emailMessage.style.display = "block";
                emailMessage.children[0].innerHTML = "<strong>Error!</strong> Please Enter Your Email Format";
                console.log(emailMessage.children[0]);  
            }
        }
        else{
            emailMessage.style.display = "block";
            emailMessage.children[0].innerHTML = "<strong>Error!</strong> Please Insert Email Address";
            console.log(emailMessage.children[0]); 
        }


        // Phone Validation
        // if(setDefaultDOM.)
        
        $( setDefaultDOM ).each(function( index ) {
            if(this.checked == true){
                console.log(phoneNumberDOM[index].value);
                if(phoneNumberDOM[index].value){
                   
                }
                else{
                    phoneMessage.style.display = "block";
                    phoneMessage.children[0].innerHTML = "<strong>Error!</strong> Please Enter Phone the Phone Number";
                    console.log(phoneMessage.children[0]);
                }
            }
            else{
                if(phoneNumberDOM[index].value){
                    
                }
                else{
                    phoneMessage.style.display = "block";
                    phoneMessage.children[0].innerHTML = "<strong>Error!</strong> Please Enter Phone the Phone Number";
                    console.log(phoneMessage.children[0]);
                }
            }
        });
        console.log("Phone Check");
        console.log(phoneCheck);
        if(phoneCheck != 0){
            phoneMessage.style.display = "block";
            phoneMessage.children[0].innerHTML = "<strong>Error!</strong> Please Insert Unique Phone Number";
            console.log(phoneMessage.children[0]);
            e.target.innerText = "Submit Again";
            e.target.className = "btn btn-danger w-100";
        }
        else{
            console.log(setDefault);
            if( lastNameMessage.style.display == 'none' && firstNameMessage.style.display == 'none' &&  emailMessage.style.display == "none" && phoneMessage.style.display == "none" && phoneCheck == 0 ){
                // Submit Form
                let firstNameVal = firstName.value;
                let lastNameVal = lastName.value;
                let emailVal = email.value;
                let middleNameVal = middleName.value;
                let titleVal = title.value;
                let prefixVal = prefix.value;
                let suffixVal = suffix.value;
                let formData = {
                    firstNameVal,lastNameVal,emailVal,middleNameVal,titleVal,prefixVal,suffixVal,phoneNumber,phoneType,setDefault
                };
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:'/add-contact',
                        dataType: "json",
                    data: formData,
                    success:function( response ) {
                            console.log(response);
                            e.target.innerText = "Submitted";
                            e.target.className = "btn btn-success w-100";
                            window.location.href = "http://127.0.0.1:8000/";
                    }
                    });
            }
            else{
                e.target.innerText = "Submit Again";
                e.target.className = "btn btn-danger w-100";
            }
        }
    }


    // Check Email Uniquness
    function checkEmail(e){
        let emailMessage = document.getElementById('emailMessage');
        console.log(e.target.value);
        let email = e.target.value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
               type:'POST',
               url:'/check-email',
                dataType: "json",
                data: {'email': email},
               success:function( response ) {
                  console.log(typeof response.status);
                  if(response.status == 201){
                    emailMessage.style.display = "block";
                    emailMessage.children[0].innerHTML = "<strong>Error!</strong> Please Insert Unique Email Address";
                    console.log(emailMessage.children[0]);  
                  }
                  else{
                    emailMessage.style.display = "none";
                  }
               }
            });
    }




    function updateData(e, id){
        e.preventDefault();
        e.target.innerText = "Submitting";
        e.target.className = "btn btn-warning w-100";
        let firstName = document.getElementById('firstName');
        let firstNameMessage = document.getElementById('firstNameMessage');
        let lastName = document.getElementById('lastName');
        let lastNameMessage = document.getElementById('lastNameMessage');
        let email = document.getElementById('email');
        let emailMessage = document.getElementById('emailMessage');
        let phoneMessage = document.getElementById('phoneMessage');
        let middleName = document.getElementById('middleName');
        let title = document.getElementById('title');
        let prefix = document.getElementById('prefix');
        let suffix = document.getElementById('Suffix');
        let phoneNumberDOM = document.getElementsByClassName('phoneNumber');
        let phoneTypeDOM = document.getElementsByClassName('phoneType');
        let setDefaultDOM = document.getElementsByClassName('setDefault');
        let phoneNumber = [];
        let phoneType = [];
        let setDefault = [];
        $( phoneNumberDOM ).each(function( index ) {
            phoneNumber[index] = this.value;
        });
        console.log(phoneNumber);
        $( phoneTypeDOM ).each(function( index ) {
            phoneType[index] = this.value;
        });
        console.log(phoneType);
        $( setDefaultDOM ).each(function( index ) {
            setDefault[index] = this.checked;
        });
        console.log(setDefault);
        // console.log(setDefault[0].checked);
        if(firstName.value == ""){
            firstNameMessage.style.display = "block";
            firstNameMessage.children[0].innerHTML = "<strong>Error!</strong> Please Insert First Name";
            console.log(firstNameMessage.children[0]);
        }
        else if(firstName.value.length > 50){
            firstNameMessage.style.display = "block";
            firstNameMessage.children[0].innerHTML = "<strong>Error!</strong> You Excced the 50 Character limit";
            console.log(firstNameMessage.children[0]);
        }
        else{
            firstNameMessage.style.display = "none";
        }

        if(lastName.value == ""){
            lastNameMessage.style.display = "block";
            lastNameMessage.children[0].innerHTML = "<strong>Error!</strong> Please Insert Last Name";
            console.log(lastNameMessage.children[0]);
        }
        else if(lastName.value.length > 50){
            lastNameMessage.style.display = "block";
            lastNameMessage.children[0].innerHTML = "<strong>Error!</strong> You Excced the 50 Character limit";
            console.log(lastNameMessage.children[0]);
        }
        else{
            lastNameMessage.style.display = "none";
        }
        
        console.log("Email");
        console.log(email.value);
        if( email.value != " " ){
            let checkEmail = email.value.search('@');
            if( checkEmail == -1 ){
                emailMessage.style.display = "block";
                emailMessage.children[0].innerHTML = "<strong>Error!</strong> Please Enter Your Email Format";
                console.log(emailMessage.children[0]);  
            }
            else{
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });
                $.ajax({
                    type:'POST',
                    url:'/check-email',
                        dataType: "json",
                        data: {'email': email.value},
                    success:function( response ) {
                        console.log(typeof response.status);
                        if(response.status == 201){
                            emailMessage.style.display = "block";
                            emailMessage.children[0].innerHTML = "<strong>Error!</strong> Please Insert Unique Email Address";
                            console.log(emailMessage.children[0]);  
                        }
                        else{
                            emailMessage.style.display = "none";
                        }
                    }
                });
            }
        }
        else{
            emailMessage.style.display = "block";
            emailMessage.children[0].innerHTML = "<strong>Error!</strong> Please Insert Email Address";
            console.log(emailMessage.children[0]); 
        }


        // Phone Validation
        // if(setDefaultDOM.)
        $( setDefaultDOM ).each(function( index ) {
            if(this.checked == true){
                console.log(phoneNumberDOM[index].value);
                if(phoneNumberDOM[index].value){
                    
                }
                else{
                    phoneMessage.style.display = "block";
                    phoneMessage.children[0].innerHTML = "<strong>Error!</strong> Please Enter Phone the Phone Number";
                    console.log(phoneMessage.children[0]);
                }
            }
            else{
                if(phoneNumberDOM[index].value){
                    
                }
                else{
                    phoneMessage.style.display = "block";
                    phoneMessage.children[0].innerHTML = "<strong>Error!</strong> Please Enter Phone the Phone Number";
                    console.log(phoneMessage.children[0]);
                }
            }
        });
        console.log(setDefault);
        if( lastNameMessage.style.display == 'none' && firstNameMessage.style.display == 'none' &&  emailMessage.style.display == "none" && phoneMessage.style.display == "none" ){
            // Submit Form
            
            let firstNameVal = firstName.value;
            let lastNameVal = lastName.value;
            let emailVal = email.value;
            let middleNameVal = middleName.value;
            let titleVal = title.value;
            let prefixVal = prefix.value;
            let suffixVal = suffix.value;
            let formData = {
                id,firstNameVal,lastNameVal,emailVal,middleNameVal,titleVal,prefixVal,suffixVal,phoneNumber,phoneType,setDefault
            };
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                type:'POST',
                url:'/update-contact',
                    dataType: "json",
                data: formData,
                success:function( response ) {
                        console.log(response);
                        e.target.innerText = "Submitted";
                        e.target.className = "btn btn-success w-100";
                        window.location.href = "http://127.0.0.1:8000/";
                }
                });
        }
        else{
            e.target.innerText = "Submit Again";
            e.target.className = "btn btn-danger w-100";
        }
    }

</script>
</body>
</html>