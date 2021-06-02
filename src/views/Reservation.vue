<template>
  <ion-page>
    <Menu />
    <ion-content :fullscreen="true">
      <div id="container">
        <!-- Content -->
<!--        <div>-->
<!--          <p>error</p>-->
<!--        </div>-->
        <h1>Réservation</h1>
        <ReservationForm />
      </div>
    </ion-content>
  </ion-page>
</template>

<script>
import { IonPage, IonContent } from '@ionic/vue';
import ReservationForm from '../components/forms/ReservationForm.vue'
import Menu from '../components/MenuApp.vue'

import { search, gridOutline } from 'ionicons/icons';
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'Reservation',
  components: {
    Menu,
    ReservationForm,
    IonPage,
    IonContent
  },
  setup() {
    return {
      search,
      gridOutline,
    }
  }
});
</script>

<style scoped>

h1 {
  text-align: center;
  margin-top: 5rem;
  font-size: 2rem;
}

</style>