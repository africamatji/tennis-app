<template>
  <div class="center">
    <h1>Tennis App</h1>
      <form @submit.prevent="onSubmit">
        <div class="row mt-4">
            <div class="col-6">
                <p>Player A</p>
                <h1>{{ scoreA }}</h1>
                <input type="text" v-validate="'required|max_value:3'" name="scoreA" v-model="formData.scoreA" class="text" />
                <span>{{ errors.first('scoreA') }}</span>
            </div>
            <div class="col-6">
                <p>Player B</p>
                <h1>{{ scoreB }}</h1>
                <input type="text" v-validate="'required|max_value:3'" name="scoreB" v-model="formData.scoreB" class="text" />
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
      scoreA: Number,
      scoreB: Number,
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
</style>