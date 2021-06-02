<template>

  <div class="ion-padding">
    <form @submit.prevent="sendAnnulation" action="" class="ion-padding">

      <input type="hidden" name="token">

      <div style="display: flex; justify-content: space-around; align-items: center">
        <label class="label" for="cgu">
          J'ai lu et accepté les <a href="#">conditions d'utilisation</a>
        </label>
        <input class="" v-model="cguInput" type="checkbox" checked id="cgu" name="cgu" required>
      </div>


      <div v-if="displayButtonAnnulation === true" class="container-form-btn ion-padding-top">
        <button class="form-btn custom-font">
          Annuler
        </button>
      </div>

    </form>

    <div v-if="displayRecap === true " class=" ion-padding-top">
      <p>{{ this.dateWhenSend }}</p>
      <p>{{ this.hourWhenSend }}</p>
    </div>

    <div v-if="displayButtonReservation === true " class="container-form-btn ion-padding-top">
      <a class="form-btn noDecoration custom-font" href="/reservation">
        Reserver
      </a>
    </div>

  </div>

</template>

<script>
import axios from "axios";

export default  {
  name: 'Annulation',
  data () {
    return {
      displayButtonAnnulation: true,
      displayButtonReservation: false,
      displayRecap: false,
      hourWhenSend: "",
      dateWhenSend: "",
      tokenWhenSend: "",
      cguInput: true
    }
  },
  components: {

  },
  mounted() {
    this.$bus.on('hourWhenSend', (hourWhenSend) => {
      this.hourWhenSend = hourWhenSend;
      console.log('aaaaaa' + this.hourWhenSend);
    })
    this.$bus.on('dateWhenSend', (dateWhenSend) => {
      this.dateWhenSend = dateWhenSend;
      console.log(this.dateWhenSend)
    })
    this.$bus.on('tokenWhenSend', (tokenWhenSend) => {
      this.tokenWhenSend = tokenWhenSend;
      console.log(this.tokenWhenSend)
    })
    if(this.tokenWhenSend === this.$route.params.token) {
      this.displayRecap = true;
    }
  },
  methods: {
    displayMessage(msg, type){
      const toast = document.createElement('ion-toast');
      toast.message = msg;
      toast.duration = 5000;
      toast.color = type;
      document.body.appendChild(toast);
      return toast.present();
    },
    sendAnnulation() {

      const annulation = {
        cgu: `${this.cguInput}`,
        token: `${this.$route.params.token}`
      };

      axios
          .post(
              `https://rushourcoach.herokuapp.com/api/reservation/annulation/${this.$route.params.token}`, annulation
          )
          .then((response) => {
            console.log(this.$route.params.token)

            this.resultStatus = response.data;
            this.$bus.emit("resultStatus", this.resultStatus);

            this.displayMessage(`${this.resultStatus.status}`, "success")

            this.displayButtonAnnulation = false;
            this.displayButtonReservation = true;

            console.log(response.data)
          })
          .catch((error) => {
            this.resultError = error.response.data.errors;
            this.$bus.emit("resultError", this.resultError);

            if(Object.values(this.resultError).length > 1){
              this.displayMessage(`Plusieurs champs du formualaire n'ont pas été remplis..`, "danger")

            } else {
              this.displayMessage(`${Object.values(this.resultError)}`, "danger")
            }


            console.log(Object.values(this.resultError));
          })
    }
  },
  setup() {
    return {

    }
  }
}
</script>

<style scoped>

.wrap-input {
  background-color: rgba(255, 255, 255, .5);
  border-radius: 20px;
  margin-bottom: 26px;
  box-shadow: 0 10px 30px 0 rgba(57,71,82, 0.12);
}

.input {
  display: block;
  width: 100%;
  background: transparent;
  font-size: 16px;
  line-height: 1.2;
  border: none;
  outline: none;
  height: 46px;
  padding: 0 20px 0 23px;
  color: #000;
}

.label a {
  color: #000;
  text-decoration: none;
}
.label {
  font-size: 0.9em;
}

.container-form-btn {
  display: flex;
  justify-content: center;
}

.form-btn {
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 0 20px;
  min-width: 160px;
  height: 42px;
  background-color: #455EF7;
  border-radius: 20px;
  font-size: 14px;
  color: #fff;
  text-transform: uppercase;
  margin-top: 50px;
  transition: all .4s;
  box-shadow: 0 10px 30px 0 rgba(57,71,82, 0.5);
}

.form-btn:hover {
  background-color: #fff;
  color: #455EF7;
  box-shadow: 0 10px 30px 0 rgba(57,71,82, 0.8);
}

.noDecoration {
  text-decoration: none;
}

ion-buttons ion-button ion-icon {
  color: #fff;
}

</style>