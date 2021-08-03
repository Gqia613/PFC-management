<template>
    <div class="container">
        <div class="mt-3 mb-3">
            <router-link :to="{ name: 'Setting'}" class="text-success">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
                戻る
            </router-link>
        </div>
        <ValidationObserver v-slot="{ invalid }">
        <form>
            <div class="mb-3 mt-3">
            <label for="exampleInputGoalWeight1" class="form-label">性別</label>
            <ValidationProvider rules="required|selectCheck" name="性別" v-slot="{ errors }">
                <select
                v-model="gender"
                class="form-select form-select-sm"
                aria-label=".form-select-sm example"
                >
                <option value="0" selected>性別を選択してください</option>
                <option value="man">男性</option>
                <option value="woman">女性</option>
                </select>
                <span>{{ errors[0] }}</span>
            </ValidationProvider>
            </div>

            <div class="mb-3">
            <label for="exampleInputGoalWeight1" class="form-label">年齢</label>
            <ValidationProvider rules="required|numeric|min_value:1" name="年齢" v-slot="{ errors }">
                <input
                v-model="age"
                type="number"
                class="form-control form-control-sm"
                aria-describedby="dateHelp"
                @keydown.69.prevent
                pattern="\d+\.?\d*"
                />
                <span>{{ errors[0] }}</span>
            </ValidationProvider>
            <div id="dateHelp" class="form-text"></div>
            </div>

            <div class="mb-3">
            <label for="exampleInputGoalWeight1" class="form-label">身長</label>
            <ValidationProvider rules="required|min_value:1" name="身長" v-slot="{ errors }">
                <input
                v-model="height"
                type="number"
                class="form-control form-control-sm"
                aria-describedby="dateHelp"
                @keydown.69.prevent
                pattern="\d+\.?\d*"
                />
                <span>{{ errors[0] }}</span>
            </ValidationProvider>
            <div id="dateHelp" class="form-text"></div>
            </div>

            <div class="mb-3">
            <label for="exampleInputGoalWeight1" class="form-label">体重</label>
            <ValidationProvider rules="required|min_value:1" name="体重" v-slot="{ errors }">
                <input
                v-model="weight"
                type="number"
                class="form-control form-control-sm"
                aria-describedby="dateHelp"
                @keydown.69.prevent
                pattern="\d+\.?\d*"
                />
                <span>{{ errors[0] }}</span>
            </ValidationProvider>
            <div id="dateHelp" class="form-text"></div>
            </div>
            <div class="row">
            <button id="resultBtn" type="button" :disabled="invalid" @click="register" class="btn btn-success col-6 mx-auto">
                設定する
            </button>
            </div>
        </form>
        </ValidationObserver>
    </div>
</template>

<script>
import Vue from 'vue';
import { required, numeric, min_value } from 'vee-validate/dist/rules';
import { ValidationObserver, ValidationProvider, extend, localize } from 'vee-validate';

// Add a rule.
extend('required', {
  ...required,
  message: '{_field_}は必須です'
});

extend('numeric', {
  ...numeric,
  message: '{_field_}は数値を入力してください'
});

extend('min_value', {
  ...min_value,
  message: '{_field_}は0以上の数値を入力してください'
});

extend('selectCheck', value => {
  if (value !== "0") {
    return true;
  }
  return '{_field_}を選択してください';
});
import axios from 'axios'


Vue.component('ValidationObserver', ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);
export default {
    name: 'MyPhysique',
    data: () => ({
        gender: "0",
        age: "",
        height: "",
        weight: "",
        msg: "",

        userId: "",
    }),
    methods: {
        register() {
            axios.post('/api/physique', {
                user_id: this.userId,
                gender: this.gender,
                age: this.age,
                height: this.height,
                weight: this.weight,
            })
            .then((response) => {
                this.msg = response.data;
            })
        },
    },
    mounted() {
        axios.get('/api/user')
        .then((res) => {
            this.userId = res.data['id'];
            axios.get('/api/getphysique', {
                params: {
                    user_id: this.userId
                }
            })
            .then((res) => {
                if(res.data) {
                    this.gender = res.data['gender'];
                    this.age = res.data['age'];
                    this.height = res.data['height'];
                    this.weight = res.data['weight'];
                }
            })
        })
    }
}
</script>

<style scoped>
</style>
