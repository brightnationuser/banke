<template>
  <div class="user-avatar" :class="classes">
    <div class="user-avatar__img">
      <div class="user-avatar__img-wrap">
        <img :src="profileImage" alt="Profile">
      </div>
      <label for="upload-user-file" v-if="addIcon" class="user-avatar__icon" @click="selectAvatar">
        <i class="icon-plus-bold"></i>
        <input class="user-avatar__file-input" type="file" ref="uploadFile" id="upload-user-file"
               @change="requestUploadFile()"/>
      </label>
    </div>
  </div>
</template>

<script>
import 'cropperjs/dist/cropper.css';

import {mapState} from 'vuex';
import VueCropper from 'vue-cropperjs';

export default {
  name: 'UserAvatar',
  props: {
    image: {
      type: String,
    },
    addIcon: {
      type: Boolean,
      default: true
    },
    classes: {
      type: String
    }
  },

  components: {
    VueCropper
  },

  data() {
    return {
      userData: {},
      profileImage: '',
    }
  },

  mounted() {
    if (this.image === '' || typeof this.image === "undefined") {
      this.profileImage = require('../../assets/icons/profile.svg')
    } else {
      this.profileImage = this.image
    }

    this.userData = this.user;
  },

  created() {
  },

  updated() {
  },

  methods: {
    selectAvatar(e) {
      e.stopPropagation()
    },

    requestUploadFile() {
      let files = this.$refs.uploadFile.files;

      let formData = new FormData();
      formData.append("action", 'user_account__upload_photo');
      formData.append("image", files[0]);

      axios.post('/wp-admin/admin-ajax.php', formData).then((response) => {

        this.profileImage = response.data.file_info.path
        this.userData.photo = response.data.file_info.path
        this.$store.commit('setUser', this.userData)
      })
    }
  },

  watch: {},

  computed: {
    ...mapState({
      user: state => state.user
    })
  }
}
</script>

<style lang="scss" scoped>
.user-avatar {
  &__img {
    cursor: pointer;
    max-width: 70px;
    width: 100%;
    position: relative;
  }

  &__img-wrap {
    background-color: #ededed;
    border-radius: 50%;
    width: 70px;
    height: 70px;
    overflow: hidden;

    img {
      object-fit: cover;
      width: 100%;
      height: 100%;
    }
  }

  &__icon {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    border: 2px solid #fff;
    color: #ffffff;
    font-size: 8px;
    background-color: #005CA9;
    bottom: 0;
    right: 0;
    position: absolute;
    display: flex;
    justify-content: center;
    align-items: center;
    transition: all .2s ease;

    &:hover {
      border: 2px solid #effdfd;
      color: #effdfd;
      background-color: darken(#005CA9, 10%);
    }
  }

  &__file-input {
    display: none;
  }

  &--small {
    .user-avatar {
      &__img {
        max-width: 42px;
      }

      &__img-wrap {
        width: 42px;
        height: 42px;
      }
    }
  }
}

@media (max-width: 500px) {
  .user-avatar {

    &__img-wrap {
      width: 50px;
      height: 50px;
    }
  }
}

</style>