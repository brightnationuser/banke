<div class="popup--account popup--login">
    <div class="account-form account-form--login">
        <div class="account-form__title">Sign In</div>
        <div class="account-form__content">
            <div class="account-form__column">
                <div class="account-form__row">
                    <div class="account-form__field account-form__field--has-error">
                        <label class="field__label" for="user-email">Email</label>
                        <div class="field__input-wrap">
                            <input class="field__input" type="email" id="user-email" name="user-email" placeholder="Enter your email">
                            <i class="field__input-action field__input-action--error icon-warning"></i>
                        </div>
                        <div class="field__error">Incorrect email address</div>
                    </div>
                </div>
                <div class="account-form__row">
                    <div class="account-form__field">
                        <label class="field__label" for="user-password">Password</label>
                        <div class="field__input-wrap">
                            <i class="field__input-action icon-eye js-password-toggle"></i>
                            <input class="field__input" type="password" id="user-password" name="user-password" placeholder="Enter your password">
                        </div>
                        <div class="field__error">Incorrect password</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="account-form__row account-form__row--buttons">
            <div class="button button--account account-form__button">
                Login
            </div>
            <div class="button button--account button--stroke account-form__button">
                Sign up
            </div>
        </div>
        <div class="account-form__row account-form__row--text-link">
            <div class="button button--text">
                Forgot password?
            </div>
        </div>
    </div>
</div>