<template>
  <ion-header :translucent="true" class="ion-no-border">
    <ion-toolbar>

      <ion-buttons slot="start">
        <ion-button href="/">
          <ion-icon slot="end" :icon="gridOutline"></ion-icon>
        </ion-button>
      </ion-buttons>
      <ion-buttons slot="end">
        <ion-button>
          <ion-icon slot="start" :icon="search"></ion-icon>
        </ion-button>
      </ion-buttons>

    </ion-toolbar>
  </ion-header>
</template>

<script>
import { IonHeader, IonToolbar, IonButtons, IonButton, IonIcon } from '@ionic/vue';
import { search, gridOutline } from 'ionicons/icons';

export default  {
  name: 'Menu',
  data () {
    return {
    }
  },
  components: {
    IonHeader,
    IonToolbar,
    IonButtons,
    IonButton,
    IonIcon
  },
  methods: {

  },
  setup() {
    return {
      search,
      gridOutline
    }
  }
}
</script>

<style scoped>

ion-buttons ion-button ion-icon {
  color: #fff;
}

</style>