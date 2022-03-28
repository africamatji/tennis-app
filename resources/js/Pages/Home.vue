<template>
  <div class="center">
    <h1>Welcome</h1>
    <form action="" method="POST">
      <div class="row">
          <div class="col-6">
              <p>Player A</p>
              <h1>{{ playerAscore }}</h1>
              <input type="text" name="scoreA" class="text" />
          </div>
          <div class="col-6">
              <p>Player B</p>
              <h1>{{ playerBscore }}</h1>
              <input type="text" name="scoreB" class="text" />
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
    data () {
      return {
        playerAscore: 0,
        playerBscore: 0,
      };
    },
    methods: {
      submit () {
        if (this.$refs.form.validate()) {
            this.$inertia.post('/user/create', this.formData)
        }
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