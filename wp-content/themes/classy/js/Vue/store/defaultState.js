const defaultState = () => {
  return {
    loggedIn: false,
    user: {
      username: '',
      email: '',
      photo: '',
      company: '',
      position: ''
    }
  }
}

export default defaultState

