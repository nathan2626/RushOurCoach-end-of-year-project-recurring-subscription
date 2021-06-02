<template>
  <ion-page>
    <Menu />
    <ion-content :fullscreen="true">
      <div id="container">
        <!-- Content -->
        <h1>Annulation</h1>
        <AnnulationForm />
      </div>
    </ion-content>
  </ion-page>
</template>

<script>
import { IonPage, IonContent } from '@ionic/vue';
import AnnulationForm from '../components/forms/AnnulationForm.vue'
import Menu from '../components/MenuApp.vue'

import { defineComponent } from 'vue';

export default defineComponent({
  name: 'Annulation',
  components: {
    AnnulationForm,
    Menu,
    IonPage,
    IonContent
  },
  setup() {
    return {

    }
  }
});
</script>

<style scoped>

h1 {
  text-align: center;
  margin-top: 5rem;
}

</style>