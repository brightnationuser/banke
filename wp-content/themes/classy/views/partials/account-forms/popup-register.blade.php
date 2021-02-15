<div class="popup--account popup--register">
    <div class="account-form account-form--register">
        <div class="account-form__title">Sign In</div>
        <div class="account-form__content">
            <div class="account-form__column">
                <div class="account-form__row">
                    <div class="account-form__field account-form__field--has-error">
                        <label class="field__label" for="user-name">Name</label>
                        <div class="field__input-wrap">
                            <input class="field__input" type="text" id="user-name" name="user-name" placeholder="Enter your name">
                            <i class="field__input-action field__input-action--error icon-warning"></i>
                        </div>
                        <div class="field__error">This field is required</div>
                    </div>
                </div>
                <div class="account-form__row">
                    <div class="account-form__field">
                        <label class="field__label" for="user-company">Company</label>
                        <div class="field__input-wrap">
                            <input class="field__input" type="text" id="user-company" name="user-company" placeholder="Enter company name">
                        </div>
                        <div class="field__error">This field is required</div>
                    </div>
                </div>
                <div class="account-form__row">
                    <div class="account-form__field">
                        <label class="field__label" for="user-position">Job Position</label>
                        <div class="field__input-wrap">
                            <input class="field__input" type="text" id="user-position" name="user-position" placeholder="Enter job position">
                        </div>
                        <div class="field__error">This field is required</div>
                    </div>
                </div>
            </div>
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
                <div class="account-form__row">
                    <div class="account-form__field">
                        <label class="field__label" for="user-password-repeat">Confirm password</label>
                        <div class="field__input-wrap">
                            <i class="field__input-action icon-eye js-password-toggle"></i>
                            <input class="field__input" type="password" id="user-password-repeat" name="user-password-repeat" placeholder="Confirm your password">
                        </div>
                        <div class="field__error">Passwords dont match</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="account-form__row account-form__row--buttons">
            <div class="button button--account account-form__button">
                Create account
            </div>
            <div class="button button--account button--stroke account-form__button">
                Sign In
            </div>
        </div>
    </div>
</div>