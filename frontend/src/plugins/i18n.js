import Vue from "vue";
import VueI18n from "vue-i18n";

import en from "./translate/en";
import pt from "./translate/pt";

Vue.use(VueI18n);

const messages = {
  en,
  pt
};

// Create VueI18n instance with options
const i18n = new VueI18n({
  locale: "pt", // set locale
  messages // set locale messages
});

export default i18n;
