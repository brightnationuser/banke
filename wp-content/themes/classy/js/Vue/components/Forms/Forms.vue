<template>
    <div class="sign-in-wrapper">
        <div class="sign-in" @click="setForm('SignIn')" v-if="!loggedIn">
            <i class="icon-user-fill"></i>
            <span>{{ translations.titles.sign_in }}</span>
        </div>
        <div class="sign-in" v-else>
            <div class="sign-in-profile__wrapper">
                <i class="icon-user-fill"></i>
                <span>
          <a class="menu__elem menu__elem--active" href="/account/specification">
            <div class="menu__elem menu__elem--active">
              {{ user.username }}
            </div>
          </a>
        </span>
            </div>

            <i class="icon-arrow-down"></i>
            <div class="sign-in__dropdown">
                <DropDownCard></DropDownCard>
            </div>
        </div>
        <SignIn
            v-if="showForm === 'SignIn'"
            :creationSuccess="creationSuccess"
            @close="setForm(false)"
            @switchForm="switchForm"
        ></SignIn>
        <SignUp
            v-if="showForm === 'SignUp'"
            @close="setForm(false)"
            @switchForm="switchForm"
        ></SignUp>
        <ResetPassword
            v-if="showForm === 'ResetPassword'"
            @close="setForm(false)"
            @switchForm="switchForm"
        ></ResetPassword>
    </div>
</template>

<script>
import {mapState} from "vuex";

import SignIn from "./SignIn";
import SignUp from "./SignUp";
import ResetPassword from "./ResetPassword";
import DropDownCard from "./DropDownCard"

export default {
    name: 'Forms',
    props: [],
    components: {
        SignIn,
        SignUp,
        ResetPassword,
        DropDownCard
    },
    data() {
        return {
            creationSuccess: false,
            userData: {
                username: '',
                email: '',
                photo: '',
                company: '',
                position: ''
            },
            showForm: false
        }
    },

    mounted() {

        let data = new FormData();
        data.append('action', 'user_account__check');

        axios.post('/wp-admin/admin-ajax.php', data)
            .then((response) => {
                if (response.data.success) {
                    this.userData = response.data.user
                    this.logIn()
                } else {
                    this.$store.commit('setDefault')
                }
            })
    },

    methods: {
        setForm(formName) {
            this.showForm = formName
        },

        switchForm(formName, additionalParam = false) {
            this.creationSuccess = additionalParam
            this.showForm = formName
        },

        logIn() {
            this.$store.commit('setLoggedIn', true)
            this.$store.commit('setUser', this.userData)
        },
    },

    watch: {},

    computed: {
        ...mapState({
            loggedIn: 'loggedIn',
            user: 'user'
        }),
    }
}
</script>

<style lang="scss">
.sign-in {
    cursor: pointer;
    display: flex;
    align-items: center;
    color: #003462;
    //margin-bottom: -3px;
    position: relative;
    font-size: 16px;
    font-weight: 600;

    @media (min-width: 1201px) {

        .home & {
            color: #FFFFFF;
        }

        .home .white & {
            color: #003462;
        }

        .home &:after {
            border-top-color: #ffffff;
        }

        .home .white &:after {
            border-top-color: #005CA9;
        }

        &:after {
            content: "";
            position: absolute;
            width: 0;
            border-top: 2px solid #005CA9;
            top: 30px;
            display: block;
            left: 50%;
            transform: translateX(-50%);
            opacity: 0;
            transition: all 0.35s ease;
        }

        &:hover {
            &:after {
                opacity: 1;
                width: 100%;
            }
        }
    }

    &-profile__wrapper {
        display: flex;
        align-items: center;
    }

    .menu__elem, .icon-user {
        color: #003462;

        .home & {
            @media (min-width: 1201px) {
                color: #ffffff;
            }
        }

        .home .white & {
            @media (min-width: 1201px) {
                color: #003462;
            }
        }
    }

    i {
        margin-right: 7px;
        color: #005ca9;

        .home & {
            @media (min-width: 1201px) {
                color: #ffffff;
            }
        }

        .home .white & {
            @media (min-width: 1201px) {
                color: #003462;
            }
        }
    }

    .menu__elem {
        max-width: 90px;
        text-overflow: ellipsis;
        overflow: hidden;
        white-space: nowrap;

        &:hover {
            text-decoration: none;
        }

        &:visited {
            color: #003462;
        }
    }

    .icon-arrow-down {
        font-size: 7px;
        margin-left: 5px;
        margin-bottom: -2px;
        color: #18466e;
        transition: all .3s ease;
    }

    &__dropdown {
        position: absolute;
        top: calc(100% + 11px);
        right: 0;
        width: 200px;
        opacity: 0;
        visibility: hidden;
        transition: all .3s ease;
    }

    &:hover {
        .icon-arrow-down {
            transform: rotate(-180deg);
        }

        .sign-in {
            &__dropdown {
                opacity: 1;
                visibility: visible;
            }
        }
    }
}

@media (max-width: 1366px) and (min-width: 1200px) {
    .sign-in {
        font-size: 13px;
    }
}

@media (max-width: 1200px) {
    .sign-in {
        //margin-top: 16px;

        &-profile__wrapper {
            display: none;
        }

        &__dropdown {
            width: 100%;
            position: static;
            opacity: 1;
            visibility: visible;
        }

        .icon-arrow-down {
            display: none;
        }
    }
}

@media screen and (max-width: 992px) {
    .sign-in {
        cursor: default;
    }
}
</style>
