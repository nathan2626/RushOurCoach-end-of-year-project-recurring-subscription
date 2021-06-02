<template>
  <ion-page>

    <Menu />

    <ion-content :fullscreen="true">
      <div id="container">
        <!-- Content -->
        <ion-segment scrollable value="1">
          <ion-segment-button value="1">
            <ion-label>Yoga</ion-label>
          </ion-segment-button>
          <ion-segment-button value="2">
            <ion-label>Musculation</ion-label>
          </ion-segment-button>
          <ion-segment-button value="3">
            <ion-label>Fitness</ion-label>
          </ion-segment-button>
          <ion-segment-button value="4">
            <ion-label>Combat</ion-label>
          </ion-segment-button>
          <ion-segment-button value="5">
            <ion-label>Autre</ion-label>
          </ion-segment-button>
        </ion-segment>

        <div class="ion-padding">
          <ion-grid>
            <ion-row>
              <ion-col size="3">
                <ion-badge color="light">Boxe</ion-badge>
              </ion-col>
              <ion-col size="3">
                <ion-badge color="light">MMA</ion-badge>
              </ion-col>
              <ion-col size="3">
                <ion-badge color="light">Krav</ion-badge>
              </ion-col>
              <ion-col size="3">
                <ion-badge color="light">Judo</ion-badge>
              </ion-col>
            </ion-row>
          </ion-grid>
        </div>

        <ion-slides :options="slideOpts">

          <ion-slide>
            <ion-grid>
              <ion-row>
                <ion-col size="12" class="poster-col">
                  <a href="/Reservation">
                    <img class="poster" src="/assets/img/Coach-1.png" alt="">
                  </a>
                </ion-col>
                <ion-col size="12">
                  <h5 class="ion-no-margin">Coach untel</h5>
                  <p class="ion-no-margin rate">
                    <ion-icon :icon="star"></ion-icon>4.5
                  </p>
                </ion-col>
              </ion-row>
            </ion-grid>
          </ion-slide>

          <ion-slide>
            <ion-grid>
              <ion-row>
                <ion-col size="12" class="poster-col">
                  <a href="/Reservation">
                    <img class="poster" src="/assets/img/Coach-2.png" alt="">
                  </a>                </ion-col>
                <ion-col size="12">
                  <h5 class="ion-no-margin">Coach untel</h5>
                  <p class="ion-no-margin rate">
                    <ion-icon :icon="star"></ion-icon>4.5
                  </p>
                </ion-col>
              </ion-row>
            </ion-grid>
          </ion-slide>

          <ion-slide>
            <ion-grid>
              <ion-row>
                <ion-col size="12" class="poster-col">
                  <a href="/Reservation">
                    <img class="poster" src="/assets/img/Coach-3.png" alt="">
                  </a>
                </ion-col>
                <ion-col size="12">
                  <h5 class="ion-no-margin">Coach untel</h5>
                  <p class="ion-no-margin rate">
                    <ion-icon :icon="star"></ion-icon>4.5
                  </p>
                </ion-col>
              </ion-row>
            </ion-grid>
          </ion-slide>

          <ion-slide>
            <ion-grid>
              <ion-row>
                <ion-col size="12" class="poster-col">
                  <a href="/Reservation">
                    <img class="poster" src="/assets/img/Coach-4.png" alt="">
                  </a>                </ion-col>
                <ion-col size="12">
                  <h5 class="ion-no-margin">Coach untel</h5>
                  <p class="ion-no-margin rate">
                    <ion-icon :icon="star"></ion-icon>4.5
                  </p>
                </ion-col>
              </ion-row>
            </ion-grid>
          </ion-slide>

        </ion-slides>

      </div>
    </ion-content>
  </ion-page>
</template>

<script>
import { IonContent, IonSegment, IonSegmentButton, IonLabel, IonSlides, IonSlide, IonGrid, IonRow, IonCol, IonBadge, IonIcon, IonPage } from '@ionic/vue';
import Menu from '../components/MenuApp.vue'
import { star } from 'ionicons/icons';
import { defineComponent } from 'vue';

export default defineComponent({
  name: 'Home',
  components: {
    Menu,
    IonContent,
    IonSlides,
    IonSlide,
    IonSegment,
    IonGrid,
    IonRow,
    IonCol,
    IonBadge,
    IonSegmentButton,
    IonLabel,
    IonIcon,
    IonPage
  },
  setup() {
    const slideOpts = {
      centeredSlides: true,
      loop: true,
      spaceBetween: -100
    };
    return {
      star,
      slideOpts
    }
  }
});
</script>

<style scoped>

ion-segment {
  margin: 0 10px;
}

ion-segment-button {
  text-transform: capitalize;
  transform: scale(.8, .8);
  --indicator-color: transparent;
  font-weight: 300;
  color: #fff;
}

ion-segment-button ion-label {
  position: relative;
  left: -17px;
  font-weight: bolder;
  font-size: 18px;
}

.segment-button-checked {
  color: #333;
}

.segment-button-checked:before {
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  width: 50%;
  border-bottom: 4px solid #333;
}

ion-badge {
  padding: 8px 0;
  border-radius: 10px;
  color: #333;
  border: 1px solid #8c8c8c;
  box-shadow: 10px 9px 20px -1px rgba(0,0,0,0.49);
  -webkit-box-shadow: 10px 9px 20px -1px rgba(0,0,0,0.49);
  -moz-box-shadow: 10px 9px 20px -1px rgba(0,0,0,0.49);  width: 100%;
  text-align: center;
}

.poster-col {
  height: 26em;
}
.poster-col img {
  border-radius: 40px;
}

.rate {
  font-size: 14px;
  padding-top: 4px;
}

.rate ion-icon {
  color: gold;
}

h5 {
  margin-top: 4px;
  font-weight: 400;
  color: #fff;
}

p {
  font-size: 18px;
}

ion-buttons ion-button ion-icon {
  color: #fff;
}

/* Animations */
.swiper-slide-prev {
  opacity: .5;
  transform: rotate(-8deg);
}
.swiper-slide-next {
  opacity: .5;
  transform: rotate(8deg);
}
.swiper-slide {
  transition: .4s all;
}



</style>