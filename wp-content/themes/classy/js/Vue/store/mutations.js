const mutations = {
  
  set (state, data) {
    state = Object.assign(state, data)
  },
  
  setLoggedIn (state, value) {
    state.loggedIn = value
  },
  
  setUser (state, value) {
    state.user = value
  },
  
  setTranslations (state, value) {
    state.translations = value
  },
  
  setDefault (state) {
    state.loggedIn = false
    state.user = {
      username: '',
      email: '',
      photo: '',
      company: '',
      position: ''
    }
  }
  
}

export default mutations;
