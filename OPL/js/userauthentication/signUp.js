// JavaScript Document

        function signupformValidation() {
            var firstname = document.signupform.firstname;
            var lastname = document.signupform.lastname;
            var email = document.signupform.email;
            var password = document.signupform.password;
			var cpassword = document.signupform.cpassword;

            /*Validate*/
			var all_letters = /^[A-Za-z "]+$/;
			var val_email = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            var lower_num = /^[a-z0-9]+$/;
            var upper_lower_number = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/;


            /*First Name Contain Only Alphabet*/
			if (!lastname.value.match(all_letters)) {
                alert("Last name must contain only alphabet characters.");
                lastname.focus();
                return false;
            }
			/*Email Format*/
			else if (!email.value.match(val_email)) {
                alert("You have entered an invalid email address!");
                email.focus();
                return false;
            }
            /*Password Contain Only Uppercase, Lowercase,min 8 length*/
            else if (!password.value.match(upper_lower_number)) {
                alert("Format password is wrong. Please insert the password contains at least one uppercase, one lowercase, one number and the minimum password length is eight.");
                password.focus();
                return false;
            }
			/*Password and confirm password must be same*/
			else if (password.value != cpassword.value) {
                alert("Password and confirm password is not same.");
                cpassword.focus();
                return false;
            }
        }
        
        function myFunction() {
            location.replace("https://crimsonwebs.com/s272043/OPL/html/landingpage.php")
            }