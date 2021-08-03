<template>
  <div class="container">    
    <div class="card text-white bg-success mb-3 mt-3 mx-auto">
        <div class="card-header" v-if="user">{{ user.name }}</div>
        <div class="card-body" v-if="list">
          <h5 class="card-title">期間：{{ list.first_day }} 〜 {{ list.last_day }}</h5>
          <h5 class="card-title">目標体重：{{ list.goal_weight }}kg</h5>
          <p class="card-text">1日あたりの消費カロリー：{{ list.lost_calorie }}kcal</p>
          <p class="card-text">1日あたりの摂取カロリー：{{ list.intake_calorie }}kcal</p>
        </div>
    </div>

    <ValidationObserver v-slot="{ invalid }">
      <form>
        <div class="mb-3">
          <label for="firstday" class="form-label">開始日</label>
          <ValidationProvider rules="required" name="開始日" v-slot="{ errors }">
            <input
              v-model="formData.firstday"
              type="date"
              class="form-control form-control-sm"
              id="firstday"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
        </div>

        <div class="mb-3">
          <label for="lastday" class="form-label">終了日</label>
          <ValidationProvider rules="required" name="終了日" v-slot="{ errors }">
            <input
              v-model="formData.lastday"
              type="date"
              class="form-control form-control-sm"
              id="lastday"
            />
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
        </div>

        <div class="mb-3">
          <label for="goalWeight" class="form-label">目標体重</label>
          <ValidationProvider rules="required|min_value:1" name="目標体重" v-slot="{ errors }">
            <input
              v-model="formData.goalweight"
              type="number"
              class="form-control form-control-sm"
              id="goalWeight"
              aria-describedby="goalWeightHelp"
              @keydown.69.prevent
              pattern="\d+\.?\d*"
            />
            <span>{{ errors[0] }}</span>
            <div id="goalWeightHelp" class="form-text"></div>
          </ValidationProvider>
        </div>

        <div class="mb-3">
          <label for="exercise" class="form-label">運動量</label>
          <ValidationProvider rules="required|selectCheck" name="運動量" v-slot="{ errors }">
            <select
              v-model="formData.exercise"
              class="form-select form-select-sm"
              id="exercise"
              aria-label=".form-select-sm example"
            >
              <option value="0" selected>ご自身の運動量を選択してください</option>
              <option value="1.2">ほぼ運動しない。通勤、デスクワーク程度</option>
              <option value="1.375">軽い運動。週に1回～2回程度の運動</option>
              <option value="1.55">中程度の運動。週に3回～5回程度の運動</option>
              <option value="1.725">激しい運動。週に6回～7回程度の運動</option>
              <option value="1.9">非常に激しい運動。一日に2回程度の運動</option>
            </select>
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
        </div>

        <div class="mb-3" v-if="physique_flg">
          <label for="gender" class="form-label">性別</label>
          <ValidationProvider rules="required|selectCheck" name="性別" v-slot="{ errors }">
            <select
              v-model="myPhysique.gender"
              class="form-select form-select-sm"
              id="gender"
              aria-label=".form-select-sm example"
            >
              <option value="0" selected>性別を選択してください</option>
              <option value="man">男性</option>
              <option value="woman">女性</option>
            </select>
            <span>{{ errors[0] }}</span>
          </ValidationProvider>
        </div>

        <div class="mb-3" v-if="physique_flg">
          <label for="age1" class="form-label">年齢</label>
          <ValidationProvider rules="required|numeric|min_value:1" name="年齢" v-slot="{ errors }">
            <input
              v-model="myPhysique.age"
              type="number"
              class="form-control form-control-sm"
              id="age1"
              aria-describedby="ageHelp"
              @keydown.69.prevent
            />
            <span>{{ errors[0] }}</span>
            <div id="ageHelp" class="form-text"></div>
          </ValidationProvider>
        </div>

        <div class="mb-3" v-if="physique_flg">
          <label for="height" class="form-label">身長</label>
          <ValidationProvider rules="required|min_value:1" name="身長" v-slot="{ errors }">
            <input
              v-model="myPhysique.height"
              type="number"
              class="form-control form-control-sm"
              id="height"
              aria-describedby="heightHelp"
              @keydown.69.prevent
              pattern="\d+\.?\d*"
            />
            <span>{{ errors[0] }}</span>
            <div id="heightHelp" class="form-text"></div>
          </ValidationProvider>
        </div>

        <div class="mb-3" v-if="physique_flg">
          <label for="exampleInputGoalWeight1" class="form-label">体重</label>
          <ValidationProvider rules="required|min_value:1" name="体重" v-slot="{ errors }">
            <input
              v-model="myPhysique.weight"
              type="number"
              class="form-control form-control-sm"
              aria-describedby="dateHelp"
              @keydown.69.prevent
              pattern="\d+\.?\d*"
            />
            <span>{{ errors[0] }}</span>
            <div id="dateHelp" class="form-text"></div>
          </ValidationProvider>
        </div>

        <div class="row">
          <button id="resultBtn" type="button" :disabled="invalid" class="btn btn-success col-6 mx-auto" @click="getProduct" data-bs-toggle="modal" data-bs-target="#resultModal">
            結果を見る
          </button>
        </div>
      </form>
    </ValidationObserver>

    <div class="alert alert-warning mt-3" role="alert" v-if="myPhysique.gender == 0 && myPhysique.age == '' && myPhysique.height == '' && myPhysique.weight == ''">
      *設定->プロフィール編集で性別、年齢、身長、体重を登録すると、計算時に省略することができます。
    </div>

    <!-- Modal -->
    <div class="modal fade" id="resultModal" tabindex="-1" aria-labelledby="resultModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="resultModalLabel">計算結果</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <label for="meals_of_day" class="form-label">1日の食事回数</label>
            <select v-model="meals_number" @change="changeMealsNumber" class="form-select form-select-sm" aria-label=".form-select-sm meals_of_day">
              <option value="1">1食</option>
              <option value="2">2食</option>
              <option selected value="3">3食</option>
              <option value="4">4食</option>
              <option value="5">5食</option>
              <option value="6">6食</option>
              <option value="7">7食</option>
              <option value="8">8食</option>
              <option value="9">9食</option>
              <option value="10">10食</option>
            </select>

            <p class="fw-bold mt-3">1日に摂取できるPFC</p>
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">たんぱく質：</th>
                  <td>{{ (result['protein_of_1day']) }}g</td>
                </tr>
                <tr>
                  <th scope="row">脂質：</th>
                  <td>{{ (result['fat_of_1day']) }}g</td>
                </tr>
                <tr>
                  <th scope="row">炭水化物：</th>
                  <td>{{ (result['carbohydrate_of_1day']) }}g</td>
                </tr>
              </tbody>
            </table>

            <p class="fw-bold mt-3">1食に摂取できるPFC</p>
            <table class="table">
              <tbody>
                <tr>
                  <th scope="row">たんぱく質：</th>
                  <td>{{protein_of_1meal}}g</td>
                </tr>
                <tr>
                  <th scope="row">脂質：</th>
                  <td>{{fat_of_1meal}}g</td>
                </tr>
                <tr>
                  <th scope="row">炭水化物：</th>
                  <td>{{carbohydrate_of_1meal}}g</td>
                </tr>
              </tbody>
            </table>

            <div class="alert alert-warning" role="alert">
              ※保存すると結果一覧からさらに細かい情報が得られます。
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">閉じる</button>
            <button type="button" class="btn btn-success" @click="createResult">保存する</button>
          </div>
        </div>
      </div>
    </div>

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

Vue.component('ValidationObserver', ValidationObserver);
Vue.component('ValidationProvider', ValidationProvider);
export default {
  name: "Home",
  data: () => ({
    formData: {
      firstday: "",
      lastday: "",
      goalweight: "",
      exercise: "0",
    },
    myPhysique: {
      gender: "0",
      age: "",
      height: "",
      weight: "",
    },


    msg: [],

    result: [],
    meals_number: "3",
    protein_of_1meal: "",
    fat_of_1meal: "",
    carbohydrate_of_1meal: "",

    user: null,
    list: [],
    physique_flg: true,
  }),
  methods: {
    getProduct() {
      axios.get("/api/calculation", {
          params: {
            first_day: this.formData.firstday,
            last_day: this.formData.lastday,
            goal_weight: this.formData.goalweight,
            exercise: this.formData.exercise,
            gender: this.myPhysique.gender,
            age: this.myPhysique.age,
            height: this.myPhysique.height,
            weight: this.myPhysique.weight,
          },
        })
        .then((response) => {
          let n = 2;
          this.result = response.data;
          this.protein_of_1meal = Math.round( (response.data['protein_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
          this.fat_of_1meal = Math.round( (response.data['fat_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
          this.carbohydrate_of_1meal = Math.round( (response.data['carbohydrate_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
        });
    },
    changeMealsNumber() {
      let n = 2;
      this.protein_of_1meal =  Math.round( (this.result['protein_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
      this.fat_of_1meal =  Math.round( (this.result['fat_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
      this.carbohydrate_of_1meal =  Math.round( (this.result['carbohydrate_of_1day'] / this.meals_number) * Math.pow( 10, n ) ) / Math.pow( 10, n );
    },
    createResult() {
        axios.post('/api/result', {
            user_id: this.user['id'],
            first_day: this.formData.firstday,
            last_day: this.formData.lastday,
            diet_term: this.result['date'],
            goal_weight: this.formData.goalweight,
            exercise: this.formData.exercise,
            meals_number: this.meals_number,
            lost_calorie: this.result['lost_calorie'],
            intake_calorie: this.result['intake_calorie'],
            need_protein: this.result['protein_of_1day'],
            need_fat: this.result['fat_of_1day'],
            need_carbohydrate: this.result['carbohydrate_of_1day'],
            gender: this.myPhysique.gender,
            age: this.myPhysique.age,
            height: this.myPhysique.height,
            weight: this.myPhysique.weight,
        })
        .then((res) => {
            this.msg['success_msg'] = res.data['msg'];
        })
    },
    logout() {
        axios.post('/api/logout')
            .then(() => {
                this.$router.push({ name: "Login" });
            })
    }
    // dateCheck() {
    //   let firstday = new Date(this.firstday);
    //   let lastday  = new Date(this.lastday);
    //   console.log(firstday);
    //   console.log(lastday);
    //   console.log(lastday.getTime());
    //   console.log(firstday.getTime());
    //   if(lastday.getTime() < firstday.getTime()) {
    //     $('#resultBtn').removeAttr('disabled');
    //   }else {
    //     $('#resultBtn').attr('disabled');
    //   }
    // },
  },
  mounted() {
      axios.get('/api/user')
        .then((res) => {
            this.user = res.data
            axios.get('/api/getphysique', {
                params: {
                    user_id: this.user['id']
                }
            })
            .then((res) => {
                if(res.data) {
                  this.physique_flg = false;
                  this.myPhysique.gender = res.data['gender'];
                  this.myPhysique.age = res.data['age'];
                  this.myPhysique.height = res.data['height'];
                  this.myPhysique.weight = res.data['weight'];
                }
            });
            axios.get('/api/getlist-active', {
                params: {
                    user_id: this.user['id']
                }
            })
            .then((res) => {
                this.list = res.data;
            })
        })
  }
};

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style>
</style>
