<template>
  <div class="center">
    <h1>Tennis App</h1>
    <div v-if="winner != ''">
      <h3 class="blue">WINNER : <strong>{{ winner }}</strong> </h3>
      <input type="submit" value="Start New Match ?" @click="resetScore" />
    </div>
    
      <form @submit.prevent="onSubmit">
        <div class="row mt-4">
            <div class="col-6">
                <p>Player A</p>
                <h1>{{ scoreA }}</h1>
                <input type="text" v-validate="'required'" name="scoreA" v-model="formData.scoreA" class="text" />
                <span>{{ errors.first('scoreA') }}</span>
            </div>
            <div class="col-6">
                <p>Player B</p>
                <h1>{{ scoreB }}</h1>
                <input type="text" v-validate="'required'" name="scoreB" v-model="formData.scoreB" class="text" />
                <span>{{ errors.first('scoreB') }}</span>
            </div>
        </div>
        <div class="row mt-4">
          <div class="col-12">
            <input type="submit" value="submit" />
          </div>
        </div>
      </form>
  </div>
</template>

<script>
  export default {
    name: 'Home',
    props: {
      scoreA: [String, Number],
      scoreB: [String, Number],
      winner: String,
    },
    data () {
      return {
        formData: {
          scoreA: null,
          scoreB: null,
        },
      };
    },
    methods: {
      onSubmit () {
        this.$validator.validateAll().then((result) => {
          if (result) {
            this.$inertia.post('/', this.formData);
            return;
        }
        });
      },
      resetScore () {
        this.$inertia.get('/reset');
        window.location.reload();
      },
    },
  }
</script>

<style scoped>
  .center {
    margin: auto;
    width: 50%;
    padding: 10px;
  }
  .text {
    width: 100%;
  }
  .blue {
    color:blue !important;
  }
</style>