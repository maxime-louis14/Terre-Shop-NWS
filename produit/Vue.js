Vue.component("accueil", {
  model: {},

  template: `<div class="container">
  <h1>Terre Shop</h1>
    <div class="row">
      <div class="col-4">
        <a <div class="choice" @click="choose('mug')">
          <img src="../image/TerreShop/mug/mug-blanc.jpg" class="img-fluid" alt="Responsive image">
          <h2></h2>
          <p></p>
          </div>
        <a/>
      </div>    

      <div class="col-4">
       <a
       <div class="choice">
          <img src="../image/TerreShop/pull/pull-blanc.jpg"   @click="choose('pull')" class="img-fluid" alt="Responsive image">
          <br>
          <h2></h2>
          <p></p>
        </div>
        </a>
      </div>

      <div class="col-4">
      <a
        <div class="choice">
          <img src="../image/TerreShop/sac/NWS-logo.jpg"  @click="choose('sac')" class="img-fluid" alt="Responsive image">
          <h2> </h2>
          <p> </p>
          </div>
        </a>
      </div>
  </div> 
</div> `,

  // C’est pour changer les pages home.

  methods: {
    choose: function (pageChoosen) {
      this.$parent.choose(pageChoosen);
    },
  },
});

Vue.component("mug", {
  template: `<div class="container">
    <div class="row">
      <div class="col-4">
        <div class="pxmug">
        <img src="../image/TerreShop/mug/mug-blanc.jpg" id="Mug0">
        </div>
      </div>

      <select  class="form-select w-25 h-25 float-right"  aria-label="Default select example">
      <option selected>Open this select menu</option>
      <option id="1">Eau</option>
      <option id="2">Terre</option>
      <option id="3">Feu</option>
      <option id="4">Air</option>
    </select>

    </div>
  </div>`,

  methods: {


  },


}),


  Vue.component("pull", {
    template: `<div class="container">
    <div class="row">
      <div class="col-4">
        <div class="pxmug">
          <img src="../image/TerreShop/pull/pull-blanc.jpg">
        </div>
      </div>
      
      <select  class="form-select w-25 h-25 float-right"  aria-label="Default select example">
      <option selected>Open this select menu</option>
      <option value="1">Eau</option>
      <option value="2">Terre</option>
      <option value="3">Feu</option>
      <option value="4">Air</option>
    </select>
    </div>
  </div>`,
  }),
  Vue.component("sac", {
    template: `<div class="container">
    <div class="row">
      <div class="col-4">
        <div class="pxmug">
          <img src="../image/TerreShop/sac/NWS-logo.jpg">
        </div>
      </div>
      
      <select  class="form-select w-25 h-25 float-right"  aria-label="Default select example">
      <option selected>Open this select menu</option>
      <option value="1">Eau</option>
      <option value="2">Terre</option>
      <option value="3">Feu</option>
      <option value="4">Air</option>
    </select>
    </div>
  </div>`,
  }),
  Vue.component("reservation", {
    template: `


`,
  });

const vue = new Vue({
  el: "#app",

  data: {
    actualPage: "accueil",
    buttons: [
      {
        used: false,
        name: "mug",
      },
      {
        used: false,
        name: "pull",
      },
      {
        used: false,
        name: "sac",
      },
    ],
   
  },

  methods: {
    choose: function (pageChoosen) {
      this.actualPage = pageChoosen;
      for (i = 0; i < this.buttons.length; i++) {
        if (this.actualPage == this.buttons[i].name) {
          this.buttons[i].used = true;
        }
      }

      // Quand je reviens sur accueil, je veux que tout les donnée s'efface.  C'est le if.

      if (this.actualPage == "accueil") {
        for (j = 0; j < this.buttons.length; j++) {
          this.buttons[j].used = false;
        }
      }
      console.log(pageChoosen);
    },
  },

  computed: {
    buttonsfilter: function () {
      return this.buttons.filter((buttons) => buttons.used !== true);
    },
  },
});
