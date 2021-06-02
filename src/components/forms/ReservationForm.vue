<template>

  <div class="ion-padding">
    <form v-if="displayButton === true" @submit.prevent="sendReservation" method="" action="" class="ion-padding">

      <input type="hidden" name="token">

      <div class="wrap-input">
        <input required placeholder="Date" v-model="dateInput" :min='today' class="input" type="date" id="date_select" name="date_select" >
      </div>

      <div class="wrap-input">
        <input required placeholder="Heure" v-model="hourInput"  type="time" id="hour_select" class="input" name="hour_select" min="09:00" max="18:00" step="3600" >
      </div>

      <div class="wrap-input">
        <input required placeholder="Email" v-model="emailInput"  type="email" class="input" id="email" name="email" >
      </div>

      <div style="display: flex; justify-content: space-around; align-items: center">
        <label class="label" for="cgu">
          J'ai lu et accepté les <a href="#">conditions d'utilisation</a>
        </label>
        <input required class="" v-model="cguInput" type="checkbox" checked id="cgu" name="cgu" >
      </div>


      <div class="container-form-btn ion-padding-top">
        <button class="form-btn custom-font">
          Réserver
        </button>
      </div>

    </form>
    <div v-else style="display: none;">
    </div>

    <div v-if="tokenWhenSend">
      <h1 style="font-size: 1.5rem;">Récapitulation de votre réservation</h1>
      <p class="ion-padding-top"> Date : {{ dateWhenSend }}</p>
      <p> Heure : {{ hourWhenSend }}</p>
    </div>
    <div v-if="tokenWhenSend" class="container-form-btn ion-padding-top">
      <a class="form-btn noDecoration custom-font ion-padding-top" :href="'/reservation/annulation/'+ tokenWhenSend">
        Annuler
      </a>
    </div>

  </div>

</template>

<script>
import axios from "axios";

export default  {
  name: 'Reservation',
  data () {
    return {
      today: "",
      resultError: "",
      tokenWhenSend: "",
      hourWhenSend: "",
      dateWhenSend: "",
      displayButton: true,
      resultStatus: "",
      emailInput: "",
      dateInput: "",
      hourInput: "",
      cguInput: true,
      thisToken: ""
    }
  },
  components: {

  },
  mounted () {
    let today = new Date();
    let dd = String(today.getDate()).padStart(2, '0');
    let mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
    let yyyy = today.getFullYear();

    today = yyyy + '-' + mm + '-' + dd ;
    this.today = today;
    console.log(this.today);
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
    sendReservation() {
      this.thisToken = Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15);

      console.log(this.thisToken, this.emailInput, this.hourInput, this.dateInput, this.cguInput)

      const reservation = {
        email: `${this.emailInput}`,
        date_select: `${this.dateInput}`,
        hour_select: `${this.hourInput}`,
        cgu: `${this.cguInput}`,
        token: `${this.thisToken}`
      };

      axios
          .post(
              `https://rushourcoach.herokuapp.com/api/reservation`, reservation
          )
          .then((response) => {
            this.resultStatus = response.data;
            this.$bus.emit("resultStatus", this.resultStatus);

            this.displayMessage(`${this.resultStatus.status}`, "success")
            this.tokenWhenSend = this.resultStatus.token;
            this.displayButton = false;

            //tentative :)
            this.hourWhenSend = this.resultStatus.hour;
            this.dateWhenSend = this.resultStatus.date;

            this.$bus.emit("hourWhenSend", this.hourWhenSend);
            this.$bus.emit("dateWhenSend", this.dateWhenSend);
            this.$bus.emit("tokenWhenSend", this.tokenWhenSend);

            console.log('Ici',  this.$bus.emit("hourWhenSend", this.hourWhenSend), this.$bus.emit("dateWhenSend", this.dateWhenSend), this.$bus.emit("tokenWhenSend", this.tokenWhenSend) )
            console.log('La', this.hourWhenSend, this.dateWhenSend, this.tokenWhenSend)

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

p {
  text-align: center;
  margin-bottom: -1em;
}

h1 {
  text-align: center;
  padding-top: 1rem;
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

.noDecoration {
  text-decoration: none;
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

ion-buttons ion-button ion-icon {
  color: #fff;
}

</style>