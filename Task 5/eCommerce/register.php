<?php
$title = "Register";
include_once "layouts/header.php";
include_once "layouts/nav.php";
include_once "layouts/breadcrumb.php";
include_once "app/requests/Validation.php";
if ($_POST) {
    $emailValidation = new Validation('email',$_POST['email']);
    $emailRequiredResult = $emailValidation->required();
    $emailPattern = "/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/";
    if (empty($emailRequiredResult)) {
        $emailRegexResult = $emailValidation->regex($emailPattern);
        if (empty($emailRegexResult)) {
            $emailUniqueResult = $emailValidation->unique('users');
            if (empty($emailUniqueResult)) {
                "";
            }
        }
    }

    $phoneValidation = new Validation('phone',$_POST['phone']);
    $phoneRequiredResult = $phoneValidation->required();
    $phonePattern = "/^01[0-2,5,9]{1}[0-9]{8}$/";    
    if (empty($phoneRequiredResult)) {
        $phoneRegexResult = $phoneValidation->regex($phonePattern);
        if (empty($phoneRegexResult)) {
            $phoneUniqueResult = $phoneValidation->unique('users');
            if (empty($phoneUniqueResult)) {
                "";
            }
        }
    }

    $passwordValidation = new Validation('password',$_POST['password']);
    $passwordRequiredResult = $passwordValidation->required();
    $passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,15}$/";
    if (empty($passwordRequiredResult)) {
        $passwordRegexResult = $passwordValidation->regex($passwordPattern);
        if (empty($passwordRegexResult)) {
            $passwordConfirmationResult = $passwordValidation->confirmed($_POST['passwoed_confirmation']);
            if (empty($passwordConfirmationResult)) {
                "";
            }
        }
    }
    
}
?>
        <div class="login-register-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                        <div class="login-register-wrapper">
                            <div class="login-register-tab-list nav">
                                
                                <a class="active" data-toggle="tab" href="#lg2">
                                    <h4> register </h4>
                                </a>
                            </div>
                            <div class="tab-content">
                                <div id="lg2" class="tab-pane active">
                                    <div class="login-form-container">
                                        <div class="login-register-form">
                                        <form method="post">
                                                <input type="text" name="first_name" placeholder="First Name" value="<?php if(isset($_POST['first_name'])){echo $_POST['first_name'];}?>">
                                                <input type="text" name="last_name" placeholder="Last Name" value="<?php if(isset($_POST['last_name'])){echo $_POST['last_name'];}?>">
                                                <input type="email" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])){echo $_POST['email'];}?>">
                                                <?= empty($emailRequiredResult) ? "" : "<div class='alert alert-danger'>$emailRequiredResult</div>";?>
                                                <?= empty($emailRegexResult) ? "" : "<div class='alert alert-danger'>$emailRegexResult</div>";?>
                                                <?= empty($emailUniqueResult) ? "" : "<div class='alert alert-danger'>$emailUniqueResult</div>";?>
                                                <input type="number" name="phone" placeholder="Phone" value="<?php if(isset($_POST['phone'])){echo $_POST['phone'];}?>">
                                                <?= empty($phoneRequiredResult) ? "" : "<div class='alert alert-danger'>$phoneRequiredResult</div>";?>
                                                <?= empty($phoneRegexResult) ? "" : "<div class='alert alert-danger'>$phoneRegexResult</div>";?>
                                                <?= empty($phoneUniqueResult) ? "" : "<div class='alert alert-danger'>$phoneUniqueResult</div>";?>
                                                <input type="password" name="password" placeholder="Password">
                                                <?= empty($passwordRequiredResult) ? "" : "<div class='alert alert-danger'>$passwordRequiredResult</div>";?>
                                                <?= empty($passwordRegexResult) ? "" : "<div class='alert alert-danger'>Minimum eight and maximum 15 characters, at least one uppercase letter, one lowercase letter, one number and one special characte</div>";?>
                                                <input type="password" name="passwoed_confirmation" placeholder="Confirm Password">
                                                <?= empty($passwordConfirmationResult) ? "" : "<div class='alert alert-danger'>$passwordConfirmationResult</div>";?>
                                                <select name="gender" class="form-control" id="">
                                                    <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'm') ? 'selected' : '' ?> value="m">Male</option>
                                                    <option <?= (isset($_POST['gender']) && $_POST['gender'] == 'f') ? 'selected' : '' ?> value="f">Female</option>
                                                </select>
                                                <div class="button-box mt-5">
                                                    <button type="submit"><span>Register</span></button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

<?php

include_once "layouts/footer.php";
include_once "layouts/footer-scripts.php";

?>