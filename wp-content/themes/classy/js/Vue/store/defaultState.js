const defaultState = () => {
  return {
    loggedIn: false,
    user: {
      approved: false,
      username: '',
      email: '',
      photo: '',
      company: '',
      position: ''
    },
    translations: {
      titles: {
        sign_in: 'Sign In',
        forgot_password: '',
        sign_up: '',
        welcome_to_banke: '',
        reset_password: '',
        specifications: '',
        manuals: '',
        video_gallery: '',
        models_3d : '',
        search : '',
        edit_profile : '',
        personal_information : '',
        company_information : '',
      },
      fields: {
        email: '',
        enter_your_email: '',
        your_question: '',
        password: '',
        enter_your_password: '',
        confirm_password: '',
        confirm_your_password: '',
        new_password: '',
        enter_new_password: '',
        name: '',
        enter_your_name: '',
        company: '',
        enter_company_name: '',
        job_position: '',
        enter_job_position: '',
        search_files: '',
        write_your_question_here: '',
      },
      texts: {
        account_successfully_created: '',
        forgot_password_form: '',
        reset_email_success: '',
        help_email_success: '',
        reset_password_email_1: '',
        reset_password_email_2: '',
        reset_password_complete: '',
        create_account_email: '',
        need_heelp_text: '',
      },
      buttons: {
        login: '',
        sign_up: '',
        reset_password: '',
        save_password: '',
        create_account: '',
        sign_in: '',
        confirm_email: '',
        need_a_help: '',
        log_out: '',
        save_changes: '',
        cancel: '',
        change_password: '',
        send: '',
        edit_profile: '',
        back_to_sign_in: '',
      },
      errors: {
        required_field: '',
        incorrect_email: '',
        incorrect_password: '',
        password_too_short: '',
        passwords_dont_match: '',
        name_already_used: '',
        email_already_used: '',
      }
    }
  }
}

export default defaultState

