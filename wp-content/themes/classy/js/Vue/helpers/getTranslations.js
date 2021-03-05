import axios from "axios";
import store from "../store";

export default function getTranslations() {
    let data = new FormData()
    data.append('action', 'user_account__translations')
    
    axios.post('/wp-admin/admin-ajax.php', data)
      .then((response) => {
          // console.log('response', response.data)
          store.commit('setTranslations', response.data)
      })
}
