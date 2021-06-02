<template>
  <ion-app>
    <ion-router-outlet />
  </ion-app>
</template>

<script>
import { IonApp, IonRouterOutlet } from '@ionic/vue';
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'App',
  components: {
    IonApp,
    IonRouterOutlet
  }
});
</script>

<style>

/* PERSONNALISATION */
ion-content {
  --background: rgb(63,94,251);
  --background: linear-gradient(180deg, rgba(63,94,251,1) 0%, rgba(252,70,107,1) 100%);
  font-family: "Roboto Thin";
}
ion-toolbar {
  --background: rgba(0,0,0,0);
}


</style>